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
            <a href="<?= base_url('produk/tambah'); ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"> </i> Tambah Oleh-oleh</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-align">NO.</th>
                            <th>id_produk</th>
                            <th>id_kategori_produk</th>
                            <th>id_produsen</th>
                            <th>nama_provinsi</th>
                            <th>nama_kota</th>
                            <th>nama_produk</th>
                            <th>tag_produk</th>
                            <th>deskripsi_produk</th>
                            <th>slug_produk</th>
                            <th>produk_tampil</th>
                            <th>status_aktif_produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($produk as $p) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= ($p->id_produk) ?></td>
                                <td><?= ($p->id_kategori_produk) ?></td>
                                <td><?= ($p->id_produsen) ?></td>
                                <td><?= ($p->nama_provinsi) ?></td>
                                <td><?= ($p->nama_kota) ?></td>
                                <td><?= ($p->nama_produk) ?></td>
                                <td><?= ($p->tag_produk) ?></td>
                                <td><?= ($p->deskripsi_produk) ?></td>
                                <td><?= ($p->slug_produk) ?></td>
                                <td><?= ($p->produk_tampil) ?></td>
                                <td><?= ($p->status_aktif_produk) ?></td>
                                <td>
                                    <center>
                                        <div class="btn-group-vertical">
                                            <a href="<?= base_url('Produk/delete/'); ?><?= ($p->id_produk) ?>" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="auto" title="Hapus Surat" onclick="return confirm('Yakin ingin menghapus data');"><i class="far fa-trash-alt"></i></a>
                                            <a href="<?= base_url('Produk/edit/'); ?><?= ($p->id_produk) ?>" type="button" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="auto" title="Edit Surat"><i class="far fa-edit"></i></a>
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