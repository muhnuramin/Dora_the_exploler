<?php

class Surat_masuk_model extends CI_model
{
    public function getAllSurat()
    {
        // return $this->db->get('surat_masuk')->result_array();
        $this->db->from('surat_masuk');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function notifSurat()
    {
        $this->db->from('surat_masuk');
        $this->db->order_by('id', 'DESC');
        $this->db->where('dilihat', 'N');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function bacaSurat()
    {
        $this->db->from('surat_masuk');
        $this->db->order_by('id', 'DESC');
        $this->db->where('dilihat', 'Y');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getSuratById($id)
    {
        return $this->db->get_where('surat_masuk', ['id' => $id])->row_array();
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_masuk');
    }
}
