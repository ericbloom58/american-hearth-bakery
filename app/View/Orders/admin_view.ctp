<?php foreach ($order as $product)
{

  foreach($product['Flavors'] as $flavor)
  {
    echo $flavor['Flavor']['Flavor']['name'];
     echo " " . $product['Product']['name'];
     echo "<BR>";
    
  }
}


?>
