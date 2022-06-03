<div class="container-fluid">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Catatan <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Surat Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Tanggal Disposisi</th>
                            <th>Didisposisi Oleh</th>
                            <th>Asal Surat</th>
                            <th>No. Surat</th>
                            <th>No. Agenda</th>
                            <th>Sifat</th>
                            <th>Perihal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_masuk as $s) : ?>
                            <tr>
                                <?php if ($s->tanggal_dibaca == '0000-00-00') : ?>
                                    <td class="text-danger"><?= $i++; ?></td>
                                    <td class="text-danger"><?= htmlentities($s->tanggal_dikirim) ?></td>
                                    <td class="text-danger"><?= htmlentities($s->diteruskan_oleh) ?></td>
                                    <td class="text-danger"><?= htmlentities($s->asal_surat) ?></td>
                                    <td class="text-danger"><?= htmlentities($s->nomor_surat) ?></td>
                                    <td class="text-danger"><?= htmlentities($s->nomor_agenda) ?></td>
                                    <td class="text-danger"><?= htmlentities($s->sifat) ?></td>
                                    <td class="text-danger"><?= htmlentities($s->perihal) ?></td>
                                <?php else : ?>
                                    <td><?= $i++; ?></td>
                                    <td><?= htmlentities($s->tanggal_dikirim) ?></td>
                                    <td><?= htmlentities($s->diteruskan_oleh) ?></td>
                                    <td><?= htmlentities($s->asal_surat) ?></td>
                                    <td><?= htmlentities($s->nomor_surat) ?></td>
                                    <td><?= htmlentities($s->nomor_agenda) ?></td>
                                    <td><?= htmlentities($s->sifat) ?></td>
                                    <td><?= htmlentities($s->perihal) ?></td>
                                <?php endif; ?>
                                <td>
                                    <center>
                                        <form method="POST" action="<?= base_url('bidang2/detail'); ?>">
                                            <input type="hidden" name="id_disposisi" value="<?= $s->id_disposisi ?>">
                                            <button type="submit" class="btn btn-success btn-sm">Detail</button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>