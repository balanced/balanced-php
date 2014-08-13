<?php
// $debitHref is the stored href of the debit
$debit = Balanced\Debit::get($debitHref);
$dispute = $debit->dispute;
?>