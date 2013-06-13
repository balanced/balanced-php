$marketplace = Balanced\Marketplace::mine();
$refunds = $marketplace->refunds->query()->all();