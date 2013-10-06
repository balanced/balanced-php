%if mode == 'definition':
\Balanced\Marketplace::mine()->holds->create()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1p1Tsac7gHeMQowL2seB7ieliuAJAufyq";

$marketplace = \Balanced\Marketplace::mine();
$hold = $marketplace->holds->create(array(
  "amount" => "5000",
  "description" => "Some descriptive text for the debit in the dashboard",
  "source_uri" => "/v1/marketplaces/TEST-MP5FKPQwyjvVgTDt7EiRw3Kq/cards/CC15RAm6JJIEIae6bicvlWRw"
));

?>
%endif