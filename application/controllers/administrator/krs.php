<?php

class Krs extends CI_Controller {
    public function index() {
        $data = array(
            'nim'               => set_value('nim'),
            'id_tahun_akademik' => set_value('id_tahun_akademik'),
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_krs',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function krs_aksi() {
        $this->_rulesKrs();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nim = $this->input->post('nim', TRUE);
            $thn_akademik = $this->input->post('id_tahun_akademik', TRUE);

        } 
        
        if ($this->mahasiswa_model->get_by_id($nim) == null) {
             $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Mahasiswa Yang Anda Input belum terdaftar!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>');
            redirect('administrator/krs');
        }
    }
}
?>