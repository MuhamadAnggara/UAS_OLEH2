<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Oleh-Oleh Khas Malang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- CSS UNTUK DESAIN PRODUK -->
    <style>
        /* VARIABEL WARNA ABU-ABU DAN CREAM */
        :root {
            --abu-muda: #f5f5f5;
            --abu-medium: #e0e0e0;
            --abu-gelap: #757575;
            --abu-sangat-gelap: #424242;
            --cream-muda: #f8f5f0;
            --cream-medium: #f0ebe3;
            --cream-gelap: #e8e0d5;
            --cream-coklat: #d7ccc8;
            --aksen-emas: #8b7355;
            --hijau: #5d8a66;
            --merah: #a75d5d;
            --biru-muted: #6c8ea6;
        }
        
        /* STYLE DASAR */
        body {
            background-color: var(--cream-muda);
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            color: var(--abu-sangat-gelap);
            line-height: 1.6;
            padding-bottom: 50px;
        }
        
        /* CONTAINER UTAMA */
        .container.mt-5.mb-5 {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
            border: 1px solid var(--abu-medium);
            margin-top: 30px !important;
            margin-bottom: 30px !important;
            animation: fadeIn 0.8s ease-out;
        }
        
        /* JUDUL HALAMAN */
        h2.mb-4.fw-bold.text-center {
            background: linear-gradient(135deg, var(--abu-sangat-gelap), var(--abu-gelap));
            color: var(--cream-muda);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 35px !important;
            border-left: 5px solid var(--aksen-emas);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            font-size: 1.9rem;
        }
        
        h2.mb-4.fw-bold.text-center:before {
            content: "🎁";
            position: absolute;
            left: 25px;
            font-size: 1.8rem;
        }
        
        /* ALERT PRODUK KOSONG */
        .alert.alert-warning.text-center {
            background-color: rgba(231, 198, 139, 0.2);
            border: 2px dashed var(--cream-coklat);
            border-radius: 10px;
            padding: 40px 20px;
            color: var(--abu-sangat-gelap);
            font-size: 1.2rem;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        /* ROW UNTUK KARTU PRODUK */
        .row {
            margin-left: -10px;
            margin-right: -10px;
        }
        
        /* KARTU PRODUK */
        .col-md-3.mb-4 {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .card.h-100.shadow-sm.border-0 {
            background-color: white;
            border: 1px solid var(--abu-medium) !important;
            border-radius: 12px !important;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
            height: 100%;
        }
        
        .card.h-100.shadow-sm.border-0:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15) !important;
            border-color: var(--cream-gelap) !important;
        }
        
        /* GAMBAR PRODUK */
        .card-img-top {
            height: 200px !important;
            object-fit: cover !important;
            border-bottom: 1px solid var(--cream-medium);
            transition: transform 0.5s ease;
        }
        
        .card.h-100.shadow-sm.border-0:hover .card-img-top {
            transform: scale(1.05);
        }
        
        /* BODY KARTU */
        .card-body.d-flex.flex-column {
            padding: 20px;
            background-color: white;
        }
        
        /* NAMA PRODUK */
        h6.fw-bold.mb-1 {
            color: var(--abu-sangat-gelap);
            font-size: 1.05rem;
            font-weight: 600 !important;
            margin-bottom: 10px !important;
            line-height: 1.4;
            min-height: 40px;
        }
        
        /* HARGA PRODUK */
        p.text-primary.fw-semibold.mb-3 {
            color: var(--aksen-emas) !important;
            font-weight: 700 !important;
            font-size: 1.2rem;
            margin-bottom: 20px !important;
        }
        
        /* CONTAINER TOMBOL */
        .mt-auto.d-grid.gap-2 {
            margin-top: auto !important;
            gap: 12px !important;
        }
        
        /* TOMBOL DETAIL PRODUK */
        .btn.btn-outline-primary.btn-sm {
            background-color: transparent;
            color: var(--abu-sangat-gelap);
            border: 2px solid var(--abu-medium);
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .btn.btn-outline-primary.btn-sm:hover {
            background-color: var(--abu-muda);
            border-color: var(--abu-gelap);
            color: var(--abu-sangat-gelap);
            transform: translateY(-2px);
        }
        
        /* TOMBOL TAMBAH KE KERANJANG */
        .btn.btn-primary.btn-sm {
            background: linear-gradient(135deg, var(--abu-sangat-gelap), var(--abu-gelap));
            color: var(--cream-muda);
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .btn.btn-primary.btn-sm:hover {
            background: linear-gradient(135deg, var(--abu-gelap), var(--abu-sangat-gelap));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .btn.btn-primary.btn-sm:before {
            content: "🛒";
            margin-right: 8px;
            font-size: 1rem;
        }
        
        /* ANIMASI */
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
        
        .col-md-3.mb-4 {
            animation: fadeIn 0.6s ease-out;
            animation-fill-mode: both;
        }
        
        .col-md-3.mb-4:nth-child(1) { animation-delay: 0.1s; }
        .col-md-3.mb-4:nth-child(2) { animation-delay: 0.2s; }
        .col-md-3.mb-4:nth-child(3) { animation-delay: 0.3s; }
        .col-md-3.mb-4:nth-child(4) { animation-delay: 0.4s; }
        .col-md-3.mb-4:nth-child(5) { animation-delay: 0.5s; }
        .col-md-3.mb-4:nth-child(6) { animation-delay: 0.6s; }
        .col-md-3.mb-4:nth-child(7) { animation-delay: 0.7s; }
        .col-md-3.mb-4:nth-child(8) { animation-delay: 0.8s; }
        
        /* RESPONSIF */
        @media (max-width: 992px) {
            .col-md-3.mb-4 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }
        
        @media (max-width: 768px) {
            .container.mt-5.mb-5 {
                padding: 20px;
                margin: 20px 15px !important;
            }
            
            h2.mb-4.fw-bold.text-center {
                font-size: 1.6rem;
                padding: 15px;
            }
            
            h2.mb-4.fw-bold.text-center:before {
                position: static;
                margin-right: 10px;
            }
            
            .col-md-3.mb-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
        
        /* EFEK TAMBAHAN */
        .card.h-100.shadow-sm.border-0:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--cream-gelap), var(--aksen-emas), var(--cream-gelap));
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .card.h-100.shadow-sm.border-0:hover:after {
            opacity: 1;
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">

  <h2 class="mb-4 fw-bold text-center">
    Produk Oleh-Oleh Khas Malang
  </h2>

  <?php if (empty($produk)): ?>
    <div class="alert alert-warning text-center">
      Produk belum tersedia.
    </div>
  <?php else: ?>

    <div class="row">
      <?php foreach ($produk as $p): ?>

        <div class="col-md-3 mb-4">
          <div class="card h-100 shadow-sm border-0">

            <!-- GAMBAR PRODUK -->
            <img src="<?= base_url('assets/images/produk/'.$p->gambar) ?>"
                 alt="<?= $p->nama_produk ?>"
                 class="card-img-top"
                 style="height:200px; object-fit:cover;">

            <!-- BODY -->
            <div class="card-body d-flex flex-column">

              <h6 class="fw-bold mb-1">
                <?= $p->nama_produk ?>
              </h6>

              <p class="text-primary fw-semibold mb-3">
                Rp <?= number_format($p->harga, 0, ',', '.') ?>
              </p>

              <!-- TOMBOL (WAJIB ADA DETAIL) -->
              <div class="mt-auto d-grid gap-2">

                <!-- DETAIL PRODUK -->
                <a href="<?= base_url('produk/detail/'.$p->id_produk) ?>"
                   class="btn btn-outline-primary btn-sm">
                  Detail Produk
                </a>

                <!-- TAMBAH KE KERANJANG -->
                <a href="<?= base_url('cart/tambah/'.$p->id_produk) ?>"
                   class="btn btn-primary btn-sm">
                  Tambah ke Keranjang
                </a>

              </div>

            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </div>

  <?php endif; ?>

</div>

</body>
</html>