%if mode == 'definition':
Balanced\Debit->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-Hznf9GhTb2Xkj7fGwVD6lZSMH5F1eTRl";

$debit = Balanced\Debit::get("/debits/WD3dkNPNQtHiYcvFLWUkotAJ");
$debit->description = "New description for debit";
$debit->meta = array(
    "anykey" => "valuegoeshere",
    "facebook.id" => "1234567890",
);
$debit->save();

?>
%endif