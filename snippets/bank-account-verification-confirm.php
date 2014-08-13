<?php
// time has elapsed, so find the BankAccountVerification
$verification = Balanced\BankAccountVerification::get('/verifications/BZ2Sy2Z4Bp2mARnCLztiu2VG');
$verification->amount_1 = 1;
$verification->amount_2 = 1;
$verification->save();
?>