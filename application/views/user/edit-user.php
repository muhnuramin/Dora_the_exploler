<div class="container-fluid">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
            </div>
            <div class="card-body">
                <?php foreach ($user as $u) : ?>
                    <form method="POST" action="<?= base_url('user/editData'); ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $u->user_id; ?>">
                        <input type="hidden" name="ttd_lama" value="<?= $u->ttd ?>">
                        <div class="form-group">

                            <label for="name">Name </label>
                            <input type="text" class="form-control" id="name" placeholder="Full name" name="name" value="<?= $u->name; ?>">
                        </div>

                        <div class=" form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="username" name="username" value="<?= $u->username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="roles">Posisi</label>

                            <select class="form-control" id="roles" name="roles" value="">
                                <option value="<?= $u->role_id; ?>"><?= $u->nama_role; ?></option>
                                <option value="6">Pimpinan</option>
                                <option value="1">Sekretaris</option>
                                <option value="2">Bid. Infrastruktur dan Kewilayahan</option>
                                <option value="3">Bid. Pemerintahan dan Pembangunan Manusia</option>
                                <option value="4">Bid. Perencanaan Ekonomi dan Sumber Daya Alam</option>
                                <option value="5">Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan</option>
                                <option value="8">Staf Bid. Infrastruktur dan Kewilayahan</option>
                                <option value="9">Staf Bid. Pemerintahan dan Pembangunan Manusia</option>
                                <option value="10">Staf Bid. Perencanaan Ekonomi dan Sumber Daya Alam</option>
                                <option value="11">Staf Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan</option>
                            </select>

                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="password" name="password1" value="">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group col">
                                <label for="repeat-password">Ulangi Password</label>
                                <input type="password" class="form-control" id="repeat-password" placeholder="Repeat Password" name="password2" value="">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ttd" class="form-label">Scan TTD <i>( .jpg, .png, .jpeg )</i></label>
                            <input type="file" class="form-control" id="ttd" name="ttd">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 float-right">Simpan</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>