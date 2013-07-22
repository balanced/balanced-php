% if mode == 'definition':
Balanced\Verification::get

% else:
<?php

require(__DIR__ . '/vendor/autoload.php');

Httpful\Bootstrap::init();
RESTful\Bootstrap::init();
Balanced\Bootstrap::init();

Balanced\Settings::$api_key = "2fd37702d33511e2a00f026ba7d31e6f";

$verification = Balanced\BankAccountVerification::get("/v1/bank_accounts/BA6h13dSUEsvVjbhFd2MqdmT/verifications/BZ6hHnC9dKqiQJJtuxbp7SGP");
% endif