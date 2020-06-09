<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
            $this->load->library('form_validation');        
    }

    public function index(){

        if ($this->session->userdata('email')){
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $datas = [
            'captcha' =>$this->recaptcha->getWidget(),
            'script_captcha' => $this->recaptcha->getScriptTag()
        ];

        if( $this->form_validation->run() == false ){
        $data['title'] = "Login Page";

        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login', $datas);
        $this->load->view('templates/auth_footer');
        }else{
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response  = $this->recaptcha->verifyResponse($recaptcha);
            
            if( $this->form_validation->run() == false || !isset($response['success']) || $response['success'] <> true ){
                redirect('auth');
            } else {
                $this->_login();
            }
            
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', 
            ['email' => $email])->row_array();
        
            if ($user ){
                if ( $user['is_active'] == 1){
                    if(password_verify($password, $user['password'])){
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        
                        $this->session->set_userdata($data);
                        if($user['role_id'] == 1) {
                            redirect('admin');
                        }else{
                            redirect('user');
                        }
                        
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!
                        </div>');
                        redirect('auth');    
                    }
                }else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!
                    </div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!
                </div>');
                redirect('auth');
            }
    }
    
    public function registration(){
        if ($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'    => 'password dont match!',
            'min_length' => 'password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        
        
        if( $this->form_validation->run() == false){

            $data['title'] = 'WPU User Registration';
    
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($email),
                'image'         => 'default.jpg',
                'password'      => password_hash($this->input->post('password1')),
                'role_id'       => 2,
                'is_active'     => 0,
                'data_created'  => time()
            ];
            //random
            $token      = base64_encode(random_bytes(32));
            $user_token = [
                'email'         => $email,
                'token'         => $token,
                'date_created'  => time() 
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congrats! Your account has been created. Please Activate your account
            </div>');
            
            redirect('auth');
        }

    }

    private function _sendEmail($token, $type){
        
        $config = [
            'protocol'   => 'smtp',
            'smptp_host' => 'ssl://smtp.googlemail.com',
            'smptp_user' => 'blacksorror@gmail.com',
            'smptp_pass' => 'Cyberkwek$',
            'smptp_port' =>  587,
            'mailtype'   => 'html',
            'charset'    => 'utf-8',
            'newline'    => "\r\n"
        ];
        //$this->load->library('email', $config);
        $this->load->initialize($config); //load doang bisanya

        $this->email->from('blacksorror@gmail.com', 'Bambang');
        $this->email->to($this->input->post('email')); //dari registration
        
        if ( $type == 'verify'){
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify your account :
            '.base_url().'auth/verify?email='.$this->input->post('email').'&token='.$token.'');
        } else if ( $type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password :
            '.base_url().'auth/resetpassword?email='.$this->input->post('email').'&token='.$token.'');
        }
        
        if ( $this->email->send() ){
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify(){
        $email = $this->input->get('email');
        //$token = $this->input->get('token');
        $token = rawurldecode(urlencode($this->input->get('token')));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //start validation token on database or not
        if($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            //start validation invalid
            if($user_token) {
            //start validate when token is expired
                if (time() - $user_token['date_created'] < (60*60*24) ) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email] );
                    
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email .' has been activateed. Please login</div>');
                    redirect('auth'); 
                }else {
                    $this->db->delete('user', ['email' => $email] );
                    $this->db->delete('user_token', ['email' => $email] );

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token expired.
                    </div>');
                    redirect('auth');  
                } 
                //end of validation expired
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Invalid
                </div>');
                 redirect('auth');  
            }//end of validation invalid
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed!
            </div>');
            redirect('auth');
        }//end of validation on database or not
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout
            </div>');
        redirect('auth');
    }

    public function blocked(){
        $this->load->view('auth/blocked');
    }

    public function forgotPass(){

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if($this->form_validation->run() == false){
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgotpass');
            $this->load->view('templates/auth_footer');
        }else{
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if($user){
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Please check your email to reset your password
                </div>');
                redirect('auth/forgotpass');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registerd! or Active!
                </div>');
                redirect('auth/forgotpass');
            }


        }

    }

    public function resetPassword(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user){
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

                if ($user_token) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->changePass();
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed! Wrong token.
                    </div>');
                    redirect('auth');
                }
                
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Failed! Email not found.
                </div>');
            redirect('auth');
        }

    }
    public function changePass(){
        
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
        if( $this->form_validation->run() == false ){
            
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/changepass');
            $this->load->view('templates/auth_footer');
        }else{

            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed, Please login!</div>');
            redirect('auth');
        }

    }


}