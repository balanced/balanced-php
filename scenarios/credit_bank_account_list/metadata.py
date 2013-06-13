credit = json.loads(
    storage['credit_create_existing_bank_account']['response']
)
bank_acct = credit['bank_account']

request = {
  'id': bank_acct['id'],
  'uri': bank_acct['uri'],
}
