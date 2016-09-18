<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

        function __construct() {
               
                parent::__construct();
                $this->load->model('Users_model', '', true);

        }

	public function login($page = 'login') {
        
                if (!file_exists(APPPATH.'views/auth/'.$page.'.php')) {
                
                        show_404();
        
                }

                $this->form_validation->set_rules('login', 'Login', 'trim|required|xss_clean', array('xss_clean' => 'XSS в поле %s.', 'required' => 'Поле "Логин" обязательно для заполнения.'));
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_checkaccess', array('xss_clean' => 'XSS в поле %s.', 'required' => 'Поле %s обязательно для заполнения.'));

                if (!$this->session->userdata('logged_in') AND $this->form_validation->run() == FALSE) {
                        
                        $data['title'] = 'Логин';
                        $data['login'] = $this->input->post('login', true);

                        $this->load->view('templates/header', $data);
                        $this->load->view('auth/'.$page, $data);
                        $this->load->view('templates/footer', $data);

                }
                else {
                        redirect(base_url().'dashboard/view', 'refresh');
                }

	}

	public function checkaccess($password) {

                $this->load->library('encrypt');

                $key = $this->config->item('encryption_key');
                $salt1 = hash('sha512', $key.$password);
                $salt2 = hash('sha512', $password.$key);
                $hashed_password = hash('sha512', $salt1.$salt2.$password.$salt2.$salt1);

                $login = $this->input->post('login', true);
 
                $result = $this->Users_model->auth_user($login, $hashed_password);
 
                if ($result) {
                        
                        $sessdata = array();
                       
                        foreach ($result as $row) {
                                $sessdata = array(
                                        'uid'  => $row->uid,
                                        'logged_in' => true
                                );

                                $this->session->set_userdata('logged_in', $sessdata);

                        }

                        return true;

                }
                else {
                        
                        $this->form_validation->set_message('checkaccess', 'Неправильный логин и/или пароль.');
                        
                        return false;

                }

	}

	public function logout() {

                $this->session->unset_userdata('logged_in');
                session_destroy();

                redirect(base_url().'auth/login');

	}

}