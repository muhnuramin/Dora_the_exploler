<div class="container-fluid">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Surat <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Surat Masuk Lain</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Tanggal Surat</th>
                            <th>No.Surat</th>
                            <th>No.Agenda</th>
                            <th>Asal Surat</th>
                            <th>Sifat</th>
                            <th>Disposisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_masuk as $s) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= htmlentities($s['tanggal_surat']) ?></td>
                                <td><?= htmlentities($s['nomor_surat']) ?></td>
                                <td><?= htmlentities($s['nomor_agenda']) ?></td>
                                <td><?= htmlentities($s['asal_surat']) ?></td>
                                <td><?= htmlentities($s['sifat']) ?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url("sekertaris/detaillain/"); ?><?= $s['id']; ?>" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="auto" title="Disposisi Surat"><i class="far fa-paper-plane"></i></a>
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