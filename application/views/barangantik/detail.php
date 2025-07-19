<div class="card">
  <div class="card-header">
    Detail Barang Antik
    <a href="<?= site_url('barangantik'); ?>" class="btn btn-secondary btn-sm float-right">Kembali</a>
  </div>
  <div class="card-body">
    <table class="table">
      <tr>
        <th>Nama Barang</th><td><?= htmlspecialchars($barang['nama_barang']); ?></td>
      </tr>
      <tr>
        <th>Tahun</th><td><?= htmlspecialchars($barang['tahun_pembuatan']); ?></td>
      </tr>
      <tr>
        <th>Estimasi</th><td><?= htmlspecialchars($barang['nilai_estimasi']); ?></td>
      </tr>
      <tr>
        <th>Jenis</th><td><?= htmlspecialchars($barang['nama_jenis']); ?></td>
      </tr>
      <tr>
        <th>Pemilik</th><td><?= htmlspecialchars($barang['nama_pemilik']); ?></td>
      </tr>
      <tr>
        <th>Status Perawatan</th>
        <td>
          <?php
            $badge = ($barang['status_perawatan'] == 'Butuh Perawatan') ? 'badge badge-warning' : 'badge badge-success';
          ?>
          <span class="<?= $badge; ?>">
            <?= htmlspecialchars($barang['status_perawatan'] ?? '-'); ?>
          </span>
        </td>
      </tr>
      <tr>
        <th>Tanggal Input</th>
        <td>
          <?= isset($barang['created_at']) ? date('d M Y H:i', strtotime($barang['created_at'])) : '-' ?>
        </td>
      </tr>
    </table>

    <hr>

    <h6>Riwayat Perawatan</h6>
    <?php if (!empty($barang['riwayat_perawatan'])): ?>
      <table class="table table-sm">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Catatan</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($barang['riwayat_perawatan'] as $rw): ?>
            <tr>
              <td><?= date('d M Y', strtotime($rw['tanggal'])); ?></td>
              <td><?= htmlspecialchars($rw['catatan']); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="text-muted">Belum ada riwayat perawatan.</p>
    <?php endif; ?>

    <!-- Form tambah riwayat perawatan -->
    <form method="post" action="<?= site_url('barangantik/tambah_perawatan/' . $barang['id_barang']) ?>" class="form-inline mb-3">
      <div class="form-group mr-2">
        <label for="tanggal" class="mr-1">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
      </div>
      <div class="form-group mr-2">
        <label for="catatan" class="mr-1">Catatan</label>
        <input type="text" name="catatan" id="catatan" class="form-control" placeholder="Catatan perawatan" required>
      </div>
      <button type="submit" class="btn btn-info btn-sm">Tambah Perawatan</button>
    </form>

    <hr>
    <h6>Log Perubahan</h6>
    <ul class="small">
      <?php foreach($log as $l): ?>
        <li>
          <?= date('d-m-Y H:i', strtotime($l['updated_at'])); ?>:
          <b><?= $l['field']; ?></b> diubah dari
          <i><?= htmlspecialchars($l['before']); ?></i> menjadi
          <i><?= htmlspecialchars($l['after']); ?></i>
        </li>
      <?php endforeach; ?>
      <?php if(empty($log)): ?>
        <li class="text-muted">Belum ada log perubahan.</li>
      <?php endif; ?>
    </ul>
  </div>
</div>
