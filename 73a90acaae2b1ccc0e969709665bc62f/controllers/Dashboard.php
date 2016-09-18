<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

        public function __construct() {
                
                parent::__construct();
                $this->load->model('users_model', '', true);
                $this->load->model('news_model', '', true);
                $this->load->model('stats_model', '', true);

        }

	public function view($page = 'home') {
        
                if (!file_exists(APPPATH.'views/dashboard/'.$page.'.php')) {
                
                    show_404();
        
                }

                if ($this->session->userdata('logged_in')) {
                    
                    $sessdata = $this->session->userdata('logged_in');
                    
                    $data['title'] = 'Обзорная доска';
                    $data['user'] = $this->users_model->get_user($sessdata['uid']);
                    $data['news_list'] = $this->news_model->get_news_list($sessdata['uid']);

                    $data['chart']['denial'] = get_avgnew($this->stats_model->get_stats($sessdata['uid'], 2));
                    $data['chart']['views'] = get_views($this->stats_model->get_stats($sessdata['uid'], 3));
                    $data['chart']['visitors'] = get_visitors($this->stats_model->get_stats($sessdata['uid'], 1));

                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/menuside', $data);
                    $this->load->view('dashboard/'.$page, $data);
                    $this->load->view('templates/aside', $data);
                    $this->load->view('templates/footer', $data);

                }
                else {
                    
                    redirect(base_url().'auth/login', 'refresh');

                }

	}

    public function news($page = 'news') {
        
                if (!file_exists(APPPATH.'views/dashboard/'.$page.'.php')) {
                
                    show_404();
        
                }

                if ($this->session->userdata('logged_in')) {
                    
                    $sessdata = $this->session->userdata('logged_in');
                    
                    $data['title'] = ucfirst('Архив новостей');
                    $data['news_list'] = $this->news_model->get_news_list($sessdata['uid']);

                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/menuside', $data);
                    $this->load->view('dashboard/'.$page, $data);
                    $this->load->view('templates/aside', $data);
                    $this->load->view('templates/footer', $data);

                }
                else {
                    
                    redirect(base_url().'auth/login', 'refresh');

                }

    }

    public function about($page = 'about') {
        
                if (!file_exists(APPPATH.'views/dashboard/'.$page.'.php')) {
                
                    show_404();
        
                }

                if ($this->session->userdata('logged_in')) {
                    
                    $sessdata = $this->session->userdata('logged_in');
                    
                    $data['title'] = ucfirst('Обо мне');
                    $data['user'] = $this->users_model->get_user($sessdata['uid']);

                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/menuside', $data);
                    $this->load->view('dashboard/'.$page, $data);
                    $this->load->view('templates/aside', $data);
                    $this->load->view('templates/footer', $data);

                }
                else {
                    
                    redirect(base_url().'auth/login', 'refresh');

                }

    }

    public function stats($page = 'stats') {
        
                if (!file_exists(APPPATH.'views/dashboard/'.$page.'.php')) {
                
                    show_404();
        
                }

                if ($this->session->userdata('logged_in')) {

                    $sessdata = ($this->session->userdata('logged_in'));
                    
                    $data['title'] = 'Статистика';
                    $data['chart']['denial'] = get_avgnew($this->stats_model->get_stats($sessdata['uid'], 2));
                    $data['chart']['views'] = get_views($this->stats_model->get_stats($sessdata['uid'], 3));
                    $data['chart']['visitors'] = get_visitors($this->stats_model->get_stats($sessdata['uid'], 1));

                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/menuside', $data);
                    $this->load->view('dashboard/'.$page, $data);
                    $this->load->view('templates/aside', $data);
                    $this->load->view('templates/footer', $data);

                }
                else {
                    
                    redirect(base_url().'auth/login', 'refresh');

                }

    }
        
}
