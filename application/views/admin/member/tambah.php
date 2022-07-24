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
                            <label for="deskripsi_member"><b>deskripsi_member</b></label>
                            <input type="text" class="form-control" placeholder="deskripsi_member" name="deskripsi_member" id="deskripsi_member">
                        </div>
                        <div class="col">
                            <label for="nomor_ktp_member"><b>nomor_ktp_member</b></label>
                            <input type="text" class="form-control" placeholder="nomor_ktp_member" name="nomor_ktp_member" id="nomor_ktp_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="foto_ktp_member"><b>foto_ktp_member</b></label>
                            <input type="text" class="form-control" placeholder="foto_ktp_member" name="foto_ktp_member" id="foto_ktp_member">
                        </div>
                        <div class="col">
                            <label for="nomor_rekening_member"><b>nomor_rekening_member</b></label>
                            <input type="text" class="form-control" placeholder="nomor_rekening_member" name="nomor_rekening_member" id="nomor_rekening_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="bank_rekening_member"><b>bank_rekening_member</b></label>
                            <input type="text" class="form-control" placeholder="bank_rekening_member" name="bank_rekening_member" id="bank_rekening_member">
                        </div>
                        <div class="col">
                            <label for="atasnama_rekening_member"><b>atasnama_rekening_member</b></label>
                            <input type="text" class="form-control" placeholder="atasnama_rekening_member" name="atasnama_rekening_member" id="atasnama_rekening_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="nomor_telp_member"><b>nomor_telp_member</b></label>
                            <input type="text" class="form-control" placeholder="nomor_telp_member" name="nomor_telp_member" id="nomor_telp_member">
                        </div>
                        <div class="col">
                            <label for="email_member"><b>email_member</b></label>
                            <input type="text" class="form-control" placeholder="email_member" name="email_member" id="email_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="member_password"><b>member_password</b></label>
                            <input type="text" class="form-control" placeholder="member_password" name="member_password" id="member_password">
                        </div>
                        <div class="col">
                            <label for="member_view_password"><b>member_view_password</b></label>
                            <input type="text" class="form-control" placeholder="member_view_password" name="member_view_password" id="member_view_password">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="kota_member"><b>kota_member</b></label>
                            <input type="text" class="form-control" placeholder="kota_member" name="kota_member" id="kota_member">
                        </div>
                        <div class="col">
                            <label for="tanggal_lahir_member"><b>tanggal_lahir_member</b></label>
                            <input type="text" class="form-control" placeholder="tanggal_lahir_member" name="tanggal_lahir_member" id="tanggal_lahir_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="pekerjaan_member"><b>pekerjaan_member</b></label>
                            <input type="text" class="form-control" placeholder="pekerjaan_member" name="pekerjaan_member" id="pekerjaan_member">
                        </div>
                        <div class="col">
                            <label for="jenis_kelamin_member"><b>jenis_kelamin_member</b></label>
                            <input type="text" class="form-control" placeholder="jenis_kelamin_member" name="jenis_kelamin_member" id="jenis_kelamin_member">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="status_aktif_member"><b>status_aktif_member</b></label>
                            <input type="text" class="form-control" placeholder="status_aktif_member" name="status_aktif_member" id="status_aktif_member">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>