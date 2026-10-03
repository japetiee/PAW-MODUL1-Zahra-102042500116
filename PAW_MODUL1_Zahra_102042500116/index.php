<?php
$produk = [
    [
        "nama" => "Monitor 24 Inch 144Hz",
        "kategori" => "Monitor",
        "harga" => 1800000,
        "stok" => 4,
        "gambar" => "img/monitor.png"
    ],
    [
        "nama" => "Headset Gaming Wireless ANC",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 5,
        "gambar" => "img/headset.webp"
    ],
    [
        "nama" => "Wireless Mechanical Keyboard",
        "kategori" => "Aksesoris",
        "harga" => 650000,
        "stok" => 12,
        "gambar" => "img/wireless keyboard2.webp"
    ],
    [
        "nama" => "Ergonomic Wireless Mouse",
        "kategori" => "Aksesoris",
        "harga" => 280000,
        "stok" => 0,
        "gambar" => "img/wireless mouse.webp"
    ],
    [
        "nama" => "USB-C Multiport Hub 7-in-1",
        "kategori" => "Perangkat",
        "harga" => 320000,
        "stok" => 5,
        "gambar" => "img/usbc port.png"
    ],
    [
        "nama" => "Desk Mat Minimalis (90x40cm)",
        "kategori" => "Aksesoris",
        "harga" => 115000,
        "stok" => 20,
        "gambar" => "img/desk mat3.png"
    ],
    [
        "nama" => "Monitor Light Bar Auto-Dimming",
        "kategori" => "Perangkat",
        "harga" => 450000,
        "stok" => 3,
        "gambar" => "img/light monitor.webp"
    ]
];

function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Tech & Gadget Marketplace</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(135deg, #e9d8f4 0%, #f7ebe1 50%, #e5d4ed 100%);
            color: #4a3e3d;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.6);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(138, 90, 143, 0.08);
        }

        .navbar-container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand-logo {
            font-size: 22px;
            font-weight: 800;
            color: #8a5a8f;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .brand-logo span {
            color: #c49a88;
        }

        .nav-menu {
            display: flex;
            gap: 28px;
            list-style: none;
        }

        .nav-link {
            text-decoration: none;
            color: #6e5a6a;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #8a5a8f;
        }

        .hero-wrapper {
            max-width: 1140px;
            margin: 32px auto 20px auto;
            padding: 0 20px;
            width: 100%;
        }

        .hero-banner {
            background: linear-gradient(135deg, #8a5a8f 0%, #a27083 50%, #c49a88 100%);
            border-radius: 28px;
            padding: 56px 40px;
            text-align: center;
            color: #ffffff;
            box-shadow: 0 16px 36px rgba(138, 90, 143, 0.22);
            position: relative;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .hero-banner::before {
            content: "✨";
            font-size: 48px;
            position: absolute;
            top: 20px;
            left: 24px;
            opacity: 0.35;
        }

        .hero-banner::after {
            content: "💻";
            font-size: 48px;
            position: absolute;
            bottom: 20px;
            right: 24px;
            opacity: 0.35;
        }

        .hero-tag {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 12px;
            line-height: 1.25;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .hero-subtitle {
            font-size: 16px;
            color: #f3e8ee;
            max-width: 680px;
            margin: 0 auto 28px auto;
            line-height: 1.6;
            font-weight: 500;
        }

        .hero-cta {
            display: inline-block;
            background-color: #ffffff;
            color: #8a5a8f;
            padding: 12px 32px;
            border-radius: 14px;
            font-weight: 800;
            font-size: 14px;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transition: all 0.25s ease;
        }

        .hero-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.18);
            background-color: #fcf8fa;
        }

        .features-list {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-top: 32px;
        }

        .feature-item {
            background: rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(6px);
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            padding: 8px 18px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        .container {
            max-width: 1140px;
            margin: 0 auto;
            padding: 20px 20px 60px 20px;
            width: 100%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 800;
            color: #382b37;
        }

        .section-badge {
            background-color: #f5eaf0;
            color: #8a5a8f;
            font-size: 13px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 12px;
            border: 1px solid #e2d1de;
        }

        .grid-katalog {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 28px;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 10px 25px rgba(120, 80, 120, 0.08);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            display: flex;
            flex-direction: column;
            backdrop-filter: blur(5px);
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 35px rgba(138, 90, 143, 0.2);
        }

        .card-img-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            background-color: #f7f2f5;
            padding: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .card:hover .card-img {
            transform: scale(1.06);
        }

        .card-body {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        /* Badges & Category Header */
        .category-header {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
        }

        .kategori {
            font-size: 11px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
            color: #a27083;
            background-color: #f5eaf0;
            padding: 4px 10px;
            border-radius: 12px;
            display: inline-block;
        }

        .badge-diskon {
            font-size: 11px;
            font-weight: 800;
            color: #d97706;
            background-color: #fef3c7;
            padding: 4px 10px;
            border-radius: 12px;
            letter-spacing: 0.5px;
        }

        .nama-produk {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #382b37;
            line-height: 1.3;
        }

        /* Format Tampilan Harga Asli & Diskon Sesuai Gambar Referensi */
        .price-container {
            margin-bottom: 18px;
        }

        .harga-asli {
            font-size: 13px;
            color: #a0909f;
            text-decoration: line-through;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .harga-diskon {
            font-size: 20px;
            font-weight: 800;
            color: #382b37;
        }

        .harga-normal {
            font-size: 19px;
            font-weight: 800;
            color: #8a5a8f;
        }

        .card-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 14px;
            border-top: 1px dashed #eedecf;
        }

        .badge {
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
        }

        .badge-tersedia {
            background-color: #e2f0d9;
            color: #3b6e32;
        }

        .badge-habis {
            background-color: #fce4e4;
            color: #923d3d;
        }

        .stok-info {
            font-size: 13px;
            font-weight: 600;
            color: #8c7873;
        }

        .btn-pesan {
            width: 100%;
            margin-top: 16px;
            padding: 10px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #a27083 0%, #8a5a8f 100%);
            color: white;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        .btn-pesan:hover {
            opacity: 0.9;
        }

        .btn-disabled {
            background: #d8cdcd;
            color: #8c7f7f;
            cursor: not-allowed;
        }

        /* Footer */
        footer {
            margin-top: auto;
            background: rgba(255, 255, 255, 0.7);
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #6e5a6a;
            border-top: 1px solid rgba(255, 255, 255, 0.8);
            font-weight: 600;
        }

        @media (max-width: 600px) {
            .hero-banner {
                padding: 36px 20px;
            }
            .hero-title {
                font-size: 26px;
            }
            .nav-menu {
                display: none;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="brand-logo">Cia<span>Store</span></a>
            <ul class="nav-menu">
                <li><a href="#" class="nav-link">Home</a></li>
                <li><a href="#katalog" class="nav-link">Katalog</a></li>
                <li><a href="#" class="nav-link">Tentang Kami</a></li>
            </ul>
        </div>
    </nav>

    <header class="hero-wrapper">
        <div class="hero-banner">
            <span class="hero-tag">Welcome to Cia Store 👋</span>
            <h1 class="hero-title">Upgrade Desk Setup & Produktivitasmu</h1>
            <p class="hero-subtitle">
                Temukan pilihan perangkat teknologi premium dan aksesoris kerja estetik untuk menemani aktivitas harianmu.
            </p>
            <a href="#katalog" class="hero-cta">Jelajahi Katalog</a>

            <div class="features-list">
                <span class="feature-item">💯 Produk 100% Original</span>
                <span class="feature-item">⚡ Pengiriman Cepat</span>
                <span class="feature-item">🛡️ Garansi Resmi</span>
            </div>
        </div>
    </header>

    <main class="container" id="katalog">
        <div class="section-header">
            <h2 class="section-title">Katalog Produk</h2>
            <span class="section-badge">Total: <?= count($produk); ?> Produk</span>
        </div>

        <div class="grid-katalog">
            <?php foreach ($produk as $item): ?>
                <?php 
                    $is_discount = $item['harga'] >= 1000000;
                    $harga_akhir = $is_discount ? $item['harga'] * 0.9 : $item['harga'];
                ?>
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="<?= htmlspecialchars($item['gambar']); ?>" 
                             alt="<?= htmlspecialchars($item['nama']); ?>" 
                             class="card-img"
                             onerror="this.src='https://via.placeholder.com/280x220?text=Gambar+Tidak+Ada';">
                    </div>
                    <div class="card-body">
                        <div class="category-header">
                            <span class="kategori"><?= htmlspecialchars($item['kategori']); ?></span>
                            <?php if ($is_discount): ?>
                                <span class="badge-diskon">DISKON 10%</span>
                            <?php endif; ?>
                        </div>

                        <h3 class="nama-produk"><?= htmlspecialchars($item['nama']); ?></h3>
                    
                        <div class="price-container">
                            <?php if ($is_discount): ?>
                                <div class="harga-asli"><?= formatRupiah($item['harga']); ?></div>
                                <div class="harga-diskon"><?= formatRupiah($harga_akhir); ?></div>
                            <?php else: ?>
                                <div class="harga-normal"><?= formatRupiah($item['harga']); ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-footer">
                            <?php if ($item['stok'] > 0): ?>
                                <span class="badge badge-tersedia">Tersedia</span>
                                <span class="stok-info">Stok: <?= $item['stok']; ?></span>
                            <?php else: ?>
                                <span class="badge badge-habis">Stok Habis</span>
                                <span class="stok-info">Stok: 0</span>
                            <?php endif; ?>
                        </div>

                        <?php if ($item['stok'] > 0): ?>
                            <button class="btn-pesan">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="btn-pesan btn-disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        &copy; <?= date('Y'); ?> Cia Store. All rights reserved.
    </footer>

</body>
</html>