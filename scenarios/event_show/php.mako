%if mode == 'definition':
Balanced\Event::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$event = Balanced\Event::get("/events/EV529da48aa0ab11e3bbed060e77eca47a");

?>
%endif