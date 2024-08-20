<div class="card">
    <div class="card-header">
        <a href="<?= base_url('lokasi/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Tambah
                Lokasi</i></a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Lokasi</th>
                    <th>Nama Proyek</th>
                    <th>Negara</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lokasi as $loc): ?>
                    <tr>
                        <td><?= $loc->nama_lokasi ?></td>
                        <td><?= !empty($loc->nama_proyek) ? $loc->nama_proyek : '-' ?></td>
                        <td><?= $loc->negara ?></td>
                        <td><?= $loc->provinsi ?></td>
                        <td><?= $loc->kota ?></td>
                        <td>
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <a style="margin-right: 5px;" data-toggle="modal" data-target="#edit<?= $loc->id ?>"
                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a style="margin-left: 5px;" href="<?= base_url('lokasi/delete/' . $loc->id) ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah anda yakin untuk menghapus data?')"><i
                                        class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<?php foreach ($lokasi as $loc): ?>
    <div class="modal fade" id="edit<?= $loc->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('lokasi/edit/' . $loc->id) ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" value="<?= $loc->nama_lokasi ?>">
                            <?= form_error('nama_lokasi', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Negara</label>
                            <input type="text" name="negara" class="form-control" value="<?= $loc->negara ?>">
                            <?= form_error('negara', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" value="<?= $loc->provinsi ?>">
                            <?= form_error('provinsi', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Kota</label>
                            <input type="text" name="kota" class="form-control" value="<?= $loc->kota ?>">
                            <?= form_error('kota', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Proyek</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="proyek_id" id="inputGroupSelect03">
                                    <option selected>Pilih Proyek</option>
                                    <?php foreach ($proyek as $pro): ?>
                                        <option value="<?= $pro->id ?>"><?= $pro->nama_proyek ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>