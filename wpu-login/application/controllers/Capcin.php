<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capcin extends CI_Controller {

    public function create_capcin(){
        $optin = [
            'img_path'   => './captcha',
            'img_url'    => base_url('captcha'),
            'img_width'  => '150',
            'img_height' => '30',
            'expiration' => 7200
        ];

        $cin = create_captcha($optin);
        $image = $cin['image'];

        $this->session->set_userdata('captchaword', $cin['word']);

        return $image;
    }

    public function check_capcin(){
        if ( $this->input->post('captcha') == $this->session->userdata('captchaword') ) {
            return true;
        } else {
            $this->form_validation->set_message('check_capcin', 'Captcha is wrong');
            return false;
        }
    }
}