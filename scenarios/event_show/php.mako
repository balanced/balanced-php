%if mode == 'definition':
Balanced\Event::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-25ZY8HQwZPuQtDecrxb671LilUya5t5G0";

$event = Balanced\Event::get("/events/EVac079fda6c3411e49b2c020fe4ae3568");

?>
%endif