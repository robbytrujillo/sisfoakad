<?php

class Users extends CI_Controller {
    public function index() {
        $data['users'] = $this->user_model->tampil_data('user')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/daftar_users',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_users() {
        $data = array (
            'username' => set_value('username'),                                                
            'password' => set_value('password'),                                                
            'email'    => set_value('email'),                                                
            'level'    => set_value('level'),                                                
            'blokir'   => set_value('blokir'),                                                
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/users_form',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_users_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_users();
        } else {
            $data = array(
                'username'   => $this->input->post('username', TRUE),
                'password'   => md5($this->input->post('password', TRUE)),
                'email'      => $this->input->post('email', TRUE),
                'level'      => $this->input->post('level', TRUE),
                'blokir'     => $this->input->post('blokir', TRUE),
                'id_sessions' => md5($this->input->post('id_sessions', TRUE)),
            );

            $this->user_model->insert_data($data, 'user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data User berhasil ditambahkan!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>');
            redirect('administrator/users');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'password wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required', [
            'required' => 'email wajib diisi!'
        ]);
        $this->form_validation->set_rules('level', 'level', 'required', [
            'required' => 'Level wajib diisi!'
        ]);
        $this->form_validation->set_rules('blokir', 'blokir', 'required', [
            'required' => 'blokir wajib diisi!'
        ]);
    }

    public function update($id) {
        $where = array('id' => $id);

        $data['users'] = $this->user_model->edit_data($where, 'users')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/users_update',$data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $id           = $this->input->post('id');
        $username     = $this->input->post('username');
        $password     = $this->input->post('password');
        $email        = $this->input->post('email');
        $level        = $this->input->post('level');
        $blokir       = $this->input->post('blokir');
        $id_sessions  = $this->input->post('id_sessions');

        $data = array (
            'username'  => $username,
            'password'  => $password,
            'email'     => $email,
            'level'     => $level,
            'blokir'    => $blokir,
        );

            $this->user_model->update_data($where,$data,'users');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        Data Users berhasil diubah!
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>');
            redirect('administrator/users');
    }

}

?>