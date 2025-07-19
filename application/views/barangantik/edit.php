<div class="card">
  <div class="card-header">Edit Barang Antik</div>
  <div class="card-body">
    <form method="post" action="<?= site_url('barangantik/update/'.$barang['id_barang']); ?>">
      <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="<?= htmlspecialchars($barang['nama_barang']); ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Tahun Pembuatan</label>
        <input type="number" name="tahun_pembuatan" value="<?= htmlspecialchars($barang['tahun_pembuatan']); ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nilai Estimasi</label>
        <input type="number" step="0.01" name="nilai_estimasi" value="<?= htmlspecialchars($barang['nilai_estimasi']); ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Jenis Barang</label>
        <select name="jenis_barang_id" class="form-control" required>
          <?php foreach($jenis as $j): ?>
            <option value="<?= $j['id_jenis']; ?>" <?= $barang['jenis_barang_id']==$j['id_jenis']?'selected':''; ?>>
              <?= htmlspecialchars($j['nama_jenis']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label>Pemilik</label>
        <select name="pemilik_id" class="form-control" required>
          <?php foreach($pemilik as $p): ?>
            <option value="<?= $p['id_pemilik']; ?>" <?= $barang['pemilik_id']==$p['id_pemilik']?'selected':''; ?>>
              <?= htmlspecialchars($p['nama_pemilik']); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
  <label>Status Perawatan</label>
  <select name="status_perawatan" class="form-control">
    <option value="Terawat" <?= ($barang['status_perawatan'] ?? '')=='Terawat'?'selected':'' ?>>Terawat</option>
    <option value="Butuh Perawatan" <?= ($barang['status_perawatan'] ?? '')=='Butuh Perawatan'?'selected':'' ?>>Butuh Perawatan</option>
  </select>
</div>

      <button class="btn btn-primary">Update</button>
      <a href="<?= site_url('barangantik'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
