
refund = json.loads(
    storage['refund_create']['response']
)

request = {
    'uri': refund['uri'],
}