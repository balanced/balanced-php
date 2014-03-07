%if mode == 'definition':
Balanced\Hold::get()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

Balanced\Hold::get("/card_holds/HL2ZjCXw7QFFwhZFEzku161c");

?>
%endif