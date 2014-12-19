%if mode == 'definition':
Balanced\Marketplace::mine()->customers->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-2wIOi20ITgc1u1Lw6UM3y5ZZjZ66M8HMf";

$marketplace = Balanced\Marketplace::mine();
$customer = $marketplace->customers->create(array(
  'address' => array( 
     'postal_code' => '48120', 
  ), 
  'dob_month' => '7',
  'dob_year' => '1963',
  'name' => 'Henry Ford',
));


?>
%endif