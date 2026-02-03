<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
        
        /* Header Styling */
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
        
        /* Form Container */
        .form-container {
            background: var(--cream-card);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid var(--gray-border);
            box-shadow: var(--shadow-light);
        }
        
        /* Form Group Styling */
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
        
        /* Icons for each label */
        .form-group:nth-child(1) label::before { content: "📦"; } /* Nama Produk */
        .form-group:nth-child(2) label::before { content: "📂"; } /* Kategori */
        .form-group:nth-child(3) label::before { content: "💰"; } /* Harga */
        .form-group:nth-child(4) label::before { content: "📊"; } /* Stok */
        .form-group:nth-child(5) label::before { content: "📝"; } /* Deskripsi */
        .form-group:nth-child(6) label::before { content: "🖼️"; } /* Gambar */
        
        /* Form Controls */
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
        
        /* Select Styling */
        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2342A5F5' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 18px center;
            background-size: 16px;
            padding-right: 45px;
        }
        
        /* Textarea Styling */
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
        }
        
        /* File Input Styling */
        input[type="file"] {
            padding: 12px;
        }
        
        input[type="file"]::file-selector-button {
            background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            margin-right: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        input[type="file"]::file-selector-button:hover {
            background: linear-gradient(135deg, var(--blue-hover), var(--blue-primary));
            transform: translateY(-2px);
        }
        
        /* Button Container */
        .button-container {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 2px solid var(--gray-light);
        }
        
        /* Button Styling - KONSISTEN dengan desain sebelumnya */
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
        
        /* Validation Styling */
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
        
        /* Required field indicator */
        .form-group label::after {
            content: '*';
            color: #f44336;
            margin-left: 4px;
            font-weight: bold;
        }
        
        .form-group:last-child label::after {
            content: '';
        }
        
        /* Responsive Design */
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
        
        /* Animation */
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
        }
        
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        .form-group:nth-child(4) { animation-delay: 0.4s; }
        .form-group:nth-child(5) { animation-delay: 0.5s; }
        .form-group:nth-child(6) { animation-delay: 0.6s; }
        .button-container { animation-delay: 0.7s; }
        
        /* Card Effect */
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--blue-primary), var(--green-primary), var(--blue-hover));
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h3>Tambah Produk</h3>
    
    <div class="form-container">
        <form action="<?= base_url('admin/produk/simpan') ?>" method="post" enctype="multipart/form-data" id="produkForm">

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" required 
                       placeholder="Masukkan nama produk">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k->id_kategori ?>"><?= htmlspecialchars($k->nama_kategori) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required 
                       placeholder="Masukkan harga" min="0">
            </div>s

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" 
                          placeholder="Masukkan deskripsi produk"></textarea>
            </div>

            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF. Maksimal: 2MB</small>
            </div>

            <div class="button-container">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('produkForm');
    const inputs = form.querySelectorAll('.form-control[required]');
    
    // Real-time validation
    inputs.forEach(input => {
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
                feedback.textContent = 'Field ini wajib diisi';
            } else {
                this.classList.remove('is-invalid');
                const feedback = this.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                    feedback.remove();
                }
            }
        });
    });
    
    // File size validation
    const fileInput = form.querySelector('input[type="file"]');
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            const maxSize = 2 * 1024 * 1024; // 2MB
            if (this.files[0] && this.files[0].size > maxSize) {
                alert('Ukuran file terlalu besar. Maksimal 2MB');
                this.value = '';
            }
        });
    }
    
    // Form submission enhancement
    form.addEventListener('submit', function(e) {
        let valid = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('is-invalid');
                valid = false;
            }
        });
        
        if (!valid) {
            e.preventDefault();
            alert('Harap lengkapi semua field yang wajib diisi');
        }
    });
    
    // Add currency formatting for price input
    const hargaInput = form.querySelector('input[name="harga"]');
    if (hargaInput) {
        hargaInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value) {
                this.value = parseInt(value).toLocaleString('id-ID');
            }
        });
    }
});
</script>

</body>
</html>