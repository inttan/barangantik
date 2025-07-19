<div class="card">
  <div class="card-header">Edit Jenis Barang</div>
  <div class="card-body">
    <form method="post" action="<?= site_url('jenisbarang/update/'.$jenis['id_jenis']); ?>">
      <div class="mb-3">
        <label>Nama Jenis Barang</label>
        <input type="text" name="nama_jenis" value="<?= htmlspecialchars($jenis['nama_jenis']); ?>" class="form-control" required>
      </div>
      <button class="btn btn-primary">Update</button>
      <a href="<?= site_url('jenisbarang'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
