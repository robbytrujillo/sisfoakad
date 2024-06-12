<?php 

class User_model extends CI_Model {

    public $table = 'users';
    public $id = 'id';
    
    public function ambil_data($id) {
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }

    public function tampil_data($table) {
        return $this->db->get($table);
    }
}

?>