<?php

class Disposisi_model extends CI_model
{
    public function riwayatSuratDisposisi($user)
    {
        $filter = array(
            'd.id_disposisi', 'd.diteruskan_kepada', 'd.tanda_tangan', 'd.tindak_lanjut', 'd.catatan', 'd.catatan_bidang', 'd.diteruskan_oleh', 'd.created_at', 'd.tanggal_dibaca', 'd.dibaca', 'd.tanggal_dikirim',
            's.asal_surat', 's.nomor_surat', 's.nomor_agenda', 's.tanggal_surat', 's.tanggal_diterima', 's.sifat', 's.perihal', 's.surat'
        );

        $this->db->select($filter);
        $this->db->from('disposisi as d');
        $this->db->join('surat_masuk as s', 's.id=d.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        $return = $this->db->where('diteruskan_oleh', $user)->get('');
        return $return->result_array();

        // $this->db->from('disposisi');
        // $query = $this->db->where_in('diteruskan_oleh', $user)->get();
        // return $query->result_array();
    }

    public function suratDisposisiById($id)
    {
        $filter = array(
            'd.id_disposisi', 'd.diteruskan_kepada', 'd.tanda_tangan', 'd.tindak_lanjut', 'd.catatan', 'd.catatan_bidang', 'd.diteruskan_oleh', 'd.created_at', 'd.tanggal_dibaca', 'd.dibaca', 'd.tanggal_dikirim',
            's.asal_surat', 's.nomor_surat', 's.nomor_agenda', 's.tanggal_surat', 's.tanggal_diterima', 's.sifat', 's.perihal', 's.surat'
        );
        $this->db->select($filter);
        $this->db->from('disposisi as d');
        $this->db->join('surat_masuk as s', 's.id=d.id_surat_masuk');
        $this->db->where('id_disposisi', $id);
        $return = $this->db->get();
        return $return->row_array();
    }

    public function suratDisposisiByUser($id)
    {
        $filter = array(
            'd.id_disposisi', 'd.diteruskan_kepada', 'd.tanda_tangan', 'd.tindak_lanjut', 'd.catatan', 'd.catatan_bidang', 'd.diteruskan_oleh', 'd.created_at', 'd.tanggal_dibaca', 'd.dibaca', 'd.tanggal_dikirim',
            's.asal_surat', 's.nomor_surat', 's.nomor_agenda', 's.tanggal_surat', 's.tanggal_diterima', 's.sifat', 's.perihal', 's.surat'
        );
        $this->db->select($filter);
        $this->db->from('disposisi as d');
        $this->db->join('surat_masuk as s', 's.id=d.id_surat_masuk');
        $this->db->where('d.diteruskan_kepada', $id);
        $return = $this->db->get();
        return $return->result_array();
    }
}
