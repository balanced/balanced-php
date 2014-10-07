%if mode == 'definition':
Balanced\Marketplace::mine()->callbacks->query()->all()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$marketplace = Balanced\Marketplace::mine();
$callbacks = $marketplace->callbacks->query()->all();

?>
%endif