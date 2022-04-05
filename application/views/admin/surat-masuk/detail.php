<div class="container-fluid">
    <div class="container">
        <div class="row mt-3">
            <div class="container">
                <a href="<?= base_url('Home'); ?>" type="button" class="btn btn-warning"><i class="fas fa-angle-double-left"> </i> Kembali</a><br><br>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>No.Surat : </b><?= htmlentities($surat_masuk['nomor_surat']) ?></li>
                        <li class="list-group-item"><b>No. Agenda : </b><?= htmlentities($surat_masuk['nomor_agenda']) ?></li>
                        <li class="list-group-item"><b>Asal surat : </b><?= htmlentities($surat_masuk['asal_surat']) ?></li>
                        <li class="list-group-item"><b>Tanggal Surat : </b><?= htmlentities($surat_masuk['tanggal_surat']) ?></li>
                        <li class="list-group-item"><b>Tanggal diterima : </b><?= htmlentities($surat_masuk['tanggal_diterima']) ?></li>
                        <li class="list-group-item"><b>Sifat : </b><?= htmlentities($surat_masuk['sifat']) ?></li>
                        <li class="list-group-item"><b>Perihal : </b><?= htmlentities($surat_masuk['perihal']) ?></li>
                        <li class="list-group-item"><b>Lampiran Surat : </b><br>
                            <div class="embed-responsive embed-responsive-21by9">
                                <iframe class="embed-responsive-item" src="<?= base_url('./data/'); ?><?= $surat_masuk['surat'] ?>"></iframe>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>