%if mode == 'definition':
Balanced\Dispute::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$dispute = Balanced\Dispute::get("/disputes/DT61IA2iRqyYBLqUCJNt5XNV");

?>
%endif