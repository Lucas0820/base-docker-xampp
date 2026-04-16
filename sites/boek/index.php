<?php

// Array met boeken
$boeken = array(

  array(
    "isbn" => "9781472140879",
    "auteur" => "Yuval Noah Harari",
    "naam" => "Sapiens: A Brief History of Humankind",
    "foto" => array(
      "voorkant" => "https://www.amazon.com/Sapiens-Humankind-Yuval-Noah-Harari/dp/0062316095",
      "achterkant" => "https://www.bol.com/nl/nl/f/sapiens/9300000015746626/"
    ),
    "prijs" => "22.99",
    "koop_url" => "https://www.amazon.com/Sapiens-Humankind-Yuval-Noah-Harari/dp/0062316095",
    "samenvatting" => "Sapiens: A Brief History of Humankind is een boek van Yuval Noah Harari uit 2011. Het boek bespreekt de geschiedenis van de mensheid, vanaf de prehistorie tot de 21e eeuw. Harari betoogt dat de mensheid een unieke soort is die de wereld heeft gedomineerd door middel van intelligentie, samenwerking en geweld."
  ),

  array(
    "isbn" => "9780143127784",
    "auteur" => "J.R.R. Tolkien",
    "naam" => "The Lord of the Rings",
    "foto" => array(
      "voorkant" => "https://www.amazon.com.be/-/en/J-R-Tolkien/dp/0008376107",
      "achterkant" => "https://www.amazon.com/Fellowship-Ring-Media-Tie-Rings/dp/0593500482"
    ),
    "prijs" => "15.99",
    "koop_url" => "https://www.amazon.com/Lord-Rings-J-R-R-Tolkien/dp/0544003411",
    "samenvatting" => "The Lord of the Rings is een fantasy-epos geschreven door de Engelse filoloog en hoogleraar J.R.R. Tolkien. Het verhaal speelt zich af in de fictieve wereld Midden-aarde en beschrijft de reis van de hobbit Frodo Balings om de Ene Ring te vernietigen, een kwaadaardig artefact gemaakt door de Donkere Heer Sauron."
  ),
  array(
    "isbn" => "9780060930097",
    "auteur" => "Harper Lee",
    "naam" => "To Kill a Mockingbird",
    "foto" => array(
      "voorkant" => "https://www.amazon.com/Kill-Mockingbird-Harper-Lee/dp/0446310786",
      "achterkant" => "https://www.amazon.com/Kill-Mockingbird-Harper-Lee/dp/0446310786"
    ),
    "prijs" => "12.99",
    "koop_url" => "https://www.amazon.com/Kill-Mockingbird-Harper-Lee/dp/0446310786",
    "samenvatting" => "To Kill a Mockingbird is een roman van de Amerikaanse schrijfster Harper Lee uit 1960. Het boek, deels gebaseerd op Lee's eigen jeugdervaringen, vertelt het verhaal van Jean Louise ('Scout') Finch, een jong meisje dat in de jaren 1930 in Alabama opgroeit. Scout's vader, Atticus Finch, is een advocaat die een zwarte man verdedigt die vals beschuldigd wordt van verkrachting."
  ),
  array(
    "isbn" => "9780439023488",
    "auteur" => "Harper Lee",
    "naam" => "De Hongerspelen",
    "foto" => array(
      "voorkant" => "https://placehold.co/400x600",
      "achterkant" => "https://placehold.co/400x600"
    ),
    "prijs" => "10.99",
    "koop_url" => "https://www.amazon.nl/hongerspelen-Suzanne-Collins/dp/9000372534/ref=asc_df_9000372534/?tag=nlshogostdde-21&linkCode=df0&hvadid=430556114391&hvpos=&hvnetw=g&hvrand=4517998249198202082&hvpone=&hvptwo=&hvqmt=&hvdev=c&hvdvcmdl=&hvlocint=&hvlocphy=9064325&hvtargid=pla-901330901252&psc=1&mcid=1e67a690d542381cad08978807059e70",
    "samenvatting" => "In een dystopische toekomst worden kinderen gedwongen om te vechten tot de dood in een jaarlijkse televisieshow. Katniss Everdeen, een 16-jarig meisje uit District 12, neemt de plaats in van haar jongere zusje en vecht voor haar leven in de Hunger Games."
  ),
  array(
    "isbn" => "9780385504209",
    "auteur" => "Dan Brown",
    "naam" => "De Da Vinci Code",
    "foto" => array(
      "voorkant" => "https://placehold.co/400x600",
      "achterkant" => "https://placehold.co/400x600"
    ),
    "prijs" => "5.20",
    "koop_url" => "https://www.amazon.nl/Vinci-Code-Robert-Langdon-Book/dp/0552161276",
    "samenvatting" => "De Da Vinci Code is een thriller waarin Robert Langdon, een professor in symbologie, op zoek gaat naar de Heilige Graal. Hij wordt geholpen door Sophie Neveu, een jonge cryptologe. Samen volgen ze de aanwijzingen die Leonardo da Vinci in zijn schilderijen heeft achtergelaten."
  ),

);


foreach ($boeken as $boek) {
    echo "<h2>" . $boek['naam'] . "</h2>";
    echo "<h2>" . $boek['auteur'] . "</h2>";
    echo "<p>" . $boek['isbn'] . "</p>";
    echo "<p><img src='" . $boek['foto']['voorkant'] . "' alt='Voorkant'></p>";
    echo "<p>Prijs: " . $boek['prijs'] . "</p>";
    echo "<p>" . $boek['samenvatting'] . "</p>";
}

?>