<?php
$marketplace = Balanced\Marketplace::mine();
$merchant = $marketplace->customers->create(array(
    'address' => array(
        'postal_code' => '48120',
    ),
    'dob_month' => '7',
    'dob_year' => '1963',
    'name' => 'Henry Ford',
));
?>