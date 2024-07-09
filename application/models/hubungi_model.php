<?php 

class Hubungi_model extends CI_Model {
    public $table = 'hubungi';
    public $id = 'id_hubungi';

    public function tampil_data($table) {
        return $this->db->get($table);
    }

    public function insert_data($data,$table) {
        $this->db->insert($table,$data);
    }

    // https://myaccount.google.com/lesssecureapps
    // https://sobatcoding.com/articles/kirim-email-menggunakan-gmail-dan-codeigniter-3
    // https://masrud.com/kirim-email-codeigniter/
    
    public function kirim_data($where,$table) {
        return $this->db->get_where($table, $where);
    }
}

?>
