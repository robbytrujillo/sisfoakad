<?php 

class Dosen extends CI_Controller {
    public function index() {
        $data['dosen'] = $this->dosen_model->tampil_data('dosen')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dosen',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id) {
        $data['detail'] = $this->dosen_model->ambil_id_dosen($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dosen_detail',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_dosen() {
        // $data['prodi'] = $this->dosen_model->tampil_data('prodi')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dosen_form');
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_dosen_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_dosen();
        } else {
            $nidn          = $this->input->post('nidn');
            $nama_dosen    = $this->input->post('nama_dosen');
            $alamat        = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $email         = $this->input->post('email');
            $telepon       = $this->input->post('telepon');
            $photo         = $_FILES['photo'];

            if ($photo = '') { 

            } else {
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload',$config);
                if (!$this->upload->do_upload('photo')) {
                    echo "Gagal Upload"; die();
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nidn'           => $nidn,
                'nama_dosen'     => $nama_dosen,
                'alamat'         => $alamat,
                'jenis_kelamin'  => $jenis_kelamin,
                'email'          => $email,
                'telepon'        => $telepon,   
                'photo'          => $photo,        
            );

            $this->dosen_model->insert_data($data, 'dosen');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        Data Dosen berhasil ditambahkan!
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>');
            redirect('administrator/dosen');

            }
        }

         public function _rules() {
            $this->form_validation->set_rules('nidn','nidn','required',['required' => 'NIDN wajib diisi!']);
            $this->form_validation->set_rules('nama_dosen','nama_dosen','required',['required' => 'Nama Dosen wajib diisi!']);
            $this->form_validation->set_rules('alamat','alamat','required',['required' => 'Alamat wajib diisi!']);
            $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required',['required' => 'Jenis Kelamin wajib diisi!']);
            $this->form_validation->set_rules('email','email','required',['required' => 'Email wajib diisi!']);
            $this->form_validation->set_rules('telepon','telepon','required',['required' => 'Telepon wajib diisi!']);
        }

        public function update($id) {
            $where = array('nidn' => $id);
            $data['dosen'] = $this->dosen_model->edit_data($where, 'dosen')->result();
            $data['detail'] = $this->dosen_model->ambil_id_dosen($id);
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/dosen_update',$data);
            $this->load->view('templates_administrator/footer');
        }

        public function update_dosen_aksi() {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update();
            } else {
            $id             = $this->input->post('id_dosen');
            $nidn           = $this->input->post('nidn');
            $nama_dosen     = $this->input->post('nama_dosen');
            $alamat         = $this->input->post('alamat');
            $jenis_kelamin  = $this->input->post('jenis_kelamin');
            $email          = $this->input->post('email');
            $telepon        = $this->input->post('telepon');
            $photo          = $_FILES['userfile']['name'];
            
            if ($photo ) {
                $config['upload_path'] = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload',$config);

                if ($this->upload->do_upload('userfile')) {
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('photo', $userfile);
                } else {
                    echo "Gagal Upload"; die();
                }
            }

            $data = array(
                'nidn'             => $nidn,
                'nama_dosen'       => $nama_dosen,
                'alamat'           => $alamat,
                'jenis_kelamin'    => $jenis_kelamin,
                'email'            => $email,
                'telepon'          => $telepon,        
            );

            $where = array(
                'id_dosen' => $id
            );

            $this->dosen_model->update_data($where, $data, 'dosen');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        Data Dosen berhasil diubah!
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>');
            redirect('administrator/dosen');
            }
        }

        public function delete($id) {
            $where = array('nidn' => $id);
            $this->dosen_model->hapus_data($where, 'dosen');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        Data Dosen berhasil dihapus!
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>');
        redirect('administrator/dosen');
         }
    }
?>