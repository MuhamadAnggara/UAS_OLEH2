<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('admin/templates/sidebar'); ?>

<style>
    :root {
        --cream-bg: #F8F4EA;
        --cream-card: #FFFDF6;
        --blue-light: #E3F2FD;
        --blue-primary: #42A5F5;
        --blue-dark: #1976D2;
        --blue-hover: #64B5F6;
        --gray-text: #424242;
        --gray-border: #E0E0E0;
        --gray-light: #F5F5F5;
        --shadow-light: 0 4px 12px rgba(66, 165, 245, 0.08);
    }

    /* JANGAN PAKAI PADDING DI BODY (SIDEBAR SUDAH NGATUR) */
    body {
        background-color: var(--cream-bg);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container-fluid {
        background-color: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: var(--shadow-light);
    }

    h3 {
        color: var(--blue-dark);
        font-weight: 700;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 3px solid var(--blue-primary);
        display: flex;
        align-items: center;
        gap: 12px;
    }

    h3::before {
        content: '👥';
        font-size: 1.6rem;
    }

    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .btn-secondary {
        background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
        border: none;
        border-radius: 10px;
        padding: 10px 22px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .stats-card {
        background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
        color: white;
        padding: 12px 18px;
        border-radius: 10px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 15px;
    }

    thead {
        background: linear-gradient(135deg, var(--blue-primary), var(--blue-dark));
        color: white;
    }

    th, td {
        padding: 14px;
        text-align: center;
    }

    tbody tr:nth-child(even) {
        background-color: var(--gray-light);
    }

    .customer-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 20px;
        background: var(--blue-light);
        border: 2px solid var(--blue-primary);
        font-weight: 600;
        color: var(--blue-dark);
    }

    .address-box {
        background: #f1f1f1;
        padding: 8px 12px;
        border-radius: 8px;
        text-align: center;
    }

    .search-box {
        position: relative;
        max-width: 250px;
        width: 100%;
    }

    .search-box input {
        width: 100%;
        padding: 8px 12px;
        border-radius: 8px;
        border: 2px solid var(--gray-border);
        text-align: center;
    }
</style>

<div class="container-fluid">

    <div class="action-bar">
        <div style="display:flex; gap:15px; align-items:center;">
            <a href="<?= base_url('admin/dashboard') ?>" class="btn-secondary">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>

            <div class="stats-card">
                <h4><?= !empty($customer) ? count($customer) : 0 ?></h4>
                <small>Total Customer</small>
            </div>
        </div>

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Cari customer...">
        </div>
    </div>

    <h3>Data Customer</h3>

    <table id="customerTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($customer)): ?>
            <?php $no=1; foreach($customer as $c): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><span class="customer-badge"><?= $c->nama_customer ?></span></td>
                <td><?= $c->email ?></td>
                <td><?= $c->no_hp ?></td>
                <td><div class="address-box"><?= $c->alamat ?></div></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Belum ada data customer</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</div>

<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    document.querySelectorAll('#customerTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
    });
});
</script>

<?php $this->load->view('admin/templates/footer'); ?>
