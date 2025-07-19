<div class="card">
  <div class="card-header">Edit Pemilik</div>
  <div class="card-body">
    <form method="post" action="<?= site_url('pemilik/update/'.$pemilik['id_pemilik']); ?>">
      <div class="mb-3">
        <label>Nama Pemilik</label>
        <input type="text" name="nama_pemilik" value="<?= htmlspecialchars($pemilik['nama_pemilik']); ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required><?= htmlspecialchars($pemilik['alamat']); ?></textarea>
      </div>
      <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" value="<?= htmlspecialchars($pemilik['kontak']); ?>" class="form-control">
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="<?= site_url('pemilik'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
