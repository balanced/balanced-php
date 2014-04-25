%if mode == 'definition':
Balanced\Reversal::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

Balanced\Reversal::get("/reversals/RV6qrEOTouLeIJuPu4s73Ra1");

?>
%endif