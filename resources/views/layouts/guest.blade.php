<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahabat Biofarmaka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="https://www.flaticon.com/svg/static/icons/svg/599/599388.svg" type="image/svg+xml">
    <style>
        :root {
            --primary: #28a745;
            --secondary: #6c757d;
            --accent: #00ddeb;
            --background: #f4f7fc;
            --card-bg: #ffffff;
            --text: #2d3748;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--accent);
        }

        .nav-link {
            font-weight: 500;
            color: var(--text);
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        /* untuk halaman landing page */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: #fff;
            padding: 120px 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"%3E%3Cpath fill="%23ffffff" fill-opacity="0.1" d="M0,192L48,176C96,160,192,128,288,138.7C384,149,480,203,576,213.3C672,224,768,192,864,181.3C960,171,1056,181,1152,186.7C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"%3E%3C/path%3E%3C/svg%3E') no-repeat bottom;
            z-index: 1;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .hero p {
            font-size: 1.25rem;
            font-weight: 300;
            max-width: 600px;
            margin: 0 auto 2rem;
            position: relative;
            z-index: 2;
        }

        .card {
            background: var(--card-bg);
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            padding: 1.5rem;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary);
        }



        .card-text {
            font-size: 0.95rem;
            color: var(--secondary);
        }

        .login-section {
            padding: 80px 0;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
        }

        .login-card {
            background: var(--card-bg);
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 2rem;
        }

        .login-card h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        /* end untuk login page */

        .diagnosa-section {
            padding: 80px 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .progress {
            height: 8px;
            border-radius: 8px;
            background-color: #e9ecef;
            margin-bottom: 2rem;
        }

        .progress-bar {
            background-color: var(--primary);
            transition: width 0.5s ease-in-out;
        }

        .result-card {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            text-align: center;
        }

        .result-card h3 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--primary);
        }

        .result-card p {
            font-size: 1rem;
            color: var(--secondary);
        }

        .confidence-buttons .btn {
            font-weight: 500;
            margin: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .confidence-buttons .btn:hover {
            transform: translateY(-2px);
        }


        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
            font-weight: 600;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #00b8c5;
            border-color: #00b8c5;
            transform: translateY(-2px);
        }

        .form-label {
            font-weight: 500;
            color: var(--text);
        }

        .animate__fadeIn {
            animation: fadeIn 1s ease-in-out;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            position: relative;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background: var(--primary);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        section {
            padding: 80px 0;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .login-card h2 {
                font-size: 1.5rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .card-title {
                font-size: 1.25rem;
            }

            .confidence-buttons .btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html">Sahabat Biofarmaka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gejala">Gejala</a></li>
                    <li class="nav-item"><a class="nav-link" href="#penyakit">Penyakit</a></li>
                    <li class="nav-item"><a wire:navigate class="nav-link btn btn-primary ms-2" href="{{ route('login' ) }}">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

        {{ $slot }}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
