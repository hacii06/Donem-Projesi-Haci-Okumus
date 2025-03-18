<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeknoKıyas - Ana Sayfa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 123, 255, 0.7), rgba(0, 212, 255, 0.7)), url('/images/hero-bg.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 150px 0;
            text-align: center;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .campaign-card {
            transition: transform 0.3s;
        }
        .campaign-card:hover {
            transform: scale(1.05);
        }
        .campaign-img {
            width: 100%;
            max-height: 150px;
            object-fit: contain;
        }
        .search-form {
            margin-top: 30px;
        }
        .search-form h2 {
            color: white;
        }
        .search-form .form-select {
            background-color: rgba(255, 255, 255, 0.9);
        }
        .navbar .nav-link {
            font-size: 1.25rem;
            padding: 0.75rem 1.5rem;
        }
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar-center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-family: 'Fantasy';
            font-size: 4rem;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/images/teknokiyaslogo1.png" alt="TeknoKiyas Logo" style="height: 150px;">
            </a>
            <span class="navbar-center">Kıyas Başlasın</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#search">Telefon Ara</a></li>
                    <li class="nav-item"><a class="nav-link" href="#campaigns">Kampanyalar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section + Telefon Ara Birleşimi -->
    <div class="hero-section" id="search">
        <div class="container">
            <h1>İstediğin Telefonu Kolayca Bul!</h1>
            <p>Fiyat, özellik ve daha fazlasına göre arama yap, karşılaştır, karar ver.</p>
            <div class="search-form">
                <h2 class="mb-4">Telefon Ara</h2>
                <form method="GET" action="search.php" class="row g-3 justify-content-center">
                    <div class="col-md-4">
                        <label class="form-label">İşletim Sistemi:</label>
                        <select name="os" class="form-select" onchange="this.form.submit()">
                            <option value="">Hepsi</option>
                            <option value="Android">Android</option>
                            <option value="iOS">iOS</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Kampanyalar Section -->
    <section id="campaigns" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Güncel Kampanyalar</h2>
            <div class="row">
                <?php
                $pdo = new PDO("mysql:host=localhost;dbname=phone_db", "root", "");
                $query = "SELECT p.brand, p.model, p.price, p.image_url, c.discount 
                          FROM phones p 
                          JOIN campaigns c ON p.id = c.phone_id 
                          WHERE c.end_date >= CURDATE()";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $campaigns = $stmt->fetchAll();

                foreach ($campaigns as $campaign) {
                    $new_price = $campaign['price'] * (1 - $campaign['discount'] / 100);
                    $image_url = $campaign['image_url'] ?: '/images/placeholder.jpg';
                    echo "
                    <div class='col-md-4 mb-4'>
                        <div class='card campaign-card'>
                            <img src='$image_url' class='campaign-img' alt='{$campaign['brand']} {$campaign['model']}'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$campaign['brand']} {$campaign['model']}</h5>
                                <p class='card-text'>Eski Fiyat: {$campaign['price']} TL</p>
                                <p class='card-text text-success'>İndirimli Fiyat: " . number_format($new_price, 2) . " TL</p>
                                <p class='card-text text-muted'>%{$campaign['discount']} İndirim</p>
                            </div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>© 2025 Telefon Bul. Tüm hakları saklıdır.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>