<?php

class Relasi_model extends CI_Model
{
    public function joinUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('roles', 'roles.role_id=user.role_id');
        $return = $this->db->get('');
        return $return->result();
    }
    public function joinUserId($user_id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('roles', 'roles.role_id=user.role_id');
        $return = $this->db->where('user_id', $user_id)->get();
        if ($return->num_rows() > 0) {
            return $return->result();
        } else {
            return false;
        }
    }

    public function joinDisposisiSekertaris()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Sekretaris', 'dibaca' => 'Y');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function notifDisposisiSekertaris()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Sekretaris', 'dibaca' => 'N');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function RiwayatDisposisi()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $return = $this->db->get('');
        return $return->result();
    }
    public function SuratMasukB1()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Infrastruktur dan Kewilayahan', 'dibaca' => 'Y');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function NotifMasukB1()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Infrastruktur dan Kewilayahan', 'dibaca' => 'N');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukSekertarisbyId($id)
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Sekretaris', 'id_disposisi' => $id);
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukB1byId($id)
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Infrastruktur dan Kewilayahan', 'id_disposisi' => $id);
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukbyId($id)
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('id_disposisi' => $id);
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukB2()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Pemerintahan dan Pembangunan Manusia', 'dibaca' => 'Y');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function NotifMasukB2()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Pemerintahan dan Pembangunan Manusia', 'dibaca' => 'N');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukB2byId($id)
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Pemerintahan dan Pembangunan Manusia', 'id_disposisi' => $id);
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukB3()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Perencanaan Ekonomi dan Sumber Daya Alam', 'dibaca' => 'Y');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function NotifMasukB3()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Perencanaan Ekonomi dan Sumber Daya Alam', 'dibaca' => 'N');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukB3byId($id)
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Perencanaan Ekonomi dan Sumber Daya Alam', 'id_disposisi' => $id);
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukB4()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan', 'dibaca' => 'Y');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function NotifMasukB4()
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan', 'dibaca' => 'N');
        $return = $this->db->where($array)->get();
        return $return->result();
    }
    public function SuratMasukB4byId($id)
    {
        $this->db->select('*');
        $this->db->from('disposisi');
        $this->db->join('surat_masuk', 'surat_masuk.id=disposisi.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $array = array('diteruskan_kepada' => 'Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan', 'id_disposisi' => $id);
        $return = $this->db->where($array)->get();
        return $return->result();
    }
}
