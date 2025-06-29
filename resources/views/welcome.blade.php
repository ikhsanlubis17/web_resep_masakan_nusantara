<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nusantara Flavours - Setup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body text-center p-5">
                        <i class="bi bi-cup-hot-fill text-primary" style="font-size: 4rem;"></i>
                        <h1 class="mt-3 mb-4">Selamat Datang di Nusantara Flavours!</h1>
                        <p class="lead text-muted mb-4">
                            Website Anda hampir siap. Silakan jalankan setup database terlebih dahulu.
                        </p>
                        
                        <div class="alert alert-info text-start">
                            <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Langkah Setup:</h5>
                            <ol class="mb-0">
                                <li>Pastikan database <code>nusantara_flavours</code> sudah dibuat</li>
                                <li>Jalankan: <code>php artisan migrate:fresh --seed</code></li>
                                <li>Jalankan: <code>php artisan storage:link</code></li>
                                <li>Refresh halaman ini</li>
                            </ol>
                        </div>
                        
                        <div class="mt-4">
                            <a href="/" class="btn btn-primary btn-lg me-3">
                                <i class="bi bi-arrow-clockwise me-2"></i>Refresh Halaman
                            </a>
                            <a href="/test" class="btn btn-outline-secondary">
                                <i class="bi bi-check-circle me-2"></i>Test Laravel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
