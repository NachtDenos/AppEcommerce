<?php
define('ProPayPal', 0);
if(ProPayPal){
    define("PayPalClientId", "***********");
    define("PayPalSecret", "************");
    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AVZLmGZWa75-jXEAW8La8hqU-CVrysDX8B2hEuOf5Kd5ys_hkV_pcFEz7Yjw6JRvoFPC77TTandXWYqf");
    define("PayPalSecret", "EL-wdEs-hSvfFuSBW1uVEeA3Kleg0VxYK207hacU
    tDmprLrg_71FG92udngqyc4aTrgDHF-4TK21aUDz");
    define("PayPalBaseUrl", "http://localhost/dashboard/PWCI/AppEcommerce/PayPal/"); //recuerda dejar vacío para que "orderDetails.php" recupere tus datos
    define("PayPalENV", "sandbox");
}
?>