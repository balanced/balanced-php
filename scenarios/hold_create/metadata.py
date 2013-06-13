buyer = json.loads(
    storage['account_create_buyer']['response']
)

request = {
    'payload': {
        'amount': 5000,
        'description': 'Some descriptive text for the debit in the dashboard',
    },
    'holds_uri': buyer['holds_uri'],
    'account_uri': buyer['uri'],
}
