<?php
$credit = $order->credits->first();
$credit->reversals->create();
?>