<?php

class Transkripnilai extends CI_Controller{
    public function index() {
        $data = array(
            'nim' => set_value('nim')
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_transkrip',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function buat_transkrip_nilai() {
        
    }
}

?>