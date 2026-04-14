<?php
session_start();
$order = isset($_SESSION['order']) ? $_SESSION['order'] : null;

if (!$order) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bedankt voor uw bestelling - games4you</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .thank-you-container {
            background: white;
            padding: 40px;
            text-align: center;
            max-width: 600px;
            margin: 40px auto;
            border: 2px solid #080808;
            border-radius: 5px;
        }
        .thank-you-container h2 {
            color: #080808;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .order-details {
            background: #f9f9f9;
            padding: 20px;
            margin: 20px 0;
            border-left: 4px solid #080808;
            text-align: left;
        }
        .order-details h3 {
            margin-top: 0;
        }
        .order-item {
            display: flex;
            gap: 20px;
            margin: 15px 0;
            padding: 15px;
            background: white;
            border-radius: 3px;
        }
        .order-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ddd;
        }
        .order-item-info {
            flex: 1;
            text-align: left;
        }
        .continue-button {
            display: inline-block;
            background: #080808;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }
        .continue-button:hover {
            background: #222;
        }
    </style>
</head>
<body>
    <header>
        <img src="assets/images.png" class="logo" alt="games4you logo">
        <h1>games4you</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="#">nintendo</a>
            <a href="#">playstation</a>
            <a href="#">xbox</a>
            <a href="#">Contact</a>
            <a href="winkelwagen.php">Winkelwagen</a>
            <a href="bestelformulier.php">Bestelformulier</a>
        </nav>
    </header>

    <div class="container">
        <main>
            <div class="thank-you-container">
                <h2>Bedankt voor uw bestelling!</h2>
                <p>Geachte <?php echo htmlspecialchars($order['aanhef']); ?> <?php echo htmlspecialchars($order['tussenvoegsel']); ?> <?php echo htmlspecialchars($order['voornaam']); ?> <?php echo htmlspecialchars($order['achternaam']); ?>,</p>
                <p>Uw bestelling is succesvol geplaatst. Hieronder ziet u de details van uw aankoop.</p>

                <div class="order-details">
                    <h3>Besteldetails</h3>
                    <div class="order-item">
                        <img src="<?php echo htmlspecialchars($order['product']['photos']['photo1']); ?>" alt="<?php echo htmlspecialchars($order['product']['title']); ?>">
                        <div class="order-item-info">
                            <h4><?php echo htmlspecialchars($order['product']['title']); ?></h4>
                            <p><strong>Categorie:</strong> <?php echo htmlspecialchars($order['product']['category']); ?></p>
                            <p><strong>Prijs:</strong> €<?php echo htmlspecialchars($order['product']['price']); ?></p>
                        </div>
                    </div>
                </div>

                <p>Wij sturen u een bevestigingsmail naar het opgegeven e-mailadres. U kunt hier uw bestelgegevens teruglezen.</p>
                <p>Hartelijk dank voor uw aankoop!</p>

                <a href="index.php" class="continue-button">Terug naar winkel</a>
                <?php unset($_SESSION['order']); ?>
            </div>
        </main>
    </div>

    <footer>
        <p>© 2026 games4you</p>
    </footer>
</body>
</html>