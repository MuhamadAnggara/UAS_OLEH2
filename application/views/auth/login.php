<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            background-image: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .login-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(140, 140, 140, 0.2);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .login-header {
            background: linear-gradient(to right, #8a8a8a, #6c757d);
            color: white;
            padding: 35px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .login-header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.3;
        }
        
        .login-header h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 8px;
            position: relative;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .login-header p {
            opacity: 0.95;
            font-size: 16px;
            position: relative;
            font-weight: 300;
        }
        
        .login-body {
            padding: 40px 40px 35px;
            background-color: #fafafa;
        }
        
        .alert-message {
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 28px;
            font-size: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }
        
        .alert-message.error {
            background-color: #fdf2f2;
            color: #9e6a6a;
            border-left: 5px solid #d8a6a6;
        }
        
        .alert-message.warning {
            background-color: #fdf8e6;
            color: #b38f5c;
            border-left: 5px solid #e6d4a6;
        }
        
        .alert-message i {
            margin-right: 12px;
            font-size: 20px;
        }
        
        .form-group {
            margin-bottom: 28px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: #5a5a5a;
            font-size: 16px;
        }
        
        .input-container {
            position: relative;
        }
        
        .input-container i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #8a8a8a;
            font-size: 20px;
            z-index: 1;
        }
        
        .input-container input {
            width: 100%;
            padding: 16px 18px 16px 55px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s;
            background-color: #f8f9fa;
            color: #5a5a5a;
            position: relative;
        }
        
        .input-container input:focus {
            border-color: #a0a0a0;
            outline: none;
            box-shadow: 0 0 0 4px rgba(160, 160, 160, 0.1);
            background-color: white;
        }
        
        .input-container input::placeholder {
            color: #b0b0b0;
        }
        
        .login-button {
            background: linear-gradient(to right, #8a8a8a, #6c757d);
            color: white;
            border: none;
            padding: 18px;
            width: 100%;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 15px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(140, 140, 140, 0.2);
        }
        
        .login-button:hover {
            background: linear-gradient(to right, #7a7a7a, #5c636a);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(140, 140, 140, 0.3);
        }
        
        .login-button:active {
            transform: translateY(0);
        }
        
        .login-button i {
            margin-right: 10px;
        }
        
        .divider {
            text-align: center;
            margin: 35px 0;
            position: relative;
            color: #a0a0a0;
            font-size: 15px;
        }
        
        .divider:before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            width: 45%;
            height: 1px;
            background: linear-gradient(to right, transparent, #d0d0d0);
        }
        
        .divider:after {
            content: "";
            position: absolute;
            top: 50%;
            right: 0;
            width: 45%;
            height: 1px;
            background: linear-gradient(to left, transparent, #d0d0d0);
        }
        
        .register-section {
            text-align: center;
            margin-top: 35px;
            padding-top: 30px;
            border-top: 1px solid #e9ecef;
        }
        
        .register-section p {
            color: #8a8a8a;
            margin-bottom: 20px;
            font-size: 16px;
        }
        
        .register-button {
            display: inline-block;
            padding: 14px 35px;
            background-color: white;
            color: #6c757d;
            border: 2px solid #8a8a8a;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 16px;
            box-shadow: 0 4px 10px rgba(140, 140, 140, 0.1);
        }
        
        .register-button:hover {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            color: #5a5a5a;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(140, 140, 140, 0.2);
            border-color: #6c757d;
        }
        
        .register-button i {
            margin-right: 8px;
        }
        
        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #8a8a8a;
            cursor: pointer;
            font-size: 20px;
            z-index: 2;
        }
        
        .password-toggle:hover {
            color: #6c757d;
        }
        
        .footer-note {
            text-align: center;
            margin-top: 25px;
            color: #a0a0a0;
            font-size: 14px;
        }
        
        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(200, 200, 200, 0.1);
            animation: float 15s infinite ease-in-out;
            border: 1px solid rgba(200, 200, 200, 0.2);
        }
        
        .circle-1 {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }
        
        .circle-2 {
            width: 120px;
            height: 120px;
            bottom: 15%;
            right: 7%;
            animation-delay: 5s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        @media (max-width: 480px) {
            .login-container {
                max-width: 100%;
                border-radius: 15px;
            }
            
            .login-body {
                padding: 30px 25px;
            }
            
            .login-header {
                padding: 30px 15px;
            }
            
            .login-header h2 {
                font-size: 28px;
            }
        }
        
        /* Efek tambahan untuk tema abu-abu/cream */
        .input-container input:focus + i {
            color: #6c757d;
        }
        
        .login-button {
            position: relative;
            overflow: hidden;
        }
        
        .login-button::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 20%;
            height: 200%;
            background: rgba(255, 255, 255, 0.15);
            transform: rotate(30deg);
            transition: left 0.5s ease;
        }
        
        .login-button:hover::after {
            left: 120%;
        }
        
        .form-group label i {
            margin-right: 8px;
            color: #8a8a8a;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Latar belakang dengan lingkaran mengambang -->
    <div class="floating-circle circle-1"></div>
    <div class="floating-circle circle-2"></div>
    
    <div class="login-container">
        <div class="login-header">
            <h2>Login User</h2>
            <p>Selamat datang! Silakan masuk ke akun Anda</p>
        </div>
        
        <div class="login-body">
            <!-- Pesan error/warning dari PHP session -->
            <?php if ($this->session->flashdata('warning')): ?>
                <div class="alert-message warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <?= $this->session->flashdata('warning') ?>
                </div>
            <?php endif; ?>
            
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-message error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <form action="<?= base_url('auth/proses_login') ?>" method="post" id="loginForm">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user-circle"></i> Username</label>
                    <div class="input-container">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password"><i class="fas fa-key"></i> Password</label>
                    <div class="input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <button type="submit" class="login-button">
                    <i class="fas fa-sign-in-alt"></i> Login Sekarang
                </button>
            </form>
            
            <div class="divider">Belum memiliki akun?</div>
            
            <div class="register-section">
                <p>Bergabunglah dengan kami sekarang</p>
                <a href="<?= base_url('auth/register') ?>" class="register-button">
                    <i class="fas fa-user-plus"></i> Daftar di sini
                </a>
            </div>
        </div>
    </div>

    <script>
        // Toggle visibility password
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                this.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                this.setAttribute('aria-label', 'Tampilkan password');
            }
        });
        
        // Form validation dengan pesan yang lebih baik
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            
            if (!username) {
                event.preventDefault();
                showToast('Harap masukkan username', 'warning');
                document.getElementById('username').focus();
                return false;
            }
            
            if (!password) {
                event.preventDefault();
                showToast('Harap masukkan password', 'warning');
                document.getElementById('password').focus();
                return false;
            }
            
            // Jika validasi berhasil, tambahkan efek loading
            const submitBtn = this.querySelector('.login-button');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            submitBtn.disabled = true;
            
            // Simulasi loading sebelum submit
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
        
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const loginContainer = document.querySelector('.login-container');
            loginContainer.style.transform = 'translateY(30px) scale(0.95)';
            loginContainer.style.opacity = '0';
            
            setTimeout(() => {
                loginContainer.style.transition = 'transform 0.6s ease, opacity 0.6s ease';
                loginContainer.style.transform = 'translateY(0) scale(1)';
                loginContainer.style.opacity = '1';
            }, 100);
            
            // Tambahkan efek pada input saat fokus
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });
        
        // Fungsi untuk menampilkan pesan toast (opsional)
        function showToast(message, type) {
            // Hapus toast sebelumnya jika ada
            const existingToast = document.querySelector('.toast-message');
            if (existingToast) {
                existingToast.remove();
            }
            
            // Buat elemen toast baru
            const toast = document.createElement('div');
            toast.className = `toast-message ${type}`;
            toast.innerHTML = `<i class="fas fa-${type === 'warning' ? 'exclamation-triangle' : 'info-circle'}"></i> ${message}`;
            
            // Styling untuk toast (diubah untuk tema abu-abu/cream)
            toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'warning' ? '#fdf8e6' : '#f8f9fa'};
                color: ${type === 'warning' ? '#b38f5c' : '#6c757d'};
                padding: 15px 20px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.08);
                z-index: 1000;
                display: flex;
                align-items: center;
                border-left: 5px solid ${type === 'warning' ? '#e6d4a6' : '#8a8a8a'};
                animation: slideIn 0.3s ease;
                border: 1px solid ${type === 'warning' ? '#f0e6cc' : '#e0e0e0'};
            `;
            
            // Tambahkan ke body
            document.body.appendChild(toast);
            
            // Hapus toast setelah 3 detik
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => {
                    if (toast.parentNode) {
                        toast.parentNode.removeChild(toast);
                    }
                }, 300);
            }, 3000);
        }
        
        // Tambahkan keyframe animasi
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>