%if mode == 'definition':
Balanced\APIKey->unstore();

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$api_key = Balanced\APIKey::get("/api_keys/AKJnLWedoBhUHpdhoGEOPew");
$api_key->unstore();

?>
%endif