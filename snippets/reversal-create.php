<?php
// $credit_href is the stored href for the Credit
$credit = Balanced\Credit::get($credit_href);
$credit->reversals->create();
?>
