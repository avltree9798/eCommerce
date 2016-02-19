<?php
require '../lib/Functions.php';
echo "<hr>";
$rates = new exchange_rates(); //instantiate the class
//Some Test rates
echo "1 USD equals ".$rates->exchange_rate_convert("USD","IDR",1) . " IDR<br>";
echo "1 IDR equals ".$rates->exchange_rate_convert("IDR","USD",13370.214669052) . " USD<br>";