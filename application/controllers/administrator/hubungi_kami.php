<?php 

class Hubungi_kami extends CI_Controller {
    public function index() {
        $data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/hubungi_kami', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function kirim_email($id) {
        $where = array('id_hubungi' => $id);
        $data['hubungi'] = $this->hubungi_model->kirim_data($where,'hubungi')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/form_kirim_email', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function kirim_email_aksi() {

        $to_email = $this->input->post('email');
        $config = [
            'mailtype'  => 'html',
            'charshet'  => 'utf-8',
            'protocol'  => 'smtp',
            'smpt_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'robbyikusuma88@gmail.com',
            'smtp_pass' => '12345678',
            'smtp_port' => 46,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from("Ibnu Hajar Boarding School");

        $this->email->to($to_email);

        $this->email->subject($subject);

        $this->email->message($message);
    }
}
?>