# Balanced

Online Marketplace Payments

[![Build Status](https://secure.travis-ci.org/balanced/balanced-php.png)](http://travis-ci.org/balanced/balanced-php)

The design of this library was heavily influenced by [Httpful](https://github.com/nategood/httpful).

## Requirements

- [PHP](http://www.php.net) >= 5.3 **with** [cURL](http://www.php.net/manual/en/curl.installation.php)
- [RESTful](https://github.com/bninja/restful) >= 0.1
- [Httpful](https://github.com/nategood/httpful) >= 0.1

## Issues

Please use appropriately tagged github [issues](https://github.com/balanced/balanced-php/issues) to request features or report bugs.

## Installation

You can install using [composer](#composer) or from [source](#source). Note that Balanced is [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) compliant:

### Composer

If you don't have Composer [install](http://getcomposer.org/doc/00-intro.md#installation) it:

    $ curl -s https://getcomposer.org/installer | php

Add this to your `composer.json`:

```javascript
{
    "require": {
        "balanced/balanced": "*"
    }
}
```

Refresh your dependencies:

```bash
$ php composer.phar update
```


Then make sure to `require` the autoloader and initialize all:

```php
<?php
require(__DIR__ . '/vendor/autoload.php');

\Httpful\Bootstrap::init();
\RESTful\Bootstrap::init();
\Balanced\Bootstrap::init();
...
```

### Source

Download [Httpful](https://github.com/nategood/httpful) source:

```bash
$ curl -s -L -o httpful.zip https://github.com/nategood/httpful/zipball/master;
$ unzip httpful.zip; mv nategood-httpful* httpful; rm httpful.zip
```

Download [RESTful](https://github.com/bninja/restful) source:

```bash
$ curl -s -L -o restful.zip https://github.com/bninja/restful/zipball/master;
$ unzip restful.zip; mv bninja-restful* restful; rm restful.zips
```

Download the Balanced source:

```bash
$ curl -s -L -o balanced.zip https://github.com/balanced/balanced-php/zipball/master
$ unzip balanced.zip; mv balanced-balanced-php-* balanced; rm balanced.zip
```


And then `require` all bootstrap files:

```php
<?php
require(__DIR__ . "/httpful/bootstrap.php")
require(__DIR__ . "/restful/bootstrap.php")
require(__DIR__ . "/balanced/bootstrap.php")

\Httpful\Bootstrap::init();
\RESTful\Bootstrap::init();
\Balanced\Bootstrap::init();
...
```

## Quickstart

```bash
curl -s http://getcomposer.org/installer | php

echo '
{
    "require": {
        "balanced/balanced": "*"
    }
}
' > composer.json

php composer.phar install

curl https://raw.github.com/balanced/balanced-php/master/example/example.php > example.php

php example.php

curl https://raw.github.com/balanced/balanced-php/master/example/buyer-example.php > buyer-example.php

php -S 127.0.0.1:9321 buyer-example.php
# now open a browser and go to http://127.0.0.1:9321/ to view how to tokenize cards and add to a buyer
```

## Usage

See https://www.balancedpayments.com/docs/overview?language=php for tutorials and documentation.

## Testing

    $ phpunit --bootstrap vendor/autoload.php tests/

Or if you'd like to skip network calls:

    $ phpunit --exclude-group suite --bootstrap vendor/autoload.php tests/

## Publishing

1. Ensure that **all** [tests](#testing) pass
2. Increment minor `VERSION` in `src/Balanced/Settings` and `composer.json` (`git commit -am 'v{VERSION} release'`)
3. Tag it (`git tag -a v{VERSION} -m 'v{VERSION} release'`)
4. Push the tag (`git push --tag`)
5. [Packagist](http://packagist.org/packages/balanced/balanced) will see the new tag and take it from there

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Write your code **and [tests](#testing)**
4. Ensure all tests still pass (`phpunit --bootstrap vendor/autoload.php tests/`)
5. Commit your changes (`git commit -am 'Add some feature'`)
6. Push to the branch (`git push origin my-new-feature`)
7. Create new pull request

## Contributors

* [Jacob Rus](https://github.com/jrus)
* [Leon Smith](https://github.com/leonsmith)
* [Matt Drollette](https://github.com/MDrollette)
* [You](https://github.com/balanced/balanced-php/issues)!
