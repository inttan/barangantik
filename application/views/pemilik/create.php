<div class="card">
  <div class="card-header">Tambah Pemilik</div>
  <div class="card-body">
    <form method="post" action="<?= site_url('pemilik/store'); ?>">
      <div class="mb-3">
        <label>Nama Pemilik</label>
        <input type="text" name="nama_pemilik" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control">
      </div>
      <button class="btn btn-primary">Simpan</button>
      <a href="<?= site_url('pemilik'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
