<?php 

class Hubungi_model extends CI_Model {
    public $table = 'hubungi';
    public $id = 'id_hubungi';

    public function tampil_data($data) {
        return $this->db->get($table);
    }
}

?>
