<?php

class Surat_masuk_model extends CI_model
{
    public function getAllSurat()
    {
        if ($this->input->post('kondisi_surat') == "N") {
            $this->db->from('surat_masuk');
            $this->db->order_by('id', 'DESC');
            $this->db->where('didisposisi', 'N');
            $query = $this->db->get();
            return $query->result_array();
        } else if ($this->input->post('kondisi_surat') == "?") {
            $this->db->from('surat_masuk');
            $this->db->order_by('id', 'DESC');
            $this->db->where('didisposisi', '?');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->from('surat_masuk');
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
        // if ($this->input->post('user_role') == "Pimpinan") {
        //     $this->db->from('surat_masuk');
        //     $this->db->order_by('id', 'DESC');
        //     $this->db->where('didisposisi', 'N');
        //     $query = $this->db->get();
        //     return $query->result_array();
        // } else if ($this->input->post('user_role') == "Sekretaris") {
        //     $this->db->from('surat_masuk');
        //     $this->db->order_by('id', 'DESC');
        //     $this->db->where('didisposisi', '?');
        //     $query = $this->db->get();
        //     return $query->result_array();
        // } else {
        //     $this->db->from('surat_masuk');
        //     $this->db->order_by('id', 'DESC');
        //     $query = $this->db->get();
        //     return $query->result_array();
        // }
    }

    public function bacaSurat()
    {
        $this->db->from('surat_masuk');
        $this->db->order_by('id', 'DESC');
        $this->db->where('didisposisi', 'N');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function bacaSuratSekertaris()
    {
        $this->db->from('surat_masuk');
        $this->db->order_by('id', 'DESC');
        $this->db->where('didisposisi', '?');
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
