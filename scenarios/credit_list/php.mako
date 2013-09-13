%if mode == 'definition':
Balanced\Marketplace::mine()->credits

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$marketplace = Balanced\Marketplace::mine();
$credits = $marketplace->credits->query()->all();

?>
%endif