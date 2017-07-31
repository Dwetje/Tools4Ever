<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 0.2b
 */

//
// Database `toolsforever`
//

// `toolsforever`.`fabriek`
$fabriek = array(
  array('fabriekID' => '1','fabrieknaam' => 'Worx','telefoon' => '0701234567','emailadres' => 'info@worx.nl'),
  array('fabriekID' => '2','fabrieknaam' => 'Black & Decker','telefoon' => '0601234567','emailadres' => 'info@B&D.nl'),
  array('fabriekID' => '3','fabrieknaam' => 'Einhell','telefoon' => '0104567890','emailadres' => 'info@einhell.nl'),
  array('fabriekID' => '4','fabrieknaam' => 'Kärcher','telefoon' => '123098765','emailadres' => 'info@kärcher.nl'),
  array('fabriekID' => '5','fabrieknaam' => 'Bosch','telefoon' => '0201234567','emailadres' => 'info@bosch.nl'),
  array('fabriekID' => '6','fabrieknaam' => 'Sencys','telefoon' => '090123654','emailadres' => 'info@sencys.nl')
);

// `toolsforever`.`gebruikers`
$gebruikers = array(
  array('gebruikerID' => '1','gebruikersnaam' => 'MrSanchez','rol' => 'Directie','wachtwoord' => 'sanchez2016','voorletters' => 'G','tussenvoegsel' => '','achternaam' => 'Sanchez','telefoon' => '0612345678','emailadres' => 'sanchez@tfe.nl'),
  array('gebruikerID' => '2','gebruikersnaam' => 'DhrNorton','rol' => 'Directie','wachtwoord' => 'norton2016','voorletters' => 'N','tussenvoegsel' => '','achternaam' => 'Norton','telefoon' => '0698765332','emailadres' => 'norton@tfe.nl'),
  array('gebruikerID' => '3','gebruikersnaam' => 'MrHuisman','rol' => 'Medewerker','wachtwoord' => 'Huisman2016','voorletters' => 'S','tussenvoegsel' => '','achternaam' => 'Huisman','telefoon' => '0678786723','emailadres' => 'huisman@tfe.nl'),
  array('gebruikerID' => '4','gebruikersnaam' => 'MvrBuijs','rol' => 'Medewerker','wachtwoord' => 'buijs2016','voorletters' => 'J','tussenvoegsel' => '','achternaam' => 'Buijs','telefoon' => '0698712347','emailadres' => 'buijs@tfe.nl')
);

// `toolsforever`.`locatie`
$locatie = array(
  array('locatieID' => '1','locatie' => 'Rotterdam','adres' => 'pleesmanstraat 7','postcode' => '1202 EE','plaats' => 'Rotterdam','telefoon' => '060123567','emailadres' => 'rotterdam.TFE@gmail.com'),
  array('locatieID' => '2','locatie' => 'Almere','adres' => 'watweetjij 99','postcode' => '1402 AA','plaats' => 'Almere','telefoon' => '0901245637','emailadres' => 'almere.TFE@gmail.com'),
  array('locatieID' => '3','locatie' => 'Eindhoven','adres' => 'manmanmanweg 88','postcode' => '1669 DD','plaats' => 'Eindhoven','telefoon' => '030563913','emailadres' => 'eindhoven.TFE@gmail.com')
);

// `toolsforever`.`product`
$product = array(
  array('productID' => '1','productnaam' => 'Accuboordhamer','type' => 'WX 382','fabriekID' => '1','inkoopprijs' => '69.95','verkoopprijs' => '111.75'),
  array('productID' => '2','productnaam' => '4-in-1 schuurmachine','type' => 'KA 280 K','fabriekID' => '2','inkoopprijs' => '55.95','verkoopprijs' => '67.95'),
  array('productID' => '5','productnaam' => 'Verstekzaag','type' => 'BT-MS 2112','fabriekID' => '3','inkoopprijs' => '49.95','verkoopprijs' => '67.49'),
  array('productID' => '6','productnaam' => 'Alleszuiger','type' => 'WD2.200','fabriekID' => '4','inkoopprijs' => '29.95','verkoopprijs' => '47.96'),
  array('productID' => '7','productnaam' => 'Accuboordmachine','type' => 'PSR 14.4','fabriekID' => '5','inkoopprijs' => '59.95','verkoopprijs' => '68.00'),
  array('productID' => '8','productnaam' => '33-delige borenset','type' => '','fabriekID' => '6','inkoopprijs' => '9.95','verkoopprijs' => '15.20'),
  array('productID' => '9','productnaam' => 'Workmate','type' => 'WM 536','fabriekID' => '2','inkoopprijs' => '49.95','verkoopprijs' => '63.20'),
  array('productID' => '10','productnaam' => 'Kruislijnlaserset','type' => 'PCL 20','fabriekID' => '5','inkoopprijs' => '99.95','verkoopprijs' => '122.40')
);

// `toolsforever`.`voorraad`
$voorraad = array(
  array('voorraadID' => '1','locatieID' => '1','productID' => '1','minimumaantal' => '10','aantal' => '10'),
  array('voorraadID' => '2','locatieID' => '1','productID' => '2','minimumaantal' => '10','aantal' => '15'),
  array('voorraadID' => '3','locatieID' => '1','productID' => '5','minimumaantal' => '10','aantal' => '2'),
  array('voorraadID' => '4','locatieID' => '2','productID' => '6','minimumaantal' => '10','aantal' => '4'),
  array('voorraadID' => '5','locatieID' => '2','productID' => '1','minimumaantal' => '21','aantal' => '11'),
  array('voorraadID' => '6','locatieID' => '2','productID' => '7','minimumaantal' => '10','aantal' => '12'),
  array('voorraadID' => '7','locatieID' => '2','productID' => '8','minimumaantal' => '30','aantal' => '54'),
  array('voorraadID' => '8','locatieID' => '3','productID' => '9','minimumaantal' => '10','aantal' => '14'),
  array('voorraadID' => '9','locatieID' => '3','productID' => '10','minimumaantal' => '10','aantal' => '11'),
  array('voorraadID' => '10','locatieID' => '3','productID' => '1','minimumaantal' => '20','aantal' => '11'),
  array('voorraadID' => '11','locatieID' => '3','productID' => '7','minimumaantal' => '20','aantal' => '12')
);
