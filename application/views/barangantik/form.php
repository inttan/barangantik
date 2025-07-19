<form method="post" action="<?= site_url('barangantik/save'.($barang ? '/'.$barang->id_barang : '')) ?>" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama Barang</label>
    <input type="text" class="form-control" name="nama_barang" value="<?= set_value('nama_barang', $barang->nama_barang ?? '') ?>" required>
  </div>
  <div class="form-group">
    <label>Tahun Pembuatan</label>
    <input type="number" class="form-control" name="tahun_pembuatan" value="<?= set_value('tahun_pembuatan', $barang->tahun_pembuatan ?? '') ?>" required>
  </div>
  <div class="form-group">
    <label>Nilai Estimasi</label>
    <input type="number" class="form-control" name="nilai_estimasi" value="<?= set_value('nilai_estimasi', $barang->nilai_estimasi ?? '') ?>" required>
  </div>
  <div class="form-group">
    <label>Jenis Barang</label>
    <select class="form-control" name="jenis_barang_id" required>
      <option value="">- Pilih -</option>
      <?php foreach($jenis_list as $j): ?>
        <option value="<?= $j->id_jenis ?>" <?= set_select('jenis_barang_id', $j->id_jenis, isset($barang) && $barang->jenis_barang_id == $j->id_jenis) ?>><?= htmlspecialchars($j->nama_jenis) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Pemilik</label>
    <select class="form-control" name="pemilik_id" required>
      <option value="">- Pilih -</option>
      <?php foreach($pemilik_list as $p): ?>
        <option value="<?= $p->id_pemilik ?>" <?= set_select('pemilik_id', $p->id_pemilik, isset($barang) && $barang->pemilik_id == $p->id_pemilik) ?>><?= htmlspecialchars($p->nama_pemilik) ?></option>
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

  <button class="btn btn-primary">Simpan</button>
  <a href="<?= site_url('barangantik') ?>" class="btn btn-secondary">Kembali</a>
</form>
