<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<title>Bestelformulier</title>
<link rel="stylesheet" href="assets/css/formulier.css">

<style>


</style>
</head>

<body>

<?php
session_start();
include 'productenarray.php';
$selectedProduct = null;
if (!empty($_GET['product'])) {
    foreach ($array['products'] as $product) {
        if ($product['id'] === $_GET['product']) {
            $selectedProduct = $product;
            break;
        }
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voornaam = isset($_POST['voornaam']) ? htmlspecialchars($_POST['voornaam']) : '';
    $achternaam = isset($_POST['achternaam']) ? htmlspecialchars($_POST['achternaam']) : '';
    
    if ($selectedProduct && $voornaam && $achternaam) {
        $_SESSION['order'] = [
            'product' => $selectedProduct,
            'voornaam' => $voornaam,
            'achternaam' => $achternaam,
            'aanhef' => isset($_POST['aanhef']) ? htmlspecialchars($_POST['aanhef']) : '',
            'tussenvoegsel' => isset($_POST['tussenvoegsel']) ? htmlspecialchars($_POST['tussenvoegsel']) : ''
        ];
        header('Location: bedank.php');
        exit;
    }
}
?>

<div class="container">

<h2>Bestelformulier</h2>

<?php if ($selectedProduct): ?>
    <div class="selected-product">
        <strong>Gekozen product:</strong> <?php echo htmlspecialchars($selectedProduct['title']); ?>
        &ndash; €<?php echo htmlspecialchars($selectedProduct['price']); ?>
    </div>
<?php endif; ?>

<form method="post">

<label>Aanhef</label>
<select name="aanhef" required>
<option value="">Kies...</option>
<option value="Dhr.">Dhr.</option>
<option value="Mevr.">Mevr.</option>
<option value="Anders">Anders</option>
</select>

<label>Voornaam</label>
<input type="text" name="voornaam" required>

<label>Tussenvoegsel</label>
<input type="text" name="tussenvoegsel">

<label>Achternaam</label>
<input type="text" name="achternaam" required>

<label>Straatnaam</label>
<input type="text" name="straatnaam" required>

<label>Huisnummer</label>
<input type="number" name="huisnummer" required>

<label>Postcode</label>
<input type="text" name="postcode" required>

<label>Land</label>
<input type="text" name="land" required>

<label>E-mailadres</label>
<input type="email" name="email" required>

<label>Telefoonnummer</label>
<input type="tel" name="telefoon" required>

<label>Geboortedatum</label>
<input type="date" name="geboortedatum" required>

<label>
<input type="checkbox" name="akkoord" class="checkbox" required>
Ik ga akkoord met de algemene voorwaarden
</label>

<button type="submit">Bestellen</button>

</form>

</div>

</body>
</html>