<div class="card">
  <div class="card-header">Tambah Jenis Barang</div>
  <div class="card-body">
    <form method="post" action="<?= site_url('jenisbarang/store'); ?>">
      <div class="mb-3">
        <label>Nama Jenis Barang</label>
        <input type="text" name="nama_jenis" class="form-control" required>
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="<?= site_url('jenisbarang'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
