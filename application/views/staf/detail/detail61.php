<div class="container-fluid">
    <a href="<?= base_url('./data/'); ?><?= htmlentities($surat_masuk['surat']) ?>" target="_blank" type="button" class="btn btn-secondary"><i class="fas fa-envelope-open"> </i> Baca Surat</a><br><br>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#previewSurat1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="previewSurat">
            <h6 class="m-0 font-weight-bold text-primary">Lembar Disposisi : </h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="previewSurat1">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 50%;">
                            Surat dari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($surat_masuk['asal_surat']) ?>
                        </td>
                        <td style="width: 50%;">Diterima Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($surat_masuk['tanggal_diterima']) ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal surat &nbsp;&nbsp;: <?= htmlentities($surat_masuk['tanggal_surat']) ?></td>
                        <td>Nomor Agenda &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($surat_masuk['nomor_agenda']) ?></td>
                    </tr>
                    <tr>
                        <td>Nomor Surat &nbsp;&nbsp;: <?= htmlentities($surat_masuk['nomor_surat']) ?></td>
                        <td>Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($surat_masuk['sifat']) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Perihal :</p>
                            <div><?= htmlentities($surat_masuk['perihal']) ?></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>