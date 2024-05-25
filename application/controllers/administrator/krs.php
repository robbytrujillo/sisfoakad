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
        
        $data = array(
            'nim' => $nim,
            'id_tahun_akademik' => $thn_akademik,
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap
        );

        $dataKrs = array (
            'krs_data' => $this->baca_krs($nim,$thn_akademik),
            'nim'   => $nim,
            'id_tahun_akademik' => $thn_akademik,
            'tahun_akademik' => $this->tahunakademik_model->get_by_id($thn_akademik)->tahun_akademik,
            'semester' => $this->tahunakademik_model->get_by_id($thn_akademik)->semester==1?'Ganjil':'Genap',
            'nama_lengkap' => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
            'prodi' => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/krs_list',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function baca_krs($nim,$thn_akademik) {
        $this->db->select('k.id_krs,k.kode_matakuliah,m.nama_matakuliah,m.sks');
        $this->db->from('krs as k');
        $this->db->where('k.id_tahun_akademik', $thn_akad);
        $this->db->join('matakuliah as m', 'm.kode_matakuliah = k.kode_matakuliah');

        $krs = $this->db->get()->result();
        return $krs;
    }

    public function _rulesKrs() {
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('id_tahun_akademik', 'id_tahun_akademik', 'required');
    }
}
?>