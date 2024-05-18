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

    public function tambah_prodi_aksi() {
        $this->rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_prodi();
        } else {
            $kode_prodi = $this->input->post('kode_prodi');
            $nama_prodi = $this->input->post('nama_prodi');
            $nama_jurusan = $this->input->post('nama_jurusan');

            $data = array(
                'kode_prodi' => $kode_prodi,
                'nama_prodi' => $nama_prodi,
                'nama_jurusan' => $nama_jurusan,
            );

            $this->prodi_model->insert_data($data, 'prodi');
            redirect('administrator/prodi');
        }
    }
    
}

?>