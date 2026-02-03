<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* SAMA PERSIS dengan desain Tambah Produk */
        :root {
            --cream-bg: #F8F4EA;
            --cream-card: #FFFDF6;
            --blue-light: #E3F2FD;
            --blue-primary: #42A5F5;
            --blue-dark: #1976D2;
            --blue-hover: #64B5F6;
            --green-primary: #4CAF50;
            --green-hover: #66BB6A;
            --gray-text: #424242;
            --gray-border: #E0E0E0;
            --gray-light: #F5F5F5;
            --gray-medium: #757575;
            --shadow-light: 0 4px 12px rgba(66, 165, 245, 0.08);
            --shadow-medium: 0 6px 20px rgba(66, 165, 245, 0.12);
            --shadow-form: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background: linear-gradient(135deg, var(--cream-bg) 0%, #F0EBDF 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow-form);
            margin: 30px auto;
            position: relative;
            overflow: hidden;
        }
        
        /* Header Styling - SAMA dengan Tambah Produk */
        h3 {
            color: var(--blue-dark);
            font-weight: 800;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid var(--blue-primary);
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.8rem;
        }
        
        h3::before {
            content: '➕';
            font-size: 2rem;
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        h3::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 200px;
            height: 3px;
            background: linear-gradient(90deg, var(--blue-primary), var(--blue-hover));
            border-radius: 3px;
        }
        
        /* Form Container - SAMA dengan Tambah Produk */
        .form-container {
            background: var(--cream-card);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid var(--gray-border);
            box-shadow: var(--shadow-light);
        }
        
        /* Form Group Styling - SAMA dengan Tambah Produk */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--blue-dark);
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .form-group label::before {
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 0.9rem;
            color: var(--blue-primary);
        }
        
        /* Ikon untuk label */
        .form-group label::before {
            content: "📂";
        }
        
        /* Form Controls - SAMA dengan Tambah Produk */
        .form-control {
            border: 2px solid var(--gray-border);
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
            color: var(--gray-text);
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .form-control:focus {
            border-color: var(--blue-primary);
            box-shadow: 0 0 0 0.3rem rgba(66, 165, 245, 0.15);
            transform: translateY(-2px);
            background: white;
        }
        
        .form-control::placeholder {
            color: var(--gray-medium);
            opacity: 0.7;
        }
        
        /* Button Container - SAMA dengan Tambah Produk */
        .button-container {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid var(--gray-light);
        }
        
        /* Button Styling - SAMA PERSIS dengan Tambah Produk */
        .btn {
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            min-width: 140px;
            text-decoration: none;
            cursor: pointer;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            box-shadow: 0 6px 15px rgba(76, 175, 80, 0.3);
            flex: 1;
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #66BB6A, #4CAF50);
            color: white;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 10px 20px rgba(76, 175, 80, 0.4);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #757575, #424242);
            color: white;
            box-shadow: 0 6px 15px rgba(117, 117, 117, 0.3);
            flex: 1;
        }
        
        .btn-secondary:hover {
            background: linear-gradient(135deg, #9E9E9E, #757575);
            color: white;
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 10px 20px rgba(117, 117, 117, 0.4);
        }
        
        /* Validation Styling - SAMA dengan Tambah Produk */
        .is-invalid {
            border-color: #f44336 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23f44336' viewBox='0 0 12 12'%3E%3Cpath d='M6 5.25a.75.75 0 0 1 .75.75v2a.75.75 0 0 1-1.5 0V6A.75.75 0 0 1 6 5.25Zm0 4a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Z'/%3E%3Cpath fill-rule='evenodd' d='M6 0a6 6 0 1 0 0 12A6 6 0 0 0 6 0ZM1.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0Z' clip-rule='evenodd'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 16px;
        }
        
        .invalid-feedback {
            color: #f44336;
            font-size: 0.875rem;
            margin-top: 5px;
            font-weight: 500;
        }
        
        /* Required field indicator - SAMA dengan Tambah Produk */
        .form-group label::after {
            content: '*';
            color: #f44336;
            margin-left: 4px;
            font-weight: bold;
        }
        
        /* Responsive Design - SAMA dengan Tambah Produk */
        @media (max-width: 768px) {
            .container {
                padding: 25px;
                margin: 15px;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .button-container {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            h3 {
                font-size: 1.6rem;
            }
        }
        
        /* Animation - SAMA dengan Tambah Produk */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-group {
            animation: fadeIn 0.5s ease forwards;
            animation-delay: 0.1s;
        }
        
        .button-container {
            animation: fadeIn 0.5s ease forwards;
            animation-delay: 0.2s;
        }
        
        /* Card Effect - SAMA dengan Tambah Produk */
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--blue-primary), var(--green-primary), var(--blue-hover));
        }
        
        /* Success Message - SAMA dengan Tambah Produk */
        .alert-success {
            background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
            border: none;
            border-left: 4px solid #4CAF50;
            border-radius: 10px;
            color: #2E7D32;
            padding: 15px 20px;
            margin-bottom: 25px;
            box-shadow: var(--shadow-light);
            display: none;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3>Tambah Kategori</h3>
    
    <div id="successMessage" class="alert-success" style="display: none;">
        <i class="fas fa-check-circle"></i> Kategori berhasil ditambahkan!
    </div>
    
    <div class="form-container">
        <form action="<?= base_url('admin/kategori/simpan') ?>" method="post" id="kategoriForm">

            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" required
                       placeholder="Masukkan nama kategori">
            </div>

            <div class="button-container">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="<?= base_url('admin/kategori') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('kategoriForm');
    const input = form.querySelector('.form-control[required]');
    const successMessage = document.getElementById('successMessage');
    
    // Real-time validation - SAMA dengan Tambah Produk
    if(input) {
        input.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('is-invalid');
                // Create or update feedback message
                let feedback = this.nextElementSibling;
                if (!feedback || !feedback.classList.contains('invalid-feedback')) {
                    feedback = document.createElement('div');
                    feedback.className = 'invalid-feedback';
                    this.parentNode.appendChild(feedback);
                }
                feedback.textContent = 'Nama kategori wajib diisi';
            } else {
                this.classList.remove('is-invalid');
                const feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            }
        });
    }
    
    // Form submission - SAMA dengan Tambah Produk
    form.addEventListener('submit', function(e) {
        let valid = true;
        
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            valid = false;
        }
        
        if (!valid) {
            e.preventDefault();
            alert('Harap isi nama kategori');
            return;
        }
        
        // Show success message on successful submission
        // Note: In real implementation, this would be handled by PHP
        setTimeout(() => {
            successMessage.style.display = 'block';
            successMessage.scrollIntoView({ behavior: 'smooth' });
        }, 500);
    });
    
    // Input character counter (optional)
    const charCounter = document.createElement('div');
    charCounter.className = 'char-counter text-muted mt-2';
    charCounter.style.fontSize = '0.85rem';
    charCounter.innerHTML = 'Jumlah karakter: <span id="charCount">0</span>';
    input.parentNode.appendChild(charCounter);
    
    input.addEventListener('input', function() {
        const charCount = this.value.length;
        document.getElementById('charCount').textContent = charCount;
        
        // Optional: Change color based on length
        if (charCount > 50) {
            charCounter.style.color = '#f44336';
        } else if (charCount > 30) {
            charCounter.style.color = '#FF9800';
        } else {
            charCounter.style.color = '#757575';
        }
    });
    
    // Trigger initial count
    input.dispatchEvent(new Event('input'));
});
</script>

</body>
</html>