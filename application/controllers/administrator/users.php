<?php

class Users extends CI_Controller {
    public function index() {
        $data['users'] = $this->user_model->tampil_data('users')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/daftar_users',$data);
        $this->load->view('templates_administrator/footer');
    }
}

?>