<?php

class Surat_diteruskan_model extends CI_model
{
    public function getAllSurat()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $return = $this->db->get('');
        return $return->result();
    }
}
