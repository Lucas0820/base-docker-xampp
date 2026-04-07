<?php
include 'productenarray.php';
$product = null;
if (!empty($_GET['product'])) {
    foreach ($array['products'] as $item) {
        if ($item['id'] === $_GET['product']) {
            $product = $item;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product ? htmlspecialchars($product['title']) . ' - games4you' : 'Product niet gevonden'; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
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
            <a href="bestelformulier.php">Bestelformulier</a>
        </nav>
    </header>

    <div class="container">
        <main>
            <?php if ($product): ?>
                <div class="product-detail">
                    <div class="product-detail-grid">
                        <div>
                            <img src="<?php echo htmlspecialchars($product['photos']['photo1']); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>">
                        </div>
                        <div class="product-detail-info">
                            <h2><?php echo htmlspecialchars($product['title']); ?></h2>
                            <p><strong>Categorie:</strong> <?php echo htmlspecialchars($product['category']); ?></p>
                            <p><strong>Prijs:</strong> €<?php echo htmlspecialchars($product['price']); ?></p>
                            <p><strong>Sale:</strong> <?php echo $product['sale'] ? 'Ja' : 'Nee'; ?></p>
                            <p>Bekijk meer informatie over dit product en bestel het direct via de knop hieronder.</p>
                            <a class="product-detail-button" href="bestelformulier.php?product=<?php echo urlencode($product['id']); ?>">Bestel dit product</a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="product-detail">
                    <h2>Product niet gevonden</h2>
                    <p>Het gevraagde product bestaat niet. Ga terug naar <a href="index.php">de winkel</a>.</p>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <footer>
        <p>© 2026 games4you</p>
    </footer>
</body>
</html>