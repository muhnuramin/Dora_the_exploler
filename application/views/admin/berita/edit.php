<div class="container-fluid">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Surat Masuk</h6>
            </div>
            <div class="card-body">
                <?php foreach ($berita as $b) : ?>
                    <form action="<?= base_url('home/editData') ?>" method="POST" enctype="multipart/form-data">
                        <div class="row my-3">
                            <div class="col">
                                <label for="berita_judul"><b>berita_judul</b></label>
                                <input type="text" class="form-control" placeholder="berita_judul" name="berita_judul" id="berita_judul" value="<?= $b->berita_judul; ?>">
                            </div>
                            <div class="col">
                                <label for="berita_deskripsi"><b>berita_deskripsi</b></label>
                                <input type="text" class="form-control" placeholder="berita_deskripsi" name="berita_deskripsi" id="berita_deskripsi" value="<?= $b->berita_deskripsi; ?>">
                            </div>
                        </div>
                        <div class=" row my-3">
                            <div class="col">
                                <label for="berita_tgl"><b>berita_tgl</b></label>
                                <input type="text" class="form-control" placeholder="berita_tgl" name="berita_tgl" id="berita_tgl" value="<?= $b->berita_tgl; ?>">
                            </div>
                            <div class="col">
                                <label for="berita_autor"><b>berita_autor</b></label>
                                <input type="text" class="form-control" placeholder="berita_autor" name="berita_autor" id="berita_autor" value="<?= $b->berita_autor; ?>">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="berita_foto"><b>berita_foto</b></label>
                                <input type="text" class="form-control" placeholder="berita_foto" name="berita_foto" id="berita_foto" value="<?= $b->berita_foto; ?>">
                            </div>
                            <div class=" col">
                                <label for="berita_tag"><b>berita_tag</b></label>
                                <input type="text" class="form-control" placeholder="berita_tag" name="berita_tag" id="berita_tag" value="<?= $b->berita_tag; ?>">
                            </div>
                        </div>
                        <div class=" row my-3">
                            <div class="col">
                                <label for="penulis_id"><b>penulis_id</b></label>
                                <input type="text" class="form-control" placeholder="penulis_id" name="penulis_id" id="penulis_id" value="<?= $b->penulis_id; ?>">
                            </div>
                            <div class=" col">
                                <label for="status_aktif_berita"><b>status_aktif_berita</b></label>
                                <input type="text" class="form-control" placeholder="status_aktif_berita" name="status_aktif_berita" id="status_aktif_berita" value="<?= $b->status_aktif_berita; ?>">
                            </div>
                        </div>
                        <button type=" submit" class="btn btn-primary mt-2 float-right"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>