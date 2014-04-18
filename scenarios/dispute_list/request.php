$marketplace = Balanced\Marketplace::mine();
$disputes = $marketplace->disputes->query()->all();