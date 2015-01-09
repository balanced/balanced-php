$marketplace = Balanced\Marketplace::mine();
$settlements = $marketplace->settlements->query()->all();