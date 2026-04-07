<!DOCTYPE html>
<html lang="nl">
 
<head>
    <meta charset="UTF-8">
    <title>games4you</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
 
<body>

<?php
include'productenarray.php';


?>




 
    <!-- Navigatiebalk -->
    <header>
        <img src="assets/images.png" class="logo">
        
        
        <h1>games4you</h1>
 
        <nav>
            <a href="#">Home</a>
            <a href="#">nintendo</a>
            <a href="#">playstation</a>
            <a href="#">xbox</a>
            <a href="#">Contact</a>
            <a href="#">cart</a>
            <a href="bestelformulier.php">Bestelformulier</a>
        </nav>

    </header>
 
    <div class="container">
 
        <!-- Sidebar -->
        <aside>
 
            <h3>Categorieën</h3>
            <ul>
                <li><a href="#">shooters</a></li>
                <li><a href="#">rpg</a></li>
                <li><a href="#">singleplayer</a></li>
                <li><a href="#">co-op</a></li>
                <li><a href="#">giftcards</a></li>
            </ul>
 
        </aside>
 
 
        <!-- Producten -->
        <main>
 
            <h2>games</h2>
            <div class="products">
            <?php
      foreach ($array['products'] as $key => $value) {
      ?>
        <a class="product-link" href="product.php?product=<?php echo urlencode($value['id']); ?>" title="Bekijk <?php echo htmlspecialchars($value['title']); ?>">
          <div class="product">
            <img src="<?php echo $value['photos']['photo1']; ?>" alt="<?php echo $value['title']; ?>" />
            <div class="product_titel"><?php echo $value['title']; ?></div>
            <div class="prijs_titel">€<?php echo $value['price']; ?></div>
          </div>
        </a>
      <?php
      }
      ?>
            </div>
 
        </main>
 
    </div>
 
 
    <!-- Footer -->
    <footer>
        <p>© 2026 games4you</p>
    </footer>
 
</body>
 
</html>
 