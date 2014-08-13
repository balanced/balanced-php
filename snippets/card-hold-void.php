<?php
# $card_hold_href is the stored href for the CardHold
$hold = Balanced\CardHold::get($card_hold_href);
$hold->void();
?>