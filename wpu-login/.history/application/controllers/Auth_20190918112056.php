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
                        }else if{
                            redirect('user');
                        }else if{
                            red
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