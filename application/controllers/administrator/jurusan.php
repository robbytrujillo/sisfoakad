<?php 

class Jurusan extends CI_Controller {

    public function index() {
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function input() {
        $data = array(
            'id_jurusan'     => set_value('id_jurusan'),
            'kode_jurusan'   => set_value('kode_jurusan'),
            'nama_jurusan'   => set_value('nama_jurusan'),
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan_form',$data);
        $this->load->view('templates_administrator/footer');
    }
}

?>