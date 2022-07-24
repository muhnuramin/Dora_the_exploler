<div class="container-fluid">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Surat <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('member/tambah'); ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> Tambah Berita</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-align">NO.</th>
                            <th>id_member</th>
                            <th>id_penulis</th>
                            <th>nama_member</th>
                            <th>title_member</th>
                            <th>tanggal_bergabung_member</th>
                            <th>deskripsi_member</th>
                            <th>nomor_ktp_member</th>
                            <th>foto_ktp_member</th>
                            <th>nomor_rekening_member</th>
                            <th>bank_rekening_member</th>
                            <th>atasnama_rekening_member</th>
                            <th>nomor_telp_member</th>
                            <th>email_member</th>
                            <th>member_password</th>
                            <th>member_view_password</th>
                            <th>kota_member</th>
                            <th>tanggal_lahir_member</th>
                            <th>pekerjaan_member</th>
                            <th>jenis_kelamin_member</th>
                            <th>status_aktif_member</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($member as $m) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= ($m->id_member) ?></td>
                                <td><?= ($m->id_penulis) ?></td>
                                <td><?= ($m->nama_member) ?></td>
                                <td><?= ($m->title_member) ?></td>
                                <td><?= ($m->tanggal_bergabung_member) ?></td>
                                <td><?= ($m->deskripsi_member) ?></td>
                                <td><?= ($m->nomor_ktp_member) ?></td>
                                <td><?= ($m->foto_ktp_member) ?></td>
                                <td><?= ($m->nomor_rekening_member) ?></td>
                                <td><?= ($m->bank_rekening_member) ?></td>
                                <td><?= ($m->atasnama_rekening_member) ?></td>
                                <td><?= ($m->nomor_telp_member) ?></td>
                                <td><?= ($m->email_member) ?></td>
                                <td><?= ($m->member_password) ?></td>
                                <td><?= ($m->member_view_password) ?></td>
                                <td><?= ($m->kota_member) ?></td>
                                <td><?= ($m->tanggal_lahir_member) ?></td>
                                <td><?= ($m->pekerjaan_member) ?></td>
                                <td><?= ($m->jenis_kelamin_member) ?></td>
                                <td><?= ($m->status_aktif_member) ?></td>
                                <td class="align-middle">
                                    <center>
                                        <div class="btn-group-vertical">
                                            <a href="<?= base_url('Member/delete/'); ?><?= ($m->id_member) ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"></i></a>
                                            <a href="<?= base_url('Member/edit/'); ?><?= ($m->id_member) ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="auto" title="Edit Surat"><i class="far fa-edit"></i></a>
                                        </div>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>