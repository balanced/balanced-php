bank_accounts = json.loads(
    storage['bank_account_list']['response']
)

bank_account = bank_accounts['items'][0]

credit = json.loads(
    storage['credit_create_new_bank_account']['response']
)

request = {
  'id': bank_account['id'],
  'uri': bank_account['uri'],
  'payload': {
      'amount': credit['amount'],
  },
}
