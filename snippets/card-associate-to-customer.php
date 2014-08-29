<?php
$card = Balanced\Card::get($cardHref);
$card->associateToCustomer($customerHref);
?>