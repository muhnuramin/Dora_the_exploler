<div class="container-fluid">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Surat Masuk</h6>
            </div>
            <div class="card-body">
                <form action="<?= base_url('home/tambahData') ?>" method="POST" enctype="multipart/form-data">
                    <div class="row my-3">
                        <div class="col">
                            <label for="surat_dari">Surat dari</label>
                            <input type="text" class="form-control" placeholder="Surat dari" name="asal_surat" id="surat_dari">
                        </div>
                        <div class="col">
                            <label for="tanggal_surat">Tanggal Surat</label>
                            <input type="date" class="form-control" placeholder="Tanggal Surat" name="tanggal_surat" id="tanggal_surat">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col ">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" class="form-control" placeholder="Nomor Surat" name="nomor_surat" id="nomor_surat">
                        </div>
                        <div class="col">
                            <label for="tanggal_diterima">Tanggal diterima</label>
                            <input type="date" class="form-control" placeholder="Diterima Tanggal" name="tanggal_diterima" id="tanggal_diterima">
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col">
                            <label for="nomor_agenda">Nomor Agenda</label>
                            <input type="text" class="form-control" placeholder="Nomor Agenda" name="nomor_agenda" id="nomor_agenda">
                        </div>
                        <div class="col">
                            <label for="sifat">Sifat</label>
                            <select class="form-control" id="sifat" name="sifat">
                                <option value="Biasa">Biasa</option>
                                <option value="Penting">Penting</option>
                                <option value="Rahasia">Rahasia</option>
                            </select>
                        </div>
                    </div>
                    <label for="perihal">Perihal</label>
                    <textarea class="form-control" name="perihal" id="perihal" cols="30" rows="8" placeholder="Perihal" id="perihal"></textarea>
                    <div class="my-3">
                        <label for="surat">Lembar Surat</label>
                        <input type="file" class="form-control" id="surat" name="surat" id="surat">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>