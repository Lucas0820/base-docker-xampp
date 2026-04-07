<?php
session_start();
include 'productenarray.php';
$cartItems = [];
$total = 0;

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $cartItem) {
        $cartItems[] = $cartItem;
        $total += $cartItem['price'] * $cartItem['quantity'];
    }
}

// Handle remove from cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
    $productId = $_POST['product_id'];
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
    header('Location: winkelwagen.php');
    exit;
}

// Handle update quantity
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    if ($quantity > 0 && isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
    } elseif ($quantity <= 0) {
        unset($_SESSION['cart'][$productId]);
    }
    header('Location: winkelwagen.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Winkelwagen - games4you</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .cart-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            background: white;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .cart-item-details {
            flex: 1;
        }
        .cart-item-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .cart-total {
            text-align: right;
            font-size: 1.2em;
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border: 1px solid #ddd;
        }
        .empty-cart {
            text-align: center;
            padding: 50px;
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
            <a href="winkelwagen.php">Winkelwagen (<?php echo count($cartItems); ?>)</a>
            <a href="bestelformulier.php">Bestelformulier</a>
        </nav>
    </header>

    <div class="container">
        <main>
            <h2>Winkelwagen</h2>

            <?php if (empty($cartItems)): ?>
                <div class="empty-cart">
                    <p>Uw winkelwagen is leeg.</p>
                    <a href="index.php" class="product-detail-button">Verder winkelen</a>
                </div>
            <?php else: ?>
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <img src="<?php echo htmlspecialchars($item['title'] === 'rainbow6siege' ? 'assets/download (1).jpg' : 'assets/download (1).jpg'); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>">
                        <div class="cart-item-details">
                            <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                            <p>€<?php echo htmlspecialchars($item['price']); ?> per stuk</p>
                        </div>
                        <div class="cart-item-controls">
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['id']); ?>">
                                <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1" style="width: 60px;">
                                <button type="submit" name="update_quantity" class="product-detail-button" style="padding: 5px 10px; font-size: 0.9em;">Bijwerken</button>
                            </form>
                            <form method="post" style="display: inline;">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['id']); ?>">
                                <button type="submit" name="remove_from_cart" class="product-detail-button" style="padding: 5px 10px; font-size: 0.9em; background: #dc3545;">Verwijderen</button>
                            </form>
                        </div>
                        <div style="text-align: right;">
                            <strong>€<?php echo htmlspecialchars($item['price'] * $item['quantity']); ?></strong>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="cart-total">
                    <strong>Totaal: €<?php echo htmlspecialchars($total); ?></strong>
                    <br>
                    <a href="bestelformulier.php" class="product-detail-button" style="margin-top: 10px;">Afrekenen</a>
                </div>
            <?php endif; ?>
        </main>
    </div>

    <footer>
        <p>© 2026 games4you</p>
    </footer>
</body>
</html>
