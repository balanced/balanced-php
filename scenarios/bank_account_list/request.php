$marketplace = Balanced\Marketplace::mine();
$bank_accounts = $marketplace->bank_accounts->query()->all();