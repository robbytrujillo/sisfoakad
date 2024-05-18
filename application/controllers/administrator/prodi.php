<?php 

class Prodi extends CI_Controller {
    public function index() {
        $data['prodi'] = $this->prodi_model->tampil_data('prodi')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/prodi',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_prodi() {
        $data['jurusan'] = $this->prodi_model->tampil_data('jurusan')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/prodi_form',$data);
        $this->load->view('templates_administrator/footer');
    }
    
}

?>