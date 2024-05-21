<?php 

class Mahasiswa extends CI_Controller {
    public function index() {
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa',$data);
        $this->load->view('templates_administrator/footer');
    }
}

?>