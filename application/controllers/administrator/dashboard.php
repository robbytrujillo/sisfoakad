<?php

// class Dashboard extends CI_Controller {
//      public function index() {
//         $data = $this->user_model->ambil_data($this->session->userdata['username']);
//         $data = array(
//                 'username' => $data->username,
//                 'level'    => $data->level,
//         );          
//         $this->load->view('templates_administrator/header');
//         $this->load->view('templates_administrator/sidebar');
//         $this->load->view('administrator/dashboard',$data);
//         $this->load->view('templates_administrator/footer');
//      }

//     }

class Dashboard extends CI_Controller {
    public function index() {
        if ($this->session->has_userdata('username')) {
            $username = $this->session->userdata('username');
            $data = $this->user_model->ambil_data($username);
            $data = array(
                'username' => $data->username,
                'level'    => $data->level,
            );          
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/dashboard',$data);
            $this->load->view('templates_administrator/footer');
        } else {
            // Redirect to login page or display an error message
            redirect('login', 'refresh');
        }
    }
}

    
?>