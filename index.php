<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twibbon Hari Santri Nasional</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f7c3a 0%, #1a5928 50%, #0d5a2e 100%);
            min-height: 100vh;
            padding: 40px 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Section styling */
        section {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 24px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 0.6s ease-out backwards;
            position: relative;
        }

        section:nth-child(1) { animation-delay: 0.1s; }
        section:nth-child(2) { animation-delay: 0.2s; }
        section:nth-child(3) { animation-delay: 0.3s; }
        section:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Section 1: Hero */
        .hero-section {
            background: linear-gradient(135deg, #0f7c3a 0%, #1a5928 100%);
            text-align: center;
            color: white;
            overflow: hidden;
            position: relative;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .icon-wrapper {
            width: 100px;
            height: 100px;
            margin: 0 auto 24px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            position: relative;
            animation: iconFloat 3s ease-in-out infinite;
        }

        @keyframes iconFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .icon {
            font-size: 56px;
            position: relative;
            z-index: 1;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: 18px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }

        /* Section 2: About */
        .about-section h2 {
            color: #1a5928;
            font-size: 28px;
            margin-bottom: 16px;
            text-align: center;
        }

        .about-section p {
            color: #333;
            font-size: 17px;
            line-height: 1.8;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Section 3: Features */
        .features-section h2 {
            color: #1a5928;
            font-size: 28px;
            margin-bottom: 32px;
            text-align: center;
        }

        .fire-bg {
            background: linear-gradient(135deg, #fff8f0 0%, #fff4e8 100%);
            border: 2px solid #ff6b00;
            position: relative;
            overflow: hidden;
        }

        .fire-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 30%, rgba(255, 107, 0, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 107, 0, 0.1) 0%, transparent 50%);
            z-index: 0;
        }

        .section-badge {
            background: #ff6b00;
            color: white;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 30px;
            display: inline-block;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
            box-shadow: 0 4px 12px rgba(255, 107, 0, 0.3);
            animation: pulse-fire 2s infinite;
        }

        @keyframes pulse-fire {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .fire-title {
            margin-bottom: 16px;
            color: #ff4500;
            font-size: 32px;
            font-weight: 800;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1;
            letter-spacing: 1px;
        }

        .fire-subtitle {
            color: #333;
            font-size: 18px;
            margin-bottom: 32px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 1;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            position: relative;
            z-index: 1;
        }

        .feature-card {
            background: #f8f9fa;
            padding: 28px;
            border-radius: 16px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .fire-card {
            background: white;
            border: 2px solid #ff9d5c;
            box-shadow: 0 8px 24px rgba(255, 107, 0, 0.15);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(255, 107, 0, 0.2);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .feature-title {
            color: #ff6b00;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .feature-desc {
            color: #444;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 16px;
        }
        
        .feature-action {
            display: inline-block;
            background: #ff6b00;
            color: white;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 8px;
        }
        
        .feature-action:hover {
            background: #ff4500;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(255, 107, 0, 0.3);
        }
        
        /* News Highlight Styling */
        .news-highlight {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(255, 107, 0, 0.2);
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
            border: 2px solid #ff9d5c;
        }
        
        .news-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            display: block;
        }
        
        .news-caption {
            padding: 24px;
            text-align: left;
        }
        
        .news-badge {
            display: inline-block;
            background: #ff6b00;
            color: white;
            font-weight: bold;
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
        }
        
        .news-caption h3 {
            color: #ff4500;
            font-size: 22px;
            margin-bottom: 12px;
            font-weight: 700;
        }
        
        .news-caption p {
            color: #444;
            font-size: 16px;
            line-height: 1.6;
        }

        /* Section 4: Download */
        .download-section {
            text-align: center;
            background: linear-gradient(135deg, #f8fdf9 0%, #e8f5e9 100%);
        }

        .download-section h2 {
            color: #1a5928;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .download-section p {
            color: #333;
            font-size: 16px;
            margin-bottom: 32px;
        }

        .download-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 20px 48px;
            background: linear-gradient(135deg, #0f7c3a 0%, #1a5928 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 8px 24px rgba(15, 124, 58, 0.3);
            position: relative;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .download-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .download-btn:hover::before {
            left: 100%;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(15, 124, 58, 0.4);
        }
        
        /* Efek kelap-kelip untuk tombol download */
        .blink-button {
            animation: blink-animation 1s infinite alternate;
        }
        
        @keyframes blink-animation {
            0% {
                box-shadow: 0 0 10px rgba(15, 124, 58, 0.4);
                transform: scale(1);
            }
            100% {
                box-shadow: 0 0 25px rgba(15, 124, 58, 0.8), 0 0 40px rgba(15, 124, 58, 0.4);
                transform: scale(1.05);
            }
        }
        
        /* Efek highlight saat tombol download diklik dari tombol fitur */
        .highlight-button {
            animation: highlight-animation 0.5s ease-in-out 3;
        }
        
        @keyframes highlight-animation {
            0% {
                background: #0f7c3a;
                transform: scale(1);
            }
            50% {
                background: #ff6b00;
                transform: scale(1.1);
                box-shadow: 0 0 30px rgba(255, 107, 0, 0.8);
            }
            100% {
                background: #0f7c3a;
                transform: scale(1);
            }
        }

        .download-icon {
            font-size: 28px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .store-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .store-btn {
            padding: 16px 32px;
            background: white;
            border: 2px solid #0f7c3a;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 16px;
            color: #1a5928;
            font-weight: 600;
        }

        .store-btn:hover {
            background: #0f7c3a;
            color: white;
            transform: scale(1.05);
        }

        .store-icon {
            font-size: 24px;
        }

        @media (max-width: 768px) {
            section {
                padding: 32px 24px;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 28px;
            }

            h2 {
                font-size: 24px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .download-btn {
                width: 100%;
                padding: 18px 24px;
            }

            .store-buttons {
                flex-direction: column;
            }

            .store-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Section 1: Hero -->
        <section class="hero-section">
            <div class="icon-wrapper">
                <div class="icon">🎓</div>
            </div>
            <h1>Hari Santri Nasional</h1>
            <div class="hero-subtitle">22 Oktober 2025</div>
        </section>

        <!-- Section 2: About -->
        <section class="about-section">
            <h2>Peringati Hari Santri</h2>
            <p>Rayakan Hari Santri Nasional dengan membuat twibbon khusus yang bermakna. Tunjukkan dukunganmu dan bagikan kebanggaanmu sebagai bagian dari keluarga santri Indonesia! 🇮🇩</p>
        </section>

        <!-- Section 3: Features -->
        <section class="features-section fire-bg">
            <div class="section-badge">🔥 SEMANGAT MEMBARA 🔥</div>
            <h2 class="fire-title">BANGKITKAN SEMANGAT SANTRI!</h2>
            <p class="fire-subtitle">Di tengah berita negatif, mari tunjukkan bahwa santri adalah pilar peradaban dan harapan bangsa!</p>
            
            <div class="news-highlight">
                <img src="Screenshot 2025-10-17 at 09.47.43.webp" alt="Aksi Dukungan Santri" class="news-image">
                <div class="news-caption">
                    <div class="news-badge">BERITA TERKINI</div>
                    <h3>Solidaritas Santri: Menjunjung Tinggi Tradisi dan Nilai Pesantren</h3>
                    <p>Ribuan santri dan alumni pesantren menunjukkan solidaritas untuk menjaga kehormatan dan tradisi pesantren yang telah berabad-abad menjadi benteng pendidikan karakter bangsa.</p>
                </div>
            </div>
            
            <div class="features-grid">
                <div class="feature-card fire-card">
                    <div class="feature-icon">🖼️</div>
                    <div class="feature-title">Bingkai Twibbon Kebanggaan</div>
                    <div class="feature-desc">Gunakan bingkai twibbon spesial untuk menunjukkan kebanggaan sebagai santri atau pendukung santri Indonesia!</div>
                    <div class="feature-action" onclick="scrollToDownload()">PASANG SEKARANG!</div>
                </div>
                <div class="feature-card fire-card">
                    <div class="feature-icon">💪</div>
                    <div class="feature-title">Tunjukkan Kekuatan Santri</div>
                    <div class="feature-desc">Santri adalah generasi tangguh, berakhlak mulia, dan berwawasan luas. Mari tunjukkan solidaritas kita!</div>
                    <div class="feature-action" onclick="scrollToDownload()">DUKUNG SANTRI!</div>
                </div>
                <div class="feature-card fire-card">
                    <div class="feature-icon">🌟</div>
                    <div class="feature-title">Sebarkan Prestasi Santri</div>
                    <div class="feature-desc">Bagikan kisah inspiratif dan prestasi gemilang santri nusantara untuk melawan narasi negatif!</div>
                    <div class="feature-action" onclick="scrollToDownload()">BAGIKAN SEKARANG!</div>
                </div>
            </div>
        </section>

        <!-- Section 4: Download CTA -->
        <section class="download-section" id="download-section">
            <h2>Pakai Bingkai Ini Untuk Mendukung Santri!!</h2>
            <p> Aplikasi  Twibbon untuk membuat twibbon Hari Santri dengan mudah!</p>
            <button class="download-btn blink-button" onclick="downloadApp()">
                <span class="download-icon">📥</span>
                Download Aplikasi Twibbon
            </button>
          
        </section>
    </div>

    <?php
        // Tambahkan kode PHP di awal file
        include_once 'counter.php';
    ?>
    <script>
        function downloadApp() {
            // Tambah hitungan download melalui AJAX
            fetch('counter.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=increment'
            })
            .then(response => response.json())
            .then(data => {
                console.log('Download count updated:', data.count);
                // Arahkan ke Google Play Store
                window.location.href = 'https://play.google.com/store/apps/details?id=id.larismedia.twibbonesia';
            })
            .catch(error => {
                console.error('Error:', error);
                // Tetap arahkan ke Google Play Store meskipun terjadi error
                window.location.href = 'https://play.google.com/store/apps/details?id=id.larismedia.twibbonesia';
            });
        }
        
        function scrollToDownload() {
            const downloadSection = document.getElementById('download-section');
            downloadSection.scrollIntoView({ behavior: 'smooth' });
            
            // Tambahkan efek highlight pada tombol download
            const downloadBtn = document.querySelector('.download-btn');
            downloadBtn.classList.add('highlight-button');
            
            // Hapus class highlight setelah 2 detik
            setTimeout(() => {
                downloadBtn.classList.remove('highlight-button');
            }, 2000);
        }
    </script>
</body>
</html>