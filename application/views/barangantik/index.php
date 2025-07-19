<div class="card">
  <div class="card-header">Data Barang Antik</div>
  <div class="card-body">
    <div class="row mb-2">
      <div class="col-md-6">
        <a href="<?= site_url('barangantik/create'); ?>" class="btn btn-primary mb-2">Tambah Barang</a>
      </div>
      <div class="col-md-6">
        <form method="get" action="<?= site_url('barangantik'); ?>" class="form-inline float-right">
          <input type="text" name="q" class="form-control mr-2" placeholder="Cari nama barang/jenis/pemilik..." value="<?= htmlspecialchars($this->input->get('q', true)) ?>">
          <button type="submit" class="btn btn-info">Cari</button>
          <?php if ($this->input->get('q')): ?>
            <a href="<?= site_url('barangantik'); ?>" class="btn btn-secondary ml-1">Reset</a>
          <?php endif ?>
        </form>
      </div>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Tahun</th>
          <th>Estimasi</th>
          <th>Jenis</th>
          <th>Pemilik</th>
          <th>Status Perawatan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php if (!empty($barangantik)) : ?>
        <?php foreach($barangantik as $i => $b): ?>
        <tr>
          <td><?= $i+1; ?></td>
          <td><?= htmlspecialchars($b['nama_barang']); ?></td>
          <td><?= htmlspecialchars($b['tahun_pembuatan']); ?></td>
          <td><?= htmlspecialchars($b['nilai_estimasi']); ?></td>
          <td><?= htmlspecialchars($b['nama_jenis']); ?></td>
          <td><?= htmlspecialchars($b['nama_pemilik']); ?></td>
          <td>
            <?php if(isset($b['status_perawatan']) && $b['status_perawatan']=='Butuh Perawatan'){ ?>
              <span class="badge badge-danger">Butuh Perawatan</span>
            <?php } else { ?>
              <span class="badge badge-success">Terawat</span>
            <?php } ?>
          </td>
          <td>
            <a href="<?= site_url('barangantik/detail/'.$b['id_barang']); ?>" class="btn btn-info btn-sm">Detail</a>
            <a href="<?= site_url('barangantik/edit/'.$b['id_barang']); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= site_url('barangantik/delete/'.$b['id_barang']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="8" class="text-center text-muted">Belum ada data barang antik.</td>
        </tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
