<div class="card">
  <div class="card-header">Data Pemilik</div>
  <div class="card-body">
    <div class="row mb-2">
      <div class="col-md-6">
        <a href="<?= site_url('pemilik/create'); ?>" class="btn btn-primary mb-2">Tambah Pemilik</a>
      </div>
      <div class="col-md-6">
        <form method="get" action="<?= site_url('pemilik'); ?>" class="form-inline float-right">
          <input type="text" name="q" class="form-control mr-2" placeholder="Cari nama/alamat/kontak..." value="<?= htmlspecialchars($this->input->get('q', true)) ?>">
          <button type="submit" class="btn btn-info">Cari</button>
          <?php if ($this->input->get('q')): ?>
            <a href="<?= site_url('pemilik'); ?>" class="btn btn-secondary ml-1">Reset</a>
          <?php endif ?>
        </form>
      </div>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Pemilik</th>
          <th>Alamat</th>
          <th>Kontak</th>
          <th>Tanggal Terdaftar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php if (!empty($pemilik)): ?>
        <?php foreach($pemilik as $i => $p): ?>
        <tr>
          <td><?= $i+1; ?></td>
          <td><?= htmlspecialchars($p['nama_pemilik']); ?></td>
          <td><?= htmlspecialchars($p['alamat']); ?></td>
          <td><?= htmlspecialchars($p['kontak']); ?></td>
          <td>
            <?= isset($p['tanggal_terdaftar']) ? date('d M Y H:i', strtotime($p['tanggal_terdaftar'])) : '-' ?>
          </td>
          <td>
            <a href="<?= site_url('pemilik/edit/'.$p['id_pemilik']); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= site_url('pemilik/delete/'.$p['id_pemilik']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted">Data pemilik tidak ditemukan.</td>
        </tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
