%if mode == 'definition':
Balanced\Event::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-1xLFE6RLC1W3P4ePiQDI4UVpRwtKcdfqL";

$event = Balanced\Event::get("/events/EV96e2da0887f411e4a02d020fe4ae3568");

?>
%endif