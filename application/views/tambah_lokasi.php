<form action="<?= base_url('lokasi/tambah_data') ?>" method="POST">
    <div class="form-group">
        <label>Nama Lokasi</label>
        <input type="text" name="nama_lokasi" class="form-control">
        <?= form_error('nama_lokasi', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Negara</label>
        <input type="text" name="negara" class="form-control">
        <?= form_error('negara', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Provinsi</label>
        <input type="text" name="provinsi" class="form-control">
        <?= form_error('provinsi', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Kota</label>
        <input type="text" name="kota" class="form-control">
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
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
</form>