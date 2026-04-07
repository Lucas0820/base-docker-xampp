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
?>

<div class="container">

<h2>Bestelformulier</h2>

<?php if ($selectedProduct): ?>
    <div class="selected-product">
        <strong>Gekozen product:</strong> <?php echo htmlspecialchars($selectedProduct['title']); ?>
        &ndash; €<?php echo htmlspecialchars($selectedProduct['price']); ?>
    </div>
<?php endif; ?>

<form>

<label>Aanhef</label>
<select name="aanhef" required>
<option value="">Kies...</option>
<option>Dhr.</option>
<option>Mevr.</option>
<option>Anders</option>
</select>

<label>Voornaam</label>
<input type="text" required>

<label>Tussenvoegsel</label>
<input type="text">

<label>Achternaam</label>
<input type="text" required>

<label>Straatnaam</label>
<input type="text" required>

<label>Huisnummer</label>
<input type="number" required>

<label>Postcode</label>
<input type="text" required>

<label>Land</label>
<input type="text" required>

<label>E-mailadres</label>
<input type="email" required>

<label>Telefoonnummer</label>
<input type="tel" required>

<label>Geboortedatum</label>
<input type="date" required>

<label>
<input type="checkbox" class="checkbox" required>
Ik ga akkoord met de algemene voorwaarden
</label>

<button type="submit">Bestellen</button>

</form>

</div>

</body>
</html>