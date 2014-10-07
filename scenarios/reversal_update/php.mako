%if mode == 'definition':
Balanced\Reversal->save()

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "ak-test-19GwHG7jYR8FFKR9rBIVyiY1uXBemYVov";

$reversal = Balanced\Reversal::get("/reversals/RV4SFRwPUB4d0wNKELBu9mms");
$reversal->description = 'update this description';
$reversal->meta = array(
    "refund.reason" => "user not happy with product",
    "user.notes" => "very polite on the phone",
    "user.satisfaction" => "6",
);
$reversal->save();

?>
%endif