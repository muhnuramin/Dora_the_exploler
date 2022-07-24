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
            <a href="<?= base_url('home/tambah'); ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> Tambah Berita</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-align">NO.</th>
                            <th>berita_judul</th>
                            <th>berita_deskripsi</th>
                            <th>berita_tgl</th>
                            <th>berita_autor</th>
                            <th>berita_foto</th>
                            <th>berita_tag</th>
                            <th>penulis_id</th>
                            <th>status_aktif_berita</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($berita as $b) : ?>
                            <tr>
                                <td class="align-middle"><?= $i++; ?></td>
                                <td class="align-middle"><?= ($b->berita_judul) ?></td>
                                <td class="align-middle"><?= ($b->berita_deskripsi) ?></td>
                                <td class="align-middle"><?= ($b->berita_tgl) ?></td>
                                <td class="align-middle"><?= ($b->berita_autor) ?></td>
                                <td class="align-middle"><?= ($b->berita_foto) ?></td>
                                <td class="align-middle"><?= ($b->berita_tag) ?></td>
                                <td class="align-middle"><?= ($b->penulis_id) ?></td>
                                <td class="align-middle"><?= ($b->status_aktif_berita) ?></td>
                                <td class="align-middle">
                                    <center>
                                        <div class="btn-group-vertical">
                                            <a href="<?= base_url('home/delete/'); ?><?= ($b->berita_id) ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"></i></a>
                                            <a href="<?= base_url('home/edit/'); ?><?= ($b->berita_id) ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="auto" title="Edit Surat"><i class="far fa-edit"></i></a>
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