<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- ====== DESAIN MINIMALIS UNTUK KONTEN CART ====== -->
    <style>
        :root {
            --cream-light: #FAF7F0;
            --cream-medium: #F5F1E8;
            --gray-light: #F8F9FA;
            --gray-medium: #E9ECEF;
            --gray-dark: #6C757D;
            --gray-darker: #495057;
            --accent-gold: #B99B6B;
        }

        body {
            background: var(--cream-light);
            font-family: 'Segoe UI', sans-serif;
            padding: 20px;
            margin: 0;
        }

        /* KONTEN CART - TANPA HEADER */
        .cart-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* INFORMASI ITEM (seperti di gambar) */
        .cart-info {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-info h2 {
            color: var(--gray-darker);
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }

        .item-count {
            background: var(--accent-gold);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 1rem;
        }

        /* TABEL KERANJANG */
        .cart-table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
        }

        .table thead {
            background: var(--cream-medium);
            border-bottom: 2px solid var(--gray-medium);
        }

        .table thead th {
            padding: 18px 20px;
            color: var(--gray-darker);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            text-align: left;
        }

        .table thead th:first-child {
            padding-left: 30px;
        }

        .table thead th:last-child {
            padding-right: 30px;
        }

        .table tbody tr {
            border-bottom: 1px solid var(--gray-medium);
            transition: background-color 0.2s;
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: rgba(185, 155, 107, 0.05);
        }

        .table tbody td {
            padding: 20px;
            vertical-align: middle;
        }

        .table tbody td:first-child {
            padding-left: 30px;
        }

        .table tbody td:last-child {
            padding-right: 30px;
        }

        /* KOLOM PRODUK */
        .product-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .product-icon {
            background: var(--cream-medium);
            color: var(--accent-gold);
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .product-name {
            font-weight: 500;
            color: var(--gray-darker);
            font-size: 1.1rem;
        }

        /* HARGA */
        .price {
            font-weight: 600;
            color: var(--gray-darker);
            font-size: 1.1rem;
        }

        /* QUANTITY INPUT */
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .qty-input {
            width: 80px;
            text-align: center;
            border: 2px solid var(--gray-medium);
            border-radius: 8px;
            padding: 8px 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .qty-input:focus {
            border-color: var(--accent-gold);
            outline: none;
            box-shadow: 0 0 0 3px rgba(185, 155, 107, 0.1);
        }

        .btn-update {
            background: var(--gray-medium);
            border: none;
            color: var(--gray-darker);
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-update:hover {
            background: var(--gray-dark);
            color: white;
        }

        /* DELETE BUTTON */
        .btn-delete {
            background: transparent;
            color: #a75d5d;
            border: 1px solid #a75d5d;
            padding: 8px;
            border-radius: 8px;
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .btn-delete:hover {
            background: #a75d5d;
            color: white;
        }

        /* TOTAL SECTION */
        .cart-total {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--gray-medium);
        }

        .total-row:last-child {
            border-bottom: none;
            font-size: 1.3rem;
            font-weight: 700;
            padding: 20px 0 0 0;
        }

        .total-label {
            color: var(--gray-dark);
            font-weight: 500;
        }

        .total-value {
            color: var(--gray-darker);
            font-weight: 600;
        }

        .final-total {
            color: var(--accent-gold);
            font-size: 1.5rem;
        }

        /* ACTION BUTTONS */
        .cart-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--gray-medium);
        }

        .btn-continue {
            background: transparent;
            border: 2px solid var(--gray-dark);
            color: var(--gray-dark);
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-continue:hover {
            background: var(--gray-dark);
            color: white;
        }

        .btn-checkout {
            background: var(--gray-darker);
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-checkout:hover {
            background: var(--gray-dark);
            color: white;
        }

        /* EMPTY CART */
        .empty-cart {
            background: white;
            border-radius: 12px;
            padding: 60px 40px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .empty-cart i {
            font-size: 4rem;
            color: var(--gray-medium);
            margin-bottom: 20px;
        }

        .empty-cart h3 {
            color: var(--gray-darker);
            margin-bottom: 10px;
        }

        .empty-cart p {
            color: var(--gray-dark);
            margin-bottom: 30px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .cart-info {
                flex-direction: column;
                gap: 15px;
                text-align: center;
                padding: 15px;
            }
            
            .table thead {
                display: none;
            }
            
            .table tbody tr {
                display: block;
                padding: 20px;
                margin-bottom: 15px;
                border: 1px solid var(--gray-medium);
                border-radius: 10px;
            }
            
            .table tbody td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 10px 0;
                border-bottom: 1px solid var(--gray-medium);
            }
            
            .table tbody td:last-child {
                border-bottom: none;
                justify-content: center;
            }
            
            .table tbody td::before {
                content: attr(data-label);
                font-weight: 600;
                color: var(--gray-dark);
                text-transform: uppercase;
                font-size: 0.85rem;
            }
            
            .product-info {
                justify-content: space-between;
            }
            
            .quantity-control {
                justify-content: space-between;
            }
            
            .cart-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn-continue,
            .btn-checkout {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

<div class="cart-content">

<?php if (empty($cart)): ?>

    <div class="empty-cart">
        <i class="bi bi-cart-x"></i>
        <h3>Keranjang Belanja Kosong</h3>
        <p>Tambahkan beberapa produk untuk memulai belanja</p>
        <a href="<?= base_url('produk') ?>" class="btn-checkout">
            <i class="bi bi-bag"></i> Mulai Belanja
        </a>
    </div>

<?php else: ?>

    <!-- INFORMASI ITEM - SEPERTI DI GAMBAR -->
    <div class="cart-info">
        <h2>Keranjang Belanja</h2>
        <div class="item-count"><?= count($cart) ?> Item</div>
    </div>

    <!-- TABEL PRODUK -->
    <div class="cart-table">
        <table class="table">
            <thead>
                <tr>
                    <th>PRODUK</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>SUBTOTAL</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $id_produk => $item): ?>
                <tr>
                    <td data-label="PRODUK">
                        <div class="product-info">
                            <i class="bi bi-gift product-icon"></i>
                            <span class="product-name"><?= $item['nama'] ?></span>
                        </div>
                    </td>
                    
                    <td data-label="HARGA" class="price">
                        Rp <?= number_format($item['harga'],0,',','.') ?>
                    </td>
                    
                    <td data-label="JUMLAH">
                        <form action="<?= base_url('cart/update') ?>" method="post" class="quantity-control">
                            <input type="hidden" name="id_produk" value="<?= $id_produk ?>">
                            <input type="number" name="qty" value="<?= $item['qty'] ?>" min="1" class="form-control qty-input">
                            <button type="submit" class="btn-update">Update</button>
                        </form>
                    </td>
                    
                    <td data-label="SUBTOTAL" class="price">
                        Rp <?= number_format($item['harga'] * $item['qty'],0,',','.') ?>
                    </td>
                    
                    <td data-label="AKSI" class="text-center">
                        <a href="<?= base_url('cart/hapus/'.$id_produk) ?>"
                           class="btn-delete"
                           onclick="return confirm('Hapus item ini dari keranjang?')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- TOTAL SECTION -->
    <div class="cart-total">
        <div class="total-row">
            <span class="total-label">Subtotal</span>
            <span class="total-value">Rp <?= number_format($total,0,',','.') ?></span>
        </div>
        <div class="total-row">
            <span class="total-label">Pengiriman</span>
            <span class="total-value">Akan dihitung saat checkout</span>
        </div>
        <div class="total-row">
            <span class="total-label">Total</span>
            <span class="total-value final-total">Rp <?= number_format($total,0,',','.') ?></span>
        </div>
    </div>

    <!-- ACTION BUTTONS -->
    <div class="cart-actions">
        <a href="<?= base_url('produk') ?>" class="btn-continue">
            <i class="bi bi-arrow-left"></i> Lanjut Belanja
        </a>
        <a href="<?= base_url('checkout') ?>" class="btn-checkout">
            <i class="bi bi-credit-card"></i> Checkout Sekarang
        </a>
    </div>

<?php endif; ?>

</div>

<script>
    // Add data-label attributes for mobile responsive
    document.addEventListener('DOMContentLoaded', function() {
        const headers = ['PRODUK', 'HARGA', 'JUMLAH', 'SUBTOTAL', 'AKSI'];
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            cells.forEach((cell, index) => {
                cell.setAttribute('data-label', headers[index]);
            });
        });
    });
</script>

</body>
</html>