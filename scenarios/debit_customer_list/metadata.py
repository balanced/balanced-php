customer = json.loads(
    storage['customer_add_card']['response']
)

request = {
    'uri': customer['uri'],
    'debits_uri': customer['debits_uri'],
}