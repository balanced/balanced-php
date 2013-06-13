refund = json.loads(
    storage['refund_create']['response']
)

request = {
    'uri': refund['customer']['refunds_uri'],
    'customer_uri': refund['customer']['uri']
}