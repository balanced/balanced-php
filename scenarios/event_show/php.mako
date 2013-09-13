%if mode == 'definition':
Balanced\Event::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "4210e1bc1c0e11e3a141026ba7f8ec28";

$event = Balanced\Event::get("/v1/events/EV422caf0a1c0e11e390d1026ba7cac9da");

?>
%endif