<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Barang Antik</title>
    <link rel="icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon"/>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
    <style>
        body {
            background: linear-gradient(120deg, #1976d2 0%, #c471f5 100%);
            min-height: 100vh;
        }
        .login-box {
            animation: fadeIn 1s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-40px);}
            to   { opacity: 1; transform: translateY(0);}
        }
        .brand-logo {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 24px rgba(80,80,120,0.12);
        }
        .login-title {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #333;
        }
        .login-box .card {
            box-shadow: 0 6px 32px rgba(30,20,100,0.16);
            border-radius: 18px;
        }
        .input-group-text {
            background: #eee;
        }
        .btn-primary {
            background: linear-gradient(90deg,#1976d2 60%,#c471f5 100%);
            border: none;
            font-weight: bold;
        }
        .footer-text {
            font-size: 0.95em;
            color: #444;
            margin-top: 24px;
            opacity: .7;
            text-align: center;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center bg-white border-bottom-0" style="border-radius:18px 18px 0 0;">
            <div class="brand-logo mb-1">
                <i class="fas fa-cube fa-2x" style="color:#1976d2;"></i>
            </div>
            <span class="login-title">Manajemen Barang <span style="color:#c471f5;">ANTIK</span></span>
            <div class="mb-1" style="font-size:.9em; color:#888;">Silakan login untuk masuk dashboard</div>
        </div>
        <div class="card-body">
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>
            <form method="post" action="<?= site_url('auth/login') ?>">
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block py-2 shadow">Masuk</button>
            </form>
            <div class="footer-text mt-3">
                &copy; <?= date('Y') ?> Barang Antik CRUD <br>Powered by <b>CodeIgniter 3</b> &amp; <b>AdminLTE</b>
            </div>
        </div>
    </div>
</div>
</body>
</html>
