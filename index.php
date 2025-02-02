<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>QR Code Generator</h1>
        <form method="POST" action="">
            <label for="qrtext">Enter Product name :</label>
            <input
                type="text"
                id="qrtext"
                name="qrtext"
                placeholder="Enter text or URL"
                value="<?php echo isset($_POST['qrtext']) ? htmlspecialchars($_POST['qrtext']) : ''; ?>"
                required
            >
            <label for="size">Select QR Code Size</label>
            <select id="size" name="size">
                <option value="5" <?php echo isset($_POST['size']) && $_POST['size'] == 5 ? 'selected' : ''; ?>>Small</option>
                <option value="10" <?php echo isset($_POST['size']) && $_POST['size'] == 10 ? 'selected' : ''; ?>>Medium< /option>
                <option value="15" <?php echo isset($_POST['size']) && $_POST['size'] == 15 ? 'selected' : ''; ?>>Large</option>
            </select>
            <button type="submit" name="generate">Generate QR Code</button>
        </form>

        <?php
        if (isset($_POST['generate'])) {
            include 'phpqrcode/qrlib.php';

            $text = $_POST['qrtext'];
            $size = $_POST['size'];
            $filePath = 'qrcode.png';

        
            QRcode::png($text, $filePath, QR_ECLEVEL_L, $size);

            echo "<div class='result'>";
            echo "<h2>Generated QR Code:</h2>";
            echo "<img src='$filePath' alt='QR Code'>";
            echo "</div>";
        } else {
            echo "<div class='placeholder'>";
            echo "<h2>Enter text or URL to generate your QR code</h2>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
