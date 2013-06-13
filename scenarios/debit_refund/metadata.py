storage.pop('debit_create')

debit = json.loads(
    storage['debit_create']['response']
)

request = {
    'refunds_uri': debit['refunds_uri'],
    'debit_uri': debit['uri'],
}