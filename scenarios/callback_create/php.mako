%if mode == 'definition':
\Balanced\Callback()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-22IOkhevjZlmRP2do6CZixkkDshTiOjTV";

$callback = new Balanced\Callback(array(
  "url" => "http://www.example.com/callback"
));
$callback->save();

?>
%endif