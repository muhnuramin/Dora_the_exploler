<div class="container-fluid">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Surat Masuk</h6>
            </div>
            <div class="card-body">
                <?php foreach ($produk as $b) : ?>
                    <form action="<?= base_url('produk/editData') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row my-3">
                            <div class="col">
                                <label for="id_kategori_produk"><b>id_kategori_produk</b></label>
                                <input type="text" class="form-control" placeholder="id_kategori_produk" name="id_kategori_produk" id="id_kategori_produk" value="<?= $b->id_kategori_produk; ?>">
                            </div>
                            <div class="col">
                                <label for="id_produsen"><b>id_produsen</b></label>
                                <input type="text" class="form-control" placeholder="id_produsen" name="id_produsen" id="id_produsen" value="<?= $b->id_produsen; ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="nama_provinsi"><b>nama_provinsi</b></label>
                                <input type="text" class="form-control" placeholder="nama_provinsi" name="nama_provinsi" id="nama_provinsi" value="<?= $b->nama_provinsi; ?>">
                            </div>
                            <div class="col">
                                <label for="nama_kota"><b>nama_kota</b></label>
                                <input type="text" class="form-control" placeholder="nama_kota" name="nama_kota" id="nama_kota" value="<?= $b->nama_kota; ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="nama_produk"><b>nama_produk</b></label>
                                <input type="text" class="form-control" placeholder="nama_produk" name="nama_produk" id="nama_produk" value="<?= $b->nama_produk; ?>">
                            </div>
                            <div class="col">
                                <label for="tag_produk"><b>tag_produk</b></label>
                                <input type="text" class="form-control" placeholder="tag_produk" name="tag_produk" id="tag_produk" value="<?= $b->tag_produk; ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="deskripsi_produk"><b>deskripsi_produk</b></label>
                                <input type="text" class="form-control" placeholder="deskripsi_produk" name="deskripsi_produk" id="deskripsi_produk" value="<?= $b->deskripsi_produk; ?>">
                            </div>
                            <div class="col">
                                <label for="slug_produk"><b>slug_produk</b></label>
                                <input type="text" class="form-control" placeholder="slug_produk" name="slug_produk" id="slug_produk" value="<?= $b->slug_produk; ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="produk_tampil"><b>produk_tampil</b></label>
                                <input type="text" class="form-control" placeholder="produk_tampil" name="produk_tampil" id="produk_tampil" value="<?= $b->produk_tampil; ?>">
                            </div>
                            <div class="col">
                                <label for="status_aktif_produk"><b>status_aktif_produk</b></label>
                                <input type="text" class="form-control" placeholder="status_aktif_produk" name="status_aktif_produk" id="status_aktif_produk" value="<?= $b->status_aktif_produk; ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>