<form action="<?= base_url('proyek/tambah_data') ?>" method="POST">
    <div class="form-group">
        <label>Nama Proyek</label>
        <input type="text" name="nama_proyek" class="form-control">
        <?= form_error('nama_proyek', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Client</label>
        <input type="text" name="client" class="form-control">
        <?= form_error('client', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Mulai</label>
        <input type="datetime-local" name="tgl_mulai" class="form-control">
        <?= form_error('tgl_mulai', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Selesai</label>
        <input type="datetime-local" name="tgl_selesai" class="form-control">
        <?= form_error('tgl_selesai', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Pimpinan Proyek</label>
        <input type="text" name="pimpinan_proyek" class="form-control">
        <?= form_error('pimpinan_proyek', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <textarea type="text" name="keterangan" class="form-control"></textarea>
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
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
</form>