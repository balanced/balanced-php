debit = json.loads(
    storage['debit_create']['response']
)

request = {
    'uri': debit['uri'],
}
