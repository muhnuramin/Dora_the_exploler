<div class="container-fluid">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Surat Masuk</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('Member/tambahData') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row my-3">
                        <div class="col">
                            <label for="id_penulis"><b>id_penulis</b></label>
                            <input type="text" class="form-control" placeholder="id_penulis" name="id_penulis" id="id_penulis">
                        </div>
                        <div class="col">
                            <label for="nama_member"><b>nama_member</b></label>
                            <input type="text" class="form-control" placeholder="nama_member" name="nama_member" id="nama_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="title_member"><b>title_member</b></label>
                            <input type="text" class="form-control" placeholder="title_member" name="title_member" id="title_member">
                        </div>
                        <div class="col">
                            <label for="tanggal_bergabung_member"><b>tanggal_bergabung_member</b></label>
                            <input type="text" class="form-control" placeholder="tanggal_bergabung_member" name="tanggal_bergabung_member" id="tanggal_bergabung_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="berita_foto"><b>berita_foto</b></label>
                            <input type="text" class="form-control" placeholder="berita_foto" name="berita_foto" id="berita_foto">
                        </div>
                        <div class="col">
                            <label for="berita_tag"><b>berita_tag</b></label>
                            <input type="text" class="form-control" placeholder="berita_tag" name="berita_tag" id="berita_tag">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="penulis_id"><b>penulis_id</b></label>
                            <input type="text" class="form-control" placeholder="penulis_id" name="penulis_id" id="penulis_id">
                        </div>
                        <div class="col">
                            <label for="status_aktif_berita"><b>status_aktif_berita</b></label>
                            <input type="text" class="form-control" placeholder="status_aktif_berita" name="status_aktif_berita" id="status_aktif_berita">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>