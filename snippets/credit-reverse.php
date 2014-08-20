<?php
$credit = Balanced\Credit::get($credit_href);
$credit->reversals->create();
?>