<div class="container-fluid">
    <?php foreach ($surat_masuk as $s) : ?>
        <a href="<?= base_url('bidang3/print/'); ?><?= $s->id_disposisi ?>" target="_BLANK" type="button" class="btn btn-success"><i class="fas fa-print"></i> Print Lembar Disposisi</a><br><br>
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
                                Surat dari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($s->asal_surat) ?>
                            </td>
                            <td style="width: 50%;">Diterima Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($s->tanggal_diterima) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal surat &nbsp;&nbsp;: <?= htmlentities($s->tanggal_surat) ?></td>
                            <td>Nomor Agenda &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($s->nomor_agenda) ?></td>
                        </tr>
                        <tr>
                            <td>Didisposisi Oleh &nbsp;&nbsp;: <?= htmlentities($s->diteruskan_oleh) ?></td>
                            <td>Tanggal Disposisi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($s->tanggal_dikirim) ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Surat &nbsp;&nbsp;: <?= htmlentities($s->nomor_surat) ?></td>
                            <td>Sifat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= htmlentities($s->sifat) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Perihal :</p>
                                <div><?= htmlentities($s->perihal) ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Diteruskan Kepada :</p>
                                <div><?= htmlentities($s->diteruskan_kepada) ?></div>
                            </td>
                            <td>
                                <p>Dengan Hormat Harap :</p>
                                <div><?= htmlentities($s->tindak_lanjut) ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p>Catatan :</p>
                                <?php if (file_exists('./' . $s->catatan)) { ?>
                                    <div><img src="<?= base_url() ?><?= $s->catatan ?>" alt=""></div>
                                <?php } else { ?>
                                    <p><?= $s->catatan ?></p>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#previewSurat2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="previewSurat">
            <h6 class="m-0 font-weight-bold text-primary">Preview Surat : </h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="previewSurat2">
            <div class="card-body">
                <form method="POST" action="<?= base_url('bidang3/catatan'); ?>">
                    <h6><b>Catatan (Opsional)</b></h6>
                    <input type="hidden" name="id" value="<?= $s->id_disposisi; ?>">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fas fa-keyboard"></i> Catatan Ketik
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <textarea class="form-control" name="catatan_bidang" id="catatan_bidang" cols="30" rows="8" placeholder="Catatan Bidang" id="catatan_bidang"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-pen-alt"></i> Catatan Pen
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div id="sig2" style="width: 74vmax;"></div>
                                    <br />
                                    <button id="clear2" class="btn btn-warning btn-group-sm btn-sm"><i class="fas fa-undo-alt"></i> Bersihkan</button>
                                    <textarea id="signature642" name="catatan" style="display: none" cols="30" rows="8"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Input</button>
                    <a href="<?= base_url('./data/'); ?><?= $s->surat ?>" target="_blank" type="button" class="btn btn-secondary mt-2"><i class="fas fa-envelope-open"> </i> Baca Surat</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var sig2 = $('#sig2').signature({
        syncField: '#signature642',
        syncFormat: 'PNG'
    });
    $('#clear2').click(function(e) {
        e.preventDefault();
        sig2.signature('clear');
        $("#signature642").val('');
    });
</script>