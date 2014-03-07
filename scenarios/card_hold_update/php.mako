%if mode == 'definition':
Balanced\Hold->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$hold = Balanced\Hold::get("/card_holds/HL2ZjCXw7QFFwhZFEzku161c");
$hold->description = 'update this description';
$hold->save();

?>
%endif