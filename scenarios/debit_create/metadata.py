buyer = json.loads(
    storage['account_create_buyer']['response']
)

request = {
    'payload': {
        'amount': 5000,
        'appears_on_statement_as': 'Statement text',
        'description': 'Some descriptive text for the debit in the dashboard',
    },
    'debits_uri': buyer['debits_uri'],
    'account_uri': buyer['uri'],
}