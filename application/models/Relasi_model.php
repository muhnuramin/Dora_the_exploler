<?php

class Relasi_model extends CI_Model
{
    public function getAllBerita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $return = $this->db->get('');
        return $return->result();
    }
    public function getBeritaById($berita_id)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $return = $this->db->where('berita_id', $berita_id)->get();
        if ($return->num_rows() > 0) {
            return $return->result();
        } else {
            return false;
        }
    }
    public function deleteBerita($berita_id)
    {
        $this->db->where('berita_id', $berita_id);
        $this->db->delete('berita');
    }
    public function getAllMember()
    {
        $this->db->select('*');
        $this->db->from('membership');
        $return = $this->db->get('');
        return $return->result();
    }
    public function getMemberById($id_member)
    {
        $this->db->select('*');
        $this->db->from('membership');
        $return = $this->db->where('id_member', $id_member)->get();
        if ($return->num_rows() > 0) {
            return $return->result();
        } else {
            return false;
        }
    }
    public function deleteMember($id_member)
    {
        $this->db->where('id_member', $id_member);
        $this->db->delete('membership');
    }
    public function getAlloleholeh()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $return = $this->db->get('');
        return $return->result();
    }
    public function getOleholehById($id_produk)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $return = $this->db->where('id_produk', $id_produk)->get();
        if ($return->num_rows() > 0) {
            return $return->result();
        } else {
            return false;
        }
    }
    public function deleteOleholeh($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk');
    }
}
