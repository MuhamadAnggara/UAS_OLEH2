<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
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
        
        .register-container {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(140, 140, 140, 0.2);
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }
        
        .register-header {
            background: linear-gradient(to right, #8a8a8a, #6c757d);
            color: white;
            padding: 35px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .register-header::before {
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
        
        .register-header h2 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 8px;
            position: relative;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .register-header p {
            opacity: 0.95;
            font-size: 16px;
            position: relative;
            font-weight: 300;
        }
        
        .register-body {
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
            display: flex;
            align-items: center;
        }
        
        .form-group label i {
            margin-right: 8px;
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
        
        .password-strength {
            margin-top: 8px;
            font-size: 13px;
            color: #8a8a8a;
            display: flex;
            align-items: center;
        }
        
        .strength-meter {
            height: 5px;
            flex-grow: 1;
            background-color: #e0e0e0;
            border-radius: 5px;
            margin-left: 10px;
            overflow: hidden;
        }
        
        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 5px;
            transition: width 0.3s, background-color 0.3s;
        }
        
        .register-button {
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
            margin-top: 10px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(140, 140, 140, 0.2);
        }
        
        .register-button:hover {
            background: linear-gradient(to right, #7a7a7a, #5c636a);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(140, 140, 140, 0.3);
        }
        
        .register-button:active {
            transform: translateY(0);
        }
        
        .register-button i {
            margin-right: 10px;
        }
        
        .login-section {
            text-align: center;
            margin-top: 35px;
            padding-top: 30px;
            border-top: 1px solid #e9ecef;
        }
        
        .login-section p {
            color: #8a8a8a;
            margin-bottom: 20px;
            font-size: 16px;
        }
        
        .login-button {
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
        
        .login-button:hover {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            color: #5a5a5a;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(140, 140, 140, 0.2);
            border-color: #6c757d;
        }
        
        .login-button i {
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
        
        .circle-3 {
            width: 60px;
            height: 60px;
            top: 70%;
            left: 10%;
            animation-delay: 2s;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .form-row {
            display: flex;
            gap: 20px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 28px;
            }
        }
        
        @media (max-width: 480px) {
            .register-container {
                max-width: 100%;
                border-radius: 15px;
            }
            
            .register-body {
                padding: 30px 25px;
            }
            
            .register-header {
                padding: 30px 15px;
            }
            
            .register-header h2 {
                font-size: 28px;
            }
        }
        
        /* Efek tambahan untuk tema abu-abu/cream */
        .input-container input:focus + i {
            color: #6c757d;
        }
        
        .register-button {
            position: relative;
            overflow: hidden;
        }
        
        .register-button::after {
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
        
        .register-button:hover::after {
            left: 120%;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Latar belakang dengan lingkaran mengambang -->
    <div class="floating-circle circle-1"></div>
    <div class="floating-circle circle-2"></div>
    <div class="floating-circle circle-3"></div>
    
    <div class="register-container">
        <div class="register-header">
            <h2>Registrasi User</h2>
            <p>Bergabunglah dengan kami, buat akun baru Anda</p>
        </div>
        
        <div class="register-body">
            <!-- Pesan error dari PHP session -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert-message error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <form action="<?= base_url('auth/proses_register') ?>" method="post" id="registerForm">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username</label>
                    <div class="input-container">
                        <i class="fas fa-at"></i>
                        <input type="text" id="username" name="username" placeholder="Masukkan username Anda" required>
                    </div>
                    <div class="password-strength">
                        <span id="username-help">Minimal 5 karakter, tanpa spasi</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nama_lengkap"><i class="fas fa-user-circle"></i> Nama Lengkap</label>
                    <div class="input-container">
                        <i class="fas fa-user-friends"></i>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda" required>
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
                    <div class="password-strength">
                        <span id="password-help">Kekuatan password:</span>
                        <div class="strength-meter">
                            <div class="strength-fill" id="strength-fill"></div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="register-button">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>
            </form>
            
            <div class="login-section">
                <p>Sudah punya akun?</p>
                <a href="<?= base_url('auth/login') ?>" class="login-button">
                    <i class="fas fa-sign-in-alt"></i> Login
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
        
        // Password strength indicator (diubah warna untuk tema abu-abu)
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthFill = document.getElementById('strength-fill');
            const passwordHelp = document.getElementById('password-help');
            
            let strength = 0;
            let color = '#d8a6a6';
            let text = 'Lemah';
            
            // Kriteria kekuatan password
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            // Tentukan warna dan teks berdasarkan kekuatan
            switch(strength) {
                case 0:
                case 1:
                    color = '#d8a6a6';
                    text = 'Lemah';
                    break;
                case 2:
                    color = '#e6d4a6';
                    text = 'Cukup';
                    break;
                case 3:
                    color = '#a6d8b0';
                    text = 'Baik';
                    break;
                case 4:
                    color = '#8a8a8a';
                    text = 'Sangat Baik';
                    break;
            }
            
            // Update tampilan
            strengthFill.style.width = (strength * 25) + '%';
            strengthFill.style.backgroundColor = color;
            passwordHelp.textContent = 'Kekuatan password: ' + text;
        });
        
        // Username validation (diubah warna untuk tema abu-abu)
        document.getElementById('username').addEventListener('input', function() {
            const username = this.value;
            const usernameHelp = document.getElementById('username-help');
            
            if (username.length < 5) {
                usernameHelp.style.color = '#d8a6a6';
                usernameHelp.innerHTML = '<i class="fas fa-times-circle"></i> Minimal 5 karakter';
            } else if (/\s/.test(username)) {
                usernameHelp.style.color = '#d8a6a6';
                usernameHelp.innerHTML = '<i class="fas fa-times-circle"></i> Tidak boleh ada spasi';
            } else {
                usernameHelp.style.color = '#a6d8b0';
                usernameHelp.innerHTML = '<i class="fas fa-check-circle"></i> Username valid';
            }
        });
        
        // Form validation dengan pesan yang lebih baik
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            const username = document.getElementById('username').value.trim();
            const namaLengkap = document.getElementById('nama_lengkap').value.trim();
            const password = document.getElementById('password').value.trim();
            
            let isValid = true;
            let errorMessage = '';
            
            if (!username) {
                isValid = false;
                errorMessage = 'Harap masukkan username';
                document.getElementById('username').focus();
            } else if (username.length < 5) {
                isValid = false;
                errorMessage = 'Username minimal 5 karakter';
                document.getElementById('username').focus();
            } else if (/\s/.test(username)) {
                isValid = false;
                errorMessage = 'Username tidak boleh mengandung spasi';
                document.getElementById('username').focus();
            } else if (!namaLengkap) {
                isValid = false;
                errorMessage = 'Harap masukkan nama lengkap';
                document.getElementById('nama_lengkap').focus();
            } else if (!password) {
                isValid = false;
                errorMessage = 'Harap masukkan password';
                document.getElementById('password').focus();
            } else if (password.length < 6) {
                isValid = false;
                errorMessage = 'Password minimal 6 karakter';
                document.getElementById('password').focus();
            }
            
            if (!isValid) {
                event.preventDefault();
                showToast(errorMessage, 'warning');
                return false;
            }
            
            // Jika validasi berhasil, tambahkan efek loading
            const submitBtn = this.querySelector('.register-button');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses pendaftaran...';
            submitBtn.disabled = true;
            
            // Simulasi loading sebelum submit
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
        
        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const registerContainer = document.querySelector('.register-container');
            registerContainer.style.transform = 'translateY(30px) scale(0.95)';
            registerContainer.style.opacity = '0';
            
            setTimeout(() => {
                registerContainer.style.transition = 'transform 0.6s ease, opacity 0.6s ease';
                registerContainer.style.transform = 'translateY(0) scale(1)';
                registerContainer.style.opacity = '1';
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
        
        // Fungsi untuk menampilkan pesan toast (diubah untuk tema abu-abu)
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