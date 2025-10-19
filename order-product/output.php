<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil Dibuat</title>
    <link rel="stylesheet" href="css/output.css">
</head>
<body>
    <div class="output-container">
        <?php
        // Cek jika metode request adalah POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil dan bersihkan data dari form
            $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : 'Barang Anda';
            $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
            $account_number = isset($_POST['account_number']) ? htmlspecialchars($_POST['account_number']) : '';
            $bank = isset($_POST['bank']) ? htmlspecialchars($_POST['bank']) : '';
            $account_holder = isset($_POST['account_holder']) ? htmlspecialchars($_POST['account_holder']) : '';
            $transaction_count = isset($_POST['transaction_count']) ? htmlspecialchars($_POST['transaction_count']) : '';
            $mobile_numbers = isset($_POST['mobile_numbers']) ? htmlspecialchars($_POST['mobile_numbers']) : 'Tidak diisi';
            $emails = isset($_POST['emails']) ? htmlspecialchars($_POST['emails']) : 'Tidak diisi';
            
            // Proses data checkbox notifikasi
            $notification_choice = 'Tidak ada';
            if (!empty($_POST['notification_type'])) {
                $notification_types = array_map('htmlspecialchars', $_POST['notification_type']);
                $notification_choice = implode(', ', $notification_types);
            }

            // Tampilkan ucapan terima kasih dengan judul dari input form
            echo "<h1>Terima kasih telah membuat pemesanan barang: <em>" . $title . "</em>!</h1>";

            // --- Bagian Informasi dan Pratinjau Gambar ---
            echo "<h2>Informasi Gambar</h2>";
            
            if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
                // Ambil data file
                $file_tmp_path = $_FILES['product_image']['tmp_name'];
                $file_name = htmlspecialchars($_FILES['product_image']['name']);
                $file_size = $_FILES['product_image']['size'];
                $file_type = $_FILES['product_image']['type'];

                // Konversi gambar ke Base64 untuk ditampilkan langsung
                $image_data = file_get_contents($file_tmp_path);
                $base64_image = base64_encode($image_data);
                $image_src = 'data:' . $file_type . ';base64,' . $base64_image;
                
                echo '<div class="image-section">';
                echo '  <div class="image-preview">';
                echo '      <p><strong>Hasil Upload Gambar:</strong></p>';
                echo '      <img src="' . $image_src . '" alt="Gambar Produk">';
                echo '  </div>';
                echo '  <div class="image-details">';
                echo '      <p><strong>Detail File:</strong></p>';
                echo '      <ul>';
                echo '          <li><strong>Nama File:</strong> ' . $file_name . '</li>';
                echo '          <li><strong>Ukuran:</strong> ' . round($file_size / 1024, 2) . ' KB</li>';
                echo '          <li><strong>Tipe:</strong> ' . $file_type . '</li>';
                echo '      </ul>';
                echo '  </div>';
                echo '</div>';

            } else {
                echo "<p class='alert'>Gambar tidak berhasil diunggah.</p>";
            }

            // --- Bagian Detail Pemesanan ---
            echo "<h2>Detail Pemesanan Barang</h2>";
            echo '<table class="details-table">';
            echo '  <tr><td>Deskripsi</td><td>' . nl2br($description) . '</td></tr>';
            echo '  <tr><td>Nomor Rekening</td><td>' . $account_number . '</td></tr>';
            echo '  <tr><td>Bank</td><td>' . $bank . '</td></tr>';
            echo '  <tr><td>Nama Pemilik Rekening</td><td>' . $account_holder . '</td></tr>';
            echo '  <tr><td>Jumlah Transaksi</td><td>' . $transaction_count . '</td></tr>';
            echo '  <tr><td>Metode Notifikasi</td><td>' . $notification_choice . '</td></tr>';
            echo '  <tr><td>Kirim ke Ponsel</td><td>' . $mobile_numbers . '</td></tr>';
            echo '  <tr><td>Kirim ke Email</td><td>' . $emails . '</td></tr>';
            echo '</table>';

        } else {
            // Tampilan jika halaman diakses langsung tanpa submit form
            echo "<h1>Akses Ditolak</h1>";
            echo "<p class='alert'>Silakan isi form pemesanan terlebih dahulu.</p>";
        }
        ?>
    </div>
</body>
</html>