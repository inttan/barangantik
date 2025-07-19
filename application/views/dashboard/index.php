<style>
  .small-box {
    border-radius: 16px;
    box-shadow: 0 6px 32px rgba(30,20,100,0.11), 0 2px 8px rgba(60,60,120,0.06);
    position: relative;
    overflow: hidden;
    transition: transform .18s, box-shadow .18s;
  }
  .small-box:hover {
    transform: translateY(-3px) scale(1.025);
    box-shadow: 0 10px 40px rgba(60,40,180,0.13);
    z-index: 2;
  }
  .small-box .icon {
    position: absolute;
    top: -12px; right: 20px;
    opacity: .2;
    font-size: 78px;
    z-index: 1;
    transition: opacity .18s;
  }
  .small-box:hover .icon { opacity: .35; }
  .small-box .inner {
    position: relative; z-index: 2;
    padding-top: 16px; padding-bottom: 16px;
  }
  .small-box.bg-warning .icon { color: #ffc107; }
  .small-box.bg-danger .icon { color: #dc3545; }
  .small-box.bg-success .icon { color: #28a745; }
  .small-box.bg-info .icon { color: #17a2b8; }
  .small-box.bg-warning { color: #523d00; }
  .small-box.bg-danger { color: #fff; }
  .small-box.bg-success { color: #fff; }
  .small-box.bg-info { color: #fff; }
  .small-box h3, .small-box h5 { margin:0; font-weight: bold;}
  .small-box span { font-size:1.05em; font-weight: 600; }
  .table-responsive { overflow-x: auto; }
  .card-header b { font-size: 1.13em;}
  .card { border-radius: 18px; }
  @media (max-width: 900px) {
    .small-box .icon { font-size:52px; right: 8px; top:-2px;}
    .small-box .inner {padding:12px 0;}
  }
</style>

<h3 class="mb-4 font-weight-bold" style="letter-spacing:.5px;">
  <i class="fas fa-home text-primary mr-2"></i>
  Dashboard <span style="color:#c471f5;">Inventaris Barang Antik</span>
</h3>
<div class="row">
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $jumlah_jenis; ?></h3>
        <p>Jenis Barang</p>
      </div>
      <div class="icon"><i class="fas fa-th-list"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $jumlah_barang; ?></h3>
        <p>Jumlah Barang</p>
      </div>
      <div class="icon"><i class="fas fa-cube"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>Rp<?= number_format($total_estimasi,0,',','.'); ?></h3>
        <p>Total Nilai Estimasi</p>
      </div>
      <div class="icon"><i class="fas fa-money-bill-wave"></i></div>
    </div>
  </div>
  <div class="col-md-3 col-6 mb-3">
    <div class="small-box bg-warning">
      <div class="inner">
        <h5 class="mb-1">Barang Termahal</h5>
        <span><?= htmlspecialchars($barang_termahal_nama ?? '-'); ?></span>
        <p class="mb-1">Rp<?= number_format($barang_termahal_harga ?? 0,0,',','.'); ?></p>
      </div>
      <div class="icon"><i class="fas fa-star"></i></div>
    </div>
  </div>
</div>

<div class="card mt-4">
  <div class="card-header bg-white" style="border-radius:18px 18px 0 0;">
    <b><i class="fas fa-list-alt text-primary mr-2"></i>Rekap Per Jenis Barang</b>
  </div>
  <div class="card-body p-0 table-responsive">
    <table class="table table-bordered m-0">
      <thead class="thead-light">
        <tr>
          <th>Jenis Barang</th>
          <th>Jumlah Barang</th>
          <th>Total Estimasi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($rekap as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama_jenis']); ?></td>
          <td><?= $row['jumlah_barang'] ?: 0; ?></td>
          <td>Rp<?= number_format($row['total_estimasi'] ?: 0,0,',','.'); ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Chart Distribusi Barang per Jenis -->
<div class="card mt-4">
  <div class="card-header bg-white" style="border-radius:18px 18px 0 0;">
    <b><i class="fas fa-chart-pie text-success mr-2"></i>Grafik Distribusi Barang per Jenis</b>
  </div>
  <div class="card-body" style="background: #f8fafb;">
    <canvas id="chartBarangJenis" height="120"></canvas>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Ambil data dari PHP
  var dataLabel = <?= json_encode(array_column($rekap, 'nama_jenis')); ?>;
  var dataJumlah = <?= json_encode(array_map('intval', array_column($rekap, 'jumlah_barang'))); ?>;

  // Pie Chart
  var ctx = document.getElementById('chartBarangJenis').getContext('2d');
  var chart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: dataLabel,
          datasets: [{
              data: dataJumlah,
              backgroundColor: [
                '#17a2b8', '#28a745', '#ffc107', '#dc3545', '#6610f2', '#fd7e14', '#20c997'
              ],
              borderWidth: 2,
              borderColor: '#fff'
          }]
      },
      options: {
          responsive: true,
          plugins: {
              legend: {
                  position: 'bottom',
                  labels: { font: {size:14} }
              },
              title: {
                  display: false
              }
          }
      }
  });
</script>
