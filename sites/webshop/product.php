<?php
session_start();
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

// Handle add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart']) && $product) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    $productId = $product['id'];
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId] = [
            'id' => $product['id'],
            'title' => $product['title'],
            'price' => $product['price'],
            'quantity' => 1
        ];
    }
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
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
            <a href="winkelwagen.php">Winkelwagen (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
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
                            <form method="post" style="margin-top: 20px;">
                                <button type="submit" name="add_to_cart" class="product-detail-button">Toevoegen aan winkelwagen</button>
                            </form>
                            <a class="product-detail-button" href="bestelformulier.php?product=<?php echo urlencode($product['id']); ?>" style="margin-top: 10px; display: inline-block;">Direct bestellen</a>
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