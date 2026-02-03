<ul class="navbar-nav ms-auto align-items-center">

    <!-- KERANJANG -->
    <li class="nav-item me-3">
        <a class="nav-link position-relative" href="<?= base_url('cart') ?>">
            <i class="bi bi-cart"></i> Keranjang
            <?php
            $cart = $this->session->userdata('cart');
            $cart_count = is_array($cart) ? count($cart) : 0;
            if ($cart_count > 0):
            ?>
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                    <?= $cart_count ?>
                </span>
            <?php endif; ?>
        </a>
    </li>

    <?php if ($this->session->userdata('id_user')): ?>
        <!-- USER LOGIN -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold"
               href="#"
               id="userDropdown"
               role="button"
               data-bs-toggle="dropdown"
               aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i>
                <?= htmlspecialchars($this->session->userdata('username')) ?>
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li>
                    <a class="dropdown-item" href="<?= base_url('transaksi') ?>">
                        <i class="bi bi-receipt me-2"></i> Riwayat Transaksi
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger"
                       href="<?= base_url('logout') ?>"
                       onclick="return confirm('Yakin ingin logout?')">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </li>
    <?php else: ?>
        <!-- GUEST -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
        </li>
        <li class="nav-item">
            <a class="btn btn-sm btn-outline-primary ms-2"
               href="<?= base_url('register') ?>">Register</a>
        </li>
    <?php endif; ?>

</ul>
