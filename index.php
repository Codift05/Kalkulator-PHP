<?php
$hasil = "";
$bilangan1 = "";
$bilangan2 = "";
$operasi = "+";

if(isset($_POST['hitung'])) {
    $bilangan1 = $_POST['bilangan1'];
    $bilangan2 = $_POST['bilangan2'];
    $operasi = $_POST['operasi'];
    
    // Validasi input
    if(is_numeric($bilangan1) && is_numeric($bilangan2)) {
        switch($operasi) {
            case '+':
                $hasil = $bilangan1 + $bilangan2;
                break;
            case '-':
                $hasil = $bilangan1 - $bilangan2;
                break;
            case '*':
                $hasil = $bilangan1 * $bilangan2;
                break;
            case '/':
                if($bilangan2 != 0) {
                    $hasil = $bilangan1 / $bilangan2;
                } else {
                    $hasil = "Error: Pembagian dengan nol";
                }
                break;
            default:
                $hasil = "Operasi tidak valid";
        }
    } else {
        $hasil = "Mohon masukkan angka yang valid";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Modern</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator-container">
        <div class="calculator">
            <h2>KALKULATOR</h2>
            <p class="website-link">https://teknisitpd.blogspot.co.id/</p>
            
            <form method="post" action="">
                <div class="input-group">
                    <input type="text" name="bilangan1" placeholder="Masukkan Bilangan Pertama" value="<?php echo $bilangan1; ?>" required>
                </div>
                <div class="input-group">
                    <input type="text" name="bilangan2" placeholder="Masukkan Bilangan Kedua" value="<?php echo $bilangan2; ?>" required>
                </div>
                <div class="action-group">
                    <select name="operasi">
                        <option value="+" <?php if($operasi == '+') echo 'selected'; ?>>+</option>
                        <option value="-" <?php if($operasi == '-') echo 'selected'; ?>>-</option>
                        <option value="*" <?php if($operasi == '*') echo 'selected'; ?>>×</option>
                        <option value="/" <?php if($operasi == '/') echo 'selected'; ?>>÷</option>
                    </select>
                    <button type="submit" name="hitung">Hitung</button>
                </div>
                <div class="result">
                    <input type="text" value="<?php echo $hasil; ?>" readonly>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Optional JavaScript untuk animasi atau fungsionalitas tambahan
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.calculator').classList.add('loaded');
        });
    </script>
</body>
</html>