<div class="card">
  <div class="card-header">Data Jenis Barang</div>
  <div class="card-body">
    <div class="row mb-2">
      <div class="col-md-6">
        <a href="<?= site_url('jenisbarang/create'); ?>" class="btn btn-primary mb-2">Tambah Jenis</a>
      </div>
      <div class="col-md-6">
        <form method="get" action="<?= site_url('jenisbarang'); ?>" class="form-inline float-right">
          <input type="text" name="q" class="form-control mr-2" placeholder="Cari jenis..." value="<?= htmlspecialchars($this->input->get('q', true)) ?>">
          <button type="submit" class="btn btn-info">Cari</button>
          <?php if ($this->input->get('q')): ?>
            <a href="<?= site_url('jenisbarang'); ?>" class="btn btn-secondary ml-1">Reset</a>
          <?php endif ?>
        </form>
      </div>
    </div>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Jenis</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($jenis as $i => $j): ?>
        <tr>
          <td><?= $i+1; ?></td>
          <td><?= htmlspecialchars($j['nama_jenis']); ?></td>
          <td>
            <a href="<?= site_url('jenisbarang/edit/'.$j['id_jenis']); ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= site_url('jenisbarang/delete/'.$j['id_jenis']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php if(empty($jenis)): ?>
        <tr><td colspan="3" class="text-center text-muted">Data tidak ditemukan.</td></tr>
      <?php endif ?>
      </tbody>
    </table>
  </div>
</div>
