<div class="card">
    <div class="card-header">
        <a href="<?= base_url('proyek/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"> Tambah
                Proyek</i></a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Pimpinan Proyek</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyek as $pro): ?>
                    <tr>
                        <td><?= $pro->nama_proyek ?></td>
                        <td><?= $pro->client ?></td>
                        <td><?= $pro->pimpinan_proyek ?></td>
                        <td><?= $pro->keterangan ?></td>
                        <td>
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <a style="margin-right: 5px;" data-toggle="modal" data-target="#file<?= $pro->id ?>"
                                    class="btn btn-primary btn-sm"><i class="nav-icon fas fa-file"></i></a>
                                <a style="margin-right: 5px; margin-left: 5px;" data-toggle="modal"
                                    data-target="#edit<?= $pro->id ?>" class="btn btn-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <a style="margin-left: 5px;" href="<?= base_url('proyek/delete/' . $pro->id) ?>"
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

<!-- Modal Update-->
<?php foreach ($proyek as $pro): ?>
    <div class="modal fade" id="edit<?= $pro->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('proyek/edit/' . $pro->id) ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Proyek</label>
                            <input type="text" name="nama_proyek" class="form-control" value="<?= $pro->nama_proyek ?>">
                            <?= form_error('nama_proyek', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Client</label>
                            <input type="text" name="client" class="form-control" value="<?= $pro->client ?>">
                            <?= form_error('client', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Tanggal Mulai</label>
                                <input type="datetime-local" name="tgl_mulai" class="form-control"
                                    value="<?= $pro->tgl_mulai ?>">
                                <?= form_error('tgl_mulai', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tanggal Selesai</label>
                                <input type="datetime-local" name="tgl_selesai" class="form-control"
                                    value="<?= $pro->tgl_selesai ?>">
                                <?= form_error('tgl_selesai', '<div class="text-small text-danger">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pimpinan Proyek</label>
                            <input type="text" name="pimpinan_proyek" class="form-control"
                                value="<?= $pro->pimpinan_proyek ?>">
                            <?= form_error('pimpinan_proyek', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea type="text" name="keterangan" class="form-control"><?= $pro->keterangan ?></textarea>
                            <?= form_error('keterangan', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" name="lokasi_id" id="inputGroupSelect03">
                                    <option selected>Pilih Lokasi</option>
                                    <?php foreach ($lokasi as $loc): ?>
                                        <option value="<?= $loc->id ?>"><?= $loc->nama_lokasi ?></option>
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

<!-- Modal Form-->
<?php foreach ($proyek as $pro): ?>
    <div class="modal fade" id="file<?= $pro->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Infomasi Proyek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-2 col-form-label">
                            <label>Nama Proyek</label>
                        </div>
                        <div class="col-sm-10 col-form-label">
                            <label>: <?= $pro->nama_proyek ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-form-label">
                            <label>Nama Client</label>
                        </div>
                        <div class="col-sm-10 col-form-label">
                            <label>: <?= $pro->client ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-form-label">
                            <label>Nama Pimpinan Proyek</label>
                        </div>
                        <div class="col-sm-10 col-form-label">
                            <label>: <?= $pro->pimpinan_proyek ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-form-label">
                            <label>Keterangan</label>
                        </div>
                        <div class="col-sm-10 col-form-label">
                            <label>: <?= $pro->keterangan ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-form-label">
                            <label>Tanggal Mulai</label>
                        </div>
                        <div class="col-sm-10 col-form-label">
                            <label>: <?= (new DateTime($pro->tgl_mulai))->format('Y-m-d H:i:s') ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-form-label">
                            <label>Tanggal Selesai</label>
                        </div>
                        <div class="col-sm-10 col-form-label">
                            <label>: <?= (new DateTime($pro->tgl_selesai))->format('Y-m-d H:i:s') ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 col-form-label">
                            <label>Lokasi Proyek</label>
                        </div>
                        <div class="col-sm-10 col-form-label">
                            <label>: <?= !empty($pro->nama_lokasi) ? $pro->nama_lokasi : '-' ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>