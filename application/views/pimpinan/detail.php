<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#previewSurat" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="previewSurat">
            <h6 class="m-0 font-weight-bold text-primary">Preview Surat : </h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="previewSurat">
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
                <a href="<?= base_url('./data/'); ?><?= $surat_masuk['surat'] ?>" target="_blank" type="button" class="btn btn-secondary"><i class="fas fa-envelope-open"> </i> Lihat Surat</a>
            </div>
        </div>
    </div>
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#disposisiSurat" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="disposisiSurat">
            <h6 class="m-0 font-weight-bold text-primary">Disposisi Surat : </h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="disposisiSurat">
            <div class="card-body">
                <form id="link" method="post">
                    <input type="hidden" name="id" value="<?= $surat_masuk['id'] ?>">
                    <h6><b>Diteruskan Kepada</b></h6>
                    <div class="row">
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Sekretaris" id="sekretaris" name="diteruskan[]">
                                <label class="form-check-label" for="sekretaris">
                                    Sekretaris
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Bid. Infrastruktur dan Kewilayahan" id="infrastruktur" name="diteruskan[]">
                                <label class="form-check-label" for="infrastruktur">
                                    Bid. Infrastruktur dan Kewilayahan
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Bid. Pemerintahan dan Pembangunan Manusia" id="pemerintahan" name="diteruskan[]">
                                <label class="form-check-label" for="pemerintahan">
                                    Bid. Pemerintahan dan Pembangunan Manusia
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Bid. Perencanaan Ekonomi dan Sumber Daya Alam" id="perencanaan" name="diteruskan[]">
                                <label class="form-check-label" for="perencanaan">
                                    Bid. Perencanaan Ekonomi dan Sumber Daya Alam
                                </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan" id="pengendalian" name="diteruskan[]">
                                <label class="form-check-label" for="pengendalian">
                                    Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan
                                </label>
                            </div>
                        </div>
                    </div>
                    <h6 class="mt-3"><b>Tanda Tangan</b></h6>
                    <div id="sig"></div>
                    <br />
                    <button id="clear" class="btn btn-danger btn-group-sm btn-sm"><i class="fas fa-undo-alt"></i> Bersihkan</button>
                    <div id="ttd" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</div>
                    <textarea id="signature64" name="signed" style="display: none"></textarea>

                    <h6 class="mt-3"><b>Tindak Lanjut</b></h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tindak_lanjut" id="exampleRadios1" value="Tanggapan dan saran">
                        <label class="form-check-label" for="exampleRadios1">
                            Tanggapan dan saran
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tindak_lanjut" id="exampleRadios2" value="Proses lebih lanjut">
                        <label class="form-check-label" for="exampleRadios2">
                            Proses lebih lanjut
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tindak_lanjut" id="exampleRadios3" value="Koordinasi / Konfirmasikan">
                        <label class="form-check-label" for="exampleRadios3">
                            Koordinasi / Konfirmasikan
                        </label>
                    </div>

                    <h6 class="mt-3"><b>Catatan</b></h6>
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
                                    <textarea class="form-control" name="perihal" id="perihal" cols="30" rows="8" placeholder="catatan" id="perihal"></textarea>
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
                    <button id="proses" type="submit" class="btn btn-primary mt-2" disabled>Proses</button>
                    <button id="limpah" type="submit" class="btn btn-primary mt-2" id="tombol" disabled>Limpahkan Sekretaris</button>
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
<script type="text/javascript">
    var sig = $('#sig').signature({
        syncField: '#signature64',
        syncFormat: 'PNG'
    });
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });

    const ttd = document.getElementById('ttd')
    const proses = document.getElementById('proses')
    const limpah = document.getElementById('limpah')
    const link = document.getElementById('link')
    const perihal = document.getElementById('perihal')

    ttd.addEventListener('click', function() {
        alert('Tanda tangan berhasil disimpan')
        proses.removeAttribute('disabled')
        limpah.removeAttribute('disabled')
    })


    proses.addEventListener('click', function() {
        link.setAttribute('action', '<?= base_url('pimpinan/tambahData') ?>')
    })


    limpah.addEventListener('click', function() {
        perihal.removeAttribute('required')
        link.setAttribute('action', '<?= base_url('pimpinan/limpahkan') ?>')
    })
</script>