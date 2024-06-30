<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected'])) {
    include 'data.php';
    $selectedHape = array_filter($arrHape, function($hape) {
        return in_array($hape['SKU'], $_POST['selected']);
    });
} else {
    echo "No phones selected.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perbandingan Hape</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .pembanding-container {
            display: flex;
            justify-content: center;
            flex-wrap: nowrap;
            gap: 20px;
            width: 100%;
            padding: 20px 0;
        }
        .sidebar{
            height:auto;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="LogoProjectWebProg.png" alt="Logo Toko" style="width:250px;">
        <h1>Yung Phone</h1>
    </div>
    <div class="pembanding-container">
        <?php foreach ($selectedHape as $hape): ?>
            <div class="card">
                <img src="<?php echo $hape['url_gambar']; ?>" alt="<?php echo $hape['Model']; ?>">
                <h2><?php echo $hape['Merk'] . " " . $hape['Model']; ?></h2>
                <p>SKU: <?php echo $hape['SKU']; ?></p>
                <p>Harga: Rp<?php echo number_format($hape['Harga'], 0, ',', '.'); ?></p>
                <p>Spesifikasi: <?php echo implode(', ', $hape['spec']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="index.php" class="back-btn">Kembali</a>
</body>
</html>
