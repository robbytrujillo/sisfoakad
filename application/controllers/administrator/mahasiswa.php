<?php 

class Mahasiswa extends CI_Controller {
    public function index() {
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id) {
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa_detail',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_mahasiswa() {
        $data['prodi'] = $this->mahasiswa_model->tampil_data('prodi')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa_form',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_mahasiswa_asli() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_mahasiswa();
        } else {
            $nim            = $this->input->post('nim');
            $nama_lengkap   = $this->input->post('nama_lengkap');
            $alamat         = $this->input->post('alamat');
            $email          = $this->input->post('email');
            $telepon        = $this->input->post('telepon');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $nama_prodi     = $this->input->post('nama_prodi');
            $photo          = $_FILES['photo'];

            if ($photo = '') { 

            } else {
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif\tiff';

                $this->load->library('upload',$config);
            }

            }
        }
    }
}

?>