<?php

class Tahunakademik extends CI_Controller {
    public function index() {
        $data['tahunakademik'] = $this->tahunakademik_model->tampil_data('tahunakademik')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tahunakademik',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_tahunakademik() {
        
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tahunakademik_form');
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_tahunakademik_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_tahunakademik();
        } else {
            $tahun_akademik   = $this->input->post('tahun_akademik');
            $semester         = $this->input->post('semester');
            $status           = $this->input->post('status');

            $data = array(
                'tahun_akademik' => $tahun_akademik,
                'semester'       => $semester,
                'status'         => $status
            );

            $this->tahunakademik_model->insert_data($data, 'tahunakademik');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data Tahun akademik berhasil ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>');
            redirect('administrator/tahunakademik');
     }
    }

    public function _rules() {
        $this->form_validation->set_rules('tahun_akademik', 'tahun_akademik', 'required',['required' => 'Tahun Akademik wajib diisi!']);
        $this->form_validation->set_rules('semester', 'semester', 'required',['required' => 'Semester wajib diisi!']);
        $this->form_validation->set_rules('status', 'status', 'required',['required' => 'Status wajib diisi!']);
    }
}

?>