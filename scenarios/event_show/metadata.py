import balanced


balanced.configure(storage['api_key'])

# HACK: sometimes we don't have an event so generate some event worthy items
# until one turns up.
index = 0
while True:
    if index > 5:
        raise Exception('No events being generated')
    try:
        event = balanced.Event.query[0]
        break
    except IndexError:
        fi = balanced.Card.query[0]
        fi.debit(100)
        index += 1


request = {
    'uri': event.uri,
}
