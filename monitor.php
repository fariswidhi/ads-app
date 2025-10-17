<?php
// Halaman untuk memonitor jumlah download

// Fungsi untuk mendapatkan jumlah download
function getDownloadCount() {
    $countFile = 'download_count.txt';
    
    // Jika file belum ada, buat dengan nilai awal 0
    if (!file_exists($countFile)) {
        file_put_contents($countFile, '0');
        return 0;
    }
    
    // Baca nilai saat ini
    return (int)file_get_contents($countFile);
}

$totalDownloads = getDownloadCount();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Download Aplikasi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        .stats {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px 0;
        }
        .count-box {
            background-color: #3498db;
            color: white;
            padding: 20px 40px;
            border-radius: 10px;
            text-align: center;
        }
        .count {
            font-size: 48px;
            font-weight: bold;
            margin: 10px 0;
        }
        .label {
            font-size: 18px;
            text-transform: uppercase;
        }
        .refresh-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #2ecc71;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .refresh-btn:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Monitor Download Aplikasi</h1>
        
        <div class="stats">
            <div class="count-box">
                <div class="count"><?php echo $totalDownloads; ?></div>
                <div class="label">Total Download</div>
            </div>
        </div>
        
        <button class="refresh-btn" onclick="location.reload()">Refresh Data</button>
    </div>
</body>
</html>