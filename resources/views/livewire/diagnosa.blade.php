<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biofarkaka - Diagnosa Penyakit Tanaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" href="https://www.flaticon.com/svg/static/icons/svg/599/599388.svg" type="image/svg+xml">
    <style>
        :root {
            --primary: #28a745; /* Green for plant disease theme */
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




        .btn-primary {
            background-color: var(--accent);
            border-color: var(--accent);
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #00b8c5;
            border-color: #00b8c5;
        }



        @media (max-width: 768px) {
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
            <a class="navbar-brand" href="#">Biofarkaka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gejala">Gejala</a></li>
                    <li class="nav-item"><a class="nav-link" href="#penyakit">Penyakit</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary ms-2" href="#diagnosa">Mulai Diagnosa</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Diagnosa Section -->
    <section class="diagnosa-section">
        <div class="container">
            <h2 class="section-title animate__fadeIn">Diagnosa Penyakit Tanaman</h2>
            <div class="card animate__fadeIn" style="animation-delay: 0.3s;" x-data="diagnosaState">
                <div x-show="!showResult">
                    <!-- Progress Bar -->
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" :style="'width: ' + progress + '%'" :aria-valuenow="progress" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!-- Symptom Display -->
                    <h5 class="card-title"><i class="fas fa-leaf me-2"></i> <span x-text="currentSymptom.nama"></span></h5>
                    <p class="card-text">Seberapa yakin Anda bahwa tanaman Anda mengalami gejala ini?</p>
                    <!-- Confidence Level Buttons -->
                    <div class="confidence-buttons d-flex flex-wrap justify-content-center">
                        <button class="btn btn-outline-primary" x-on:click="selectConfidence(1)">Sangat Yakin (1)</button>
                        <button class="btn btn-outline-primary" x-on:click="selectConfidence(2)">Yakin (2)</button>
                        <button class="btn btn-outline-primary" x-on:click="selectConfidence(3)">Cukup Yakin (3)</button>
                        <button class="btn btn-outline-primary" x-on:click="selectConfidence(4)">Kurang Yakin (4)</button>
                        <button class="btn btn-outline-primary" x-on:click="selectConfidence(5)">Tidak Yakin (5)</button>
                        <button class="btn btn-outline-primary" x-on:click="selectConfidence(6)">Sangat Tidak Yakin (6)</button>
                    </div>
                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <button class="btn btn-secondary" x-on:click="prevSymptom" x-show="currentIndex > 0">Sebelumnya</button>
                        <button class="btn btn-primary ms-auto" x-on:click="nextSymptom" x-text="currentIndex < symptoms.length - 1 ? 'Selanjutnya' : 'Selesai'"></button>
                    </div>
                </div>
                <!-- Result Display -->
                <div x-show="showResult" class="result-card">
                    <h3 class="animate__fadeIn">Hasil Diagnosa</h3>
                    <p class="mt-3 animate__fadeIn" style="animation-delay: 0.3s;" x-text="diagnosisResult"></p>
                    <a href="#" class="btn btn-primary mt-4 animate__fadeIn" style="animation-delay: 0.6s;" x-on:click="resetDiagnosis">Ulangi Diagnosa</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2025 Biofarkaka. Semua Hak Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('diagnosaState', () => ({
                symptoms: [
                    // Placeholder for Livewire data
                    { id: 1, nama: 'Bercak pada Daun' },
                    { id: 2, nama: 'Layu pada Batang' },
                    { id: 3, nama: 'Daun Menguning' },
                    // Add more symptoms via Livewire
                ],
                currentIndex: 0,
                responses: [],
                showResult: false,
                diagnosisResult: '',
                get progress() {
                    return ((this.currentIndex + 1) / this.symptoms.length) * 100;
                },
                get currentSymptom() {
                    return this.symptoms[this.currentIndex] || { nama: '' };
                },
                selectConfidence(value) {
                    this.responses[this.currentIndex] = value;
                    if (this.currentIndex < this.symptoms.length - 1) {
                        this.nextSymptom();
                    } else {
                        this.showResult = true;
                        this.calculateDiagnosis();
                    }
                },
                nextSymptom() {
                    if (this.currentIndex < this.symptoms.length - 1) {
                        this.currentIndex++;
                    } else {
                        this.showResult = true;
                        this.calculateDiagnosis();
                    }
                },
                prevSymptom() {
                    if (this.currentIndex > 0) {
                        this.currentIndex--;
                    }
                },
                resetDiagnosis() {
                    this.currentIndex = 0;
                    this.responses = [];
                    this.showResult = false;
                    this.diagnosisResult = '';
                },
                calculateDiagnosis() {
                    // Placeholder for diagnosis logic
                    // In a real implementation, this would call a Livewire component or API
                    // For demo, we'll mock a result based on responses
                    const avgConfidence = this.responses.reduce((sum, val) => sum + val, 0) / this.responses.length;
                    if (avgConfidence <= 3) {
                        this.diagnosisResult = 'Kemungkinan tanaman Anda terkena penyakit Busuk Daun. Segera konsultasikan dengan ahli tanaman untuk penanganan lebih lanjut.';
                    } else {
                        this.diagnosisResult = 'Tanaman Anda tampak sehat berdasarkan gejala yang dipilih. Pantau terus kondisinya.';
                    }
                    // Example Livewire call: Livewire.emit('calculateDiagnosis', this.responses);
                }
            }));
        });
    </script>
</body>
</html>
