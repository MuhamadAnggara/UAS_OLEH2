<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        /* Warna tema abu-abu dan krem */
        :root {
            --cream-bg: #F5F0E6;
            --cream-light: #FAF7F0;
            --gray-dark: #2C3E50;
            --gray-medium: #5D6D7E;
            --gray-light: #ECF0F1;
            --accent: #8B7355;
            --border-color: #D5DBDB;
        }
        
        body {
            background: var(--cream-bg);
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 0;
            margin-top: 0;
        }
        
        .container.mt-5 {
            margin-top: 0 !important;
        }
        
        h3.text-center {
            color: var(--gray-dark);
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 2rem !important;
            font-size: 2rem;
        }
        
        h3.text-center::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: var(--accent);
            margin: 10px auto 0;
            border-radius: 2px;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(44, 62, 80, 0.12);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(44, 62, 80, 0.15);
        }
        
        .card-header {
            background: var(--gray-dark) !important;
            color: white;
            padding: 1.5rem;
            text-align: center;
            border-bottom: 3px solid var(--accent) !important;
            font-weight: 600;
            font-size: 1.2rem;
            letter-spacing: 0.5px;
        }
        
        .card-body {
            padding: 2rem;
            background: var(--cream-light);
        }
        
        .card-footer {
            background: var(--gray-light);
            color: var(--gray-medium) !important;
            font-size: 0.85rem;
            padding: 1rem;
            border-top: 1px solid var(--border-color) !important;
        }
        
        .form-label {
            color: var(--gray-dark);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s;
            background: white;
        }
        
        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.25rem rgba(139, 115, 85, 0.2);
            background: white;
        }
        
        .form-control::placeholder {
            color: #95A5A6;
            font-size: 0.9rem;
        }
        
        .btn-dark {
            background: var(--gray-dark) !important;
            border: none !important;
            border-radius: 8px;
            padding: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            margin-top: 0.5rem;
        }
        
        .btn-dark:hover {
            background: var(--accent) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(139, 115, 85, 0.3);
        }
        
        .alert-danger {
            background-color: rgba(231, 76, 60, 0.1);
            border: 1px solid rgba(231, 76, 60, 0.2);
            border-left: 4px solid #E74C3C;
            color: #C0392B;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        /* Input dengan ikon visual */
        .input-wrapper {
            position: relative;
        }
        
        .input-wrapper:before {
            content: '';
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            background-size: contain;
            background-repeat: no-repeat;
            opacity: 0.6;
            z-index: 10;
        }
        
        /* Efek untuk input username */
        .mb-3:first-of-type .form-control {
            padding-left: 2.5rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%235D6D7E' viewBox='0 0 16 16'%3E%3Cpath d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: 12px center;
        }
        
        /* Efek untuk input password */
        .mb-3:last-of-type .form-control {
            padding-left: 2.5rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%235D6D7E' viewBox='0 0 16 16'%3E%3Cpath d='M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: 12px center;
        }
        
        .mb-3 .form-control:focus {
            background-image: none;
            padding-left: 1rem;
        }
        
        /* Responsif */
        @media (max-width: 768px) {
            .col-md-4 {
                width: 90%;
                max-width: 400px;
            }
            
            .card-body {
                padding: 1.5rem;
            }
            
            h3.text-center {
                font-size: 1.8rem;
            }
        }
        
        /* Animasi loading untuk tombol */
        @keyframes buttonLoading {
            0% { opacity: 0.7; }
            50% { opacity: 1; }
            100% { opacity: 0.7; }
        }
        
        .btn-loading {
            animation: buttonLoading 1.5s infinite;
        }
    </style>
</head>
<body style="background:#f5f0e6;">

<div class="container mt-5">
    <h3 class="text-center mb-4">AdminPanel</h3>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">

                <div class="card-header bg-dark text-white text-center">
                    Login Admin
                </div>

                <div class="card-body">

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/auth/proses_login') ?>" method="post">

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input 
                                type="text" 
                                name="username" 
                                class="form-control" 
                                placeholder="Masukkan username admin"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Masukkan password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-dark w-100">
                            Login
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Script sederhana untuk efek interaktif
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const submitBtn = form.querySelector('button[type="submit"]');
        
        // Efek fokus pada input
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('input-active');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('input-active');
            });
        });
        
        // Efek loading pada tombol saat submit
        form.addEventListener('submit', function() {
            submitBtn.classList.add('btn-loading');
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Memproses...';
            submitBtn.disabled = true;
            
            // Reset setelah 3 detik (untuk demo saja)
            setTimeout(() => {
                submitBtn.classList.remove('btn-loading');
                submitBtn.innerHTML = 'Login';
                submitBtn.disabled = false;
            }, 3000);
        });
    });
</script>

</body>
</html>