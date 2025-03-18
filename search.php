<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefon Ara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .hero-section {
            background: linear-gradient(rgba(0, 123, 255, 0.7), rgba(0, 212, 255, 0.7)), url('/images/aziciktelefon.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .phone-img {
            width: 100%;
            max-height: 200px;
            object-fit: contain;
            border-bottom: 1px solid #ddd;
            display: block;
            margin: 0 auto;
        }
        .result-card {
            transition: transform 0.3s;
            height: 100%;
        }
        .result-card:hover {
            transform: scale(1.02);
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            position: sticky;
            bottom: 0;
            width: 100%;
            background-color: #212529;
            color: white;
            text-align: center;
            padding: 1rem 0;
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
    <!-- Navbar (Header) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="/images/teknokiyaslogo1.png" alt="TeknoKiyas Logo" style="height: 150px;">
            </a>
            <span class="navbar-center">Kıyas Başlasın</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php#search">Telefon Ara</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#campaigns">Kampanyalar</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
            <h1></h1>
            <p></p>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        <!-- Arama Formu -->
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Telefon Ara</h2>
                <form method="POST" action="search.php" class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Fiyat Aralığı (Min):</label>
                        <input type="number" name="min_price" class="form-control" placeholder="Ör. 5000 TL" min="0" max="100000">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Fiyat Aralığı (Max):</label>
                        <input type="number" name="max_price" class="form-control" placeholder="Ör. 100000 TL" min="0" max="100000">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">İşletim Sistemi:</label>
                        <select name="os" class="form-select">
                            <?php $selected_os = $_POST['os'] ?? $_GET['os'] ?? ''; ?>
                            <option value="" <?php echo ($selected_os === '' ? 'selected' : ''); ?>>Hepsi</option>
                            <option value="Android" <?php echo ($selected_os === 'Android' ? 'selected' : ''); ?>>Android</option>
                            <option value="iOS" <?php echo ($selected_os === 'iOS' ? 'selected' : ''); ?>>iOS</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Depolama (Min GB):</label>
                        <input type="number" name="min_storage" class="form-control" placeholder="Min Depolama" min="0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Depolama (Max GB):</label>
                        <input type="number" name="max_storage" class="form-control" placeholder="Max Depolama" min="0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">RAM (Min GB):</label>
                        <input type="number" name="min_ram" class="form-control" placeholder="Min RAM" min="0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">RAM (Max GB):</label>
                        <input type="number" name="max_ram" class="form-control" placeholder="Max RAM" min="0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ekran Boyutu (Min inç):</label>
                        <input type="number" step="0.1" name="min_screen_size" class="form-control" placeholder="Min Ekran" min="0">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ekran Boyutu (Max inç):</label>
                        <input type="number" step="0.1" name="max_screen_size" class="form-control" placeholder="Max Ekran" min="0">
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Ara</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Arama Sonuçları -->
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <section class="py-5">
            <div class="container">
                <h2 class="text-center mb-4">Arama Sonuçları</h2>
                <div class="row">
                    <?php
                    $pdo = new PDO("mysql:host=localhost;dbname=phone_db", "root", "");

                    // Formdan gelen verileri al
                    $min_price = $_POST['min_price'] ?? '';
                    $max_price = $_POST['max_price'] ?? '';
                    $os = $_POST['os'] ?? '';
                    $min_storage = $_POST['min_storage'] ?? '';
                    $max_storage = $_POST['max_storage'] ?? '';
                    $min_ram = $_POST['min_ram'] ?? '';
                    $max_ram = $_POST['max_ram'] ?? '';
                    $min_screen_size = $_POST['min_screen_size'] ?? '';
                    $max_screen_size = $_POST['max_screen_size'] ?? '';

                    // Tüm alanlar boşsa tüm telefonları getir
                    if (empty($min_price) && empty($max_price) && empty($os) && 
                        empty($min_storage) && empty($max_storage) && 
                        empty($min_ram) && empty($max_ram) && 
                        empty($min_screen_size) && empty($max_screen_size)) {
                        $query = "SELECT * FROM phones";
                        $params = [];
                    } else {
                        $query = "SELECT * FROM phones WHERE 1=1";
                        $params = [];

                        if (!empty($min_price) || !empty($max_price)) {
                            $min_price = !empty($min_price) ? max(0, (float)$min_price) : 0;
                            $max_price = !empty($max_price) ? min(100000, (float)$max_price) : 100000;
                            $query .= " AND price BETWEEN :min_price AND :max_price";
                            $params[':min_price'] = $min_price;
                            $params[':max_price'] = $max_price;
                        }

                        if (!empty($os)) {
                            $query .= " AND os = :os";
                            $params[':os'] = $os;
                        }

                        if (!empty($min_storage) || !empty($max_storage)) {
                            $min_storage = !empty($min_storage) ? max(0, (int)$min_storage) : 0;
                            $max_storage = !empty($max_storage) ? (int)$max_storage : PHP_INT_MAX;
                            $query .= " AND storage BETWEEN :min_storage AND :max_storage";
                            $params[':min_storage'] = $min_storage;
                            $params[':max_storage'] = $max_storage;
                        }

                        if (!empty($min_ram) || !empty($max_ram)) {
                            $min_ram = !empty($min_ram) ? max(0, (int)$min_ram) : 0;
                            $max_ram = !empty($max_ram) ? (int)$max_ram : PHP_INT_MAX;
                            $query .= " AND ram BETWEEN :min_ram AND :max_ram";
                            $params[':min_ram'] = $min_ram;
                            $params[':max_ram'] = $max_ram;
                        }

                        if (!empty($min_screen_size) || !empty($max_screen_size)) {
                            $min_screen_size = !empty($min_screen_size) ? max(0, (float)$min_screen_size) : 0;
                            $max_screen_size = !empty($max_screen_size) ? (float)$max_screen_size : PHP_FLOAT_MAX;
                            $query .= " AND screen_size BETWEEN :min_screen_size AND :max_screen_size";
                            $params[':min_screen_size'] = $min_screen_size;
                            $params[':max_screen_size'] = $max_screen_size;
                        }
                    }

                    $stmt = $pdo->prepare($query);
                    $stmt->execute($params);
                    $results = $stmt->fetchAll();

                    if (count($results) > 0) {
                        foreach ($results as $phone) {
                            $image_url = $phone['image_url'] ?: '/images/placeholder.jpg';
                            echo "
                            <div class='col-md-4 mb-4'>
                                <div class='card result-card'>
                                    <img src='$image_url' class='phone-img' alt='{$phone['brand']} {$phone['model']}'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>{$phone['brand']} {$phone['model']}</h5>
                                        <p class='card-text'>Fiyat: {$phone['price']} TL</p>
                                        <p class='card-text'>Depolama: {$phone['storage']} GB</p>
                                        <p class='card-text'>RAM: {$phone['ram']} GB</p>
                                        <p class='card-text'>Kamera: {$phone['camera']}</p>
                                        <p class='card-text'>Ekran: {$phone['screen_size']} inç</p>
                                        <p class='card-text'>OS: {$phone['os']}</p>
                                    </div>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p class='text-center'>Aradığınız kriterlere uygun telefon bulunamadı.</p>";
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2025 Telefon Bul. Tüm hakları saklıdır.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>