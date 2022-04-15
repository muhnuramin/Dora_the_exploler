<?php

class Disposisi_model extends CI_model
{
    public function riwayatSuratDisposisi()
    {
        $filter = array(
            'd.id_disposisi', 'd.diteruskan_kepada', 'd.tanda_tangan', 'd.tindak_lanjut', 'd.catatan', 'd.catatan_bidang', 'd.diteruskan_oleh', 'd.tanggal_dibaca', 'd.tanggal_dikirim',
            's.id', 's.asal_surat', 's.nomor_surat', 's.nomor_agenda', 's.tanggal_surat', 's.tanggal_diterima', 's.sifat', 's.perihal', 's.surat', 's.didisposisi'
        );

        $this->db->select($filter);
        $this->db->from('disposisi as d');
        $this->db->join('surat_masuk as s', 's.id=d.id_surat_masuk');
        $this->db->order_by('id_disposisi', 'DESC');
        // $return = $this->db->where('diteruskan_oleh', $user)->get('');
        $return = $this->db->get('');
        return $return->result_array();
    }

    public function suratDisposisiById($id)
    {
        $filter = array(
            'd.id_disposisi', 'd.diteruskan_kepada', 'd.tanda_tangan', 'd.tindak_lanjut', 'd.catatan', 'd.catatan_bidang', 'd.diteruskan_oleh', 'd.tanggal_dibaca', 'd.tanggal_dikirim',
            's.id', 's.asal_surat', 's.nomor_surat', 's.nomor_agenda', 's.tanggal_surat', 's.tanggal_diterima', 's.sifat', 's.perihal', 's.surat', 's.didisposisi'
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
            'd.id_disposisi', 'd.diteruskan_kepada', 'd.tanda_tangan', 'd.tindak_lanjut', 'd.catatan', 'd.catatan_bidang', 'd.diteruskan_oleh', 'd.tanggal_dibaca', 'd.tanggal_dikirim',
            's.id', 's.asal_surat', 's.nomor_surat', 's.nomor_agenda', 's.tanggal_surat', 's.tanggal_diterima', 's.sifat', 's.perihal', 's.surat', 's.didisposisi'
        );

        $this->db->select($filter);
        $this->db->from('disposisi as d');
        $this->db->join('surat_masuk as s', 's.id=d.id_surat_masuk');
        $this->db->where('d.diteruskan_kepada', $id);
        $return = $this->db->get();
        return $return->result_array();
    }
}
