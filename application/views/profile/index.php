<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body text-center">
        <img src="<?= base_url('uploads/foto/'.($user['foto']??'default.png')) ?>" alt="Foto Profil" class="img-thumbnail mb-2" width="120">
        <h5><?= htmlspecialchars($user['nama']) ?></h5>
        <small><?= htmlspecialchars($user['username']) ?></small>
        <hr>
        <form action="<?= site_url('auth/logout') ?>" method="post">
          <button type="submit" class="btn btn-danger btn-block">Logout</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <div class="card mb-4">
      <div class="card-header"><b>Edit Profil</b></div>
      <div class="card-body">
        <form action="<?= site_url('profile/update') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']??'') ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="no_telp" value="<?= htmlspecialchars($user['no_telp']??'') ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= htmlspecialchars($user['alamat']??'') ?>" class="form-control">
          </div>
          <div class="form-group">
            <label>Foto Profil</label>
            <input type="file" name="foto" class="form-control-file">
            <small class="text-muted">Kosongkan jika tidak ingin ganti foto</small>
          </div>
          <button type="submit" class="btn btn-info">Update Profil</button>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-header"><b>Ganti Password</b></div>
      <div class="card-body">
        <form action="<?= site_url('profile/update_password') ?>" method="post">
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-warning">Ganti Password</button>
        </form>
      </div>
    </div>
  </div>
</div>
