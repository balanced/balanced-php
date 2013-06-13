$marketplace = Balanced\Marketplace::mine();
$cards = $marketplace->cards->query()->all();