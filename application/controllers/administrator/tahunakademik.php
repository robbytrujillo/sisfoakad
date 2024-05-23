<?php

class Tahunakademik extends CI_Controller {
    public function index() {
        $data['tahunakademik'] = $this->tahunakademik_model->tampil_data('tahunakademik')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tahunakademik',$data);
        $this->load->view('templates_administrator/footer');
    }
}

?>