<?php
// File untuk menyimpan dan menambah hitungan download

// Fungsi untuk menambah hitungan download
function incrementDownloadCount() {
    $countFile = 'download_count.txt';
    
    // Jika file belum ada, buat dengan nilai awal 0
    if (!file_exists($countFile)) {
        file_put_contents($countFile, '0');
    }
    
    // Baca nilai saat ini
    $currentCount = (int)file_get_contents($countFile);
    
    // Tambah hitungan
    $currentCount++;
    
    // Simpan nilai baru
    file_put_contents($countFile, (string)$currentCount);
    
    return $currentCount;
}

// Jika file ini dipanggil langsung melalui AJAX
if (isset($_POST['action']) && $_POST['action'] === 'increment') {
    $newCount = incrementDownloadCount();
    echo json_encode(['success' => true, 'count' => $newCount]);
    exit;
}
?>