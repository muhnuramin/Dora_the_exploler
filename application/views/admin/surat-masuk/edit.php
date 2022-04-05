<div class="container-fluid">
    <div class="container">
        <h3>Edit Surat Masuk</h3>
        <br>
        <form action="<?= base_url('home/editData') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $surat_masuk['id'] ?>">
            <input type="hidden" name="surat_lama" value="<?= $surat_masuk['surat'] ?>">
            <div class="row my-3">
                <div class="col">
                    <label for="surat_dari">Surat dari</label>
                    <input type="text" class="form-control" placeholder="Surat dari" name="asal_surat" id="surat_dari" value="<?= $surat_masuk['asal_surat'] ?>">
                </div>
                <div class="col">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" class="form-control" placeholder="Tanggal Surat" name="tanggal_surat" id="tanggal_surat" value="<?= $surat_masuk['tanggal_surat'] ?>">
                </div>
            </div>
            <div class="row my-3">
                <div class="col ">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" class="form-control" placeholder="Nomor Surat" name="nomor_surat" id="nomor_surat" value="<?= $surat_masuk['nomor_surat'] ?>">
                </div>
                <div class="col">
                    <label for="tanggal_diterima">Tanggal diterima</label>
                    <input type="date" class="form-control" placeholder="Diterima Tanggal" name="tanggal_diterima" id="tanggal_diterima" value="<?= $surat_masuk['tanggal_diterima'] ?>">
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="nomor_agenda">Nomor Agenda</label>
                    <input type="text" class="form-control" placeholder="Nomor Agenda" name="nomor_agenda" id="nomor_agenda" value="<?= $surat_masuk['nomor_agenda'] ?>">
                </div>
                <div class="col">
                    <label for="sifat">Sifat</label>
                    <select class="form-control" id="sifat" name="sifat" value="<?= $surat_masuk['sifat'] ?>">
                        <option value="Biasa">Biasa</option>
                        <option va lue="Penting">Penting</option>
                        <option value="Rahasia">Rahasia</option>
                    </select>
                </div>
            </div>
            <label for="perihal">Perihal</label>
            <textarea class="form-control" name="perihal" id="perihal" cols="30" rows="8" placeholder="Perihal" id="perihal"><?= $surat_masuk['perihal'] ?></textarea>
            <div class="my-3">
                <label for="surat">Lembar Surat</label>
                <input type="file" class="form-control" id="surat" name="surat" id="surat">
            </div>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
    </div>
</div>