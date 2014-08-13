<?php
# $card_href is the stored href for the Card
$card = Balanced\Card::get($card_href);
$card->card_holds->create(array(
"amount" => "5000",
"description" => "Some descriptive text for the debit in the dashboard",
));
?>