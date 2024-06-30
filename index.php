<?php
include 'data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yung Phone</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .pembanding-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .pembanding-btn:disabled {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="LogoProjectWebProg.png" alt="Logo Toko" style="width:250px;">
        <h1>Yung Phone</h1>
    </div>
    <div class="content">
        <div class="card-container">
        <form id="pembandingForm" action="pembanding.php" method="POST">
            <?php foreach ($arrHape as $hape): ?>
                <div class="card">
                    <img src="<?php echo $hape['url_gambar']; ?>" alt="<?php echo $hape['Model']; ?>">
                    <h2><?php echo $hape['Merk'] . " " . $hape['Model']; ?></h2>
                    <p>Harga: Rp<?php echo number_format($hape['Harga'], 0, ',', '.'); ?></p>
                    <input type="checkbox" name="selected[]" value="<?php echo $hape['SKU']; ?>">
                </div>
            <?php endforeach; ?>
            <button type="submit" class="pembanding-btn" disabled>Bandingkan</button>
        </form>
        </div>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const pembandingBtn = document.querySelector('.pembanding-btn');
        let checkedCount = 0;

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                checkedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;
                if (checkedCount === 3) {
                    pembandingBtn.disabled = false;
                    checkboxes.forEach(cb => {
                        if (!cb.checked) {
                            cb.disabled = true;
                        }
                    });
                } else {
                    pembandingBtn.disabled = true;
                    checkboxes.forEach(cb => cb.disabled = false);
                }
            });
        });
    </script>
</body>
</html>