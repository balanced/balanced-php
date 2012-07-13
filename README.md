# Balanced

Online Marketplace Payments

[![Build Status](https://secure.travis-ci.org/balanced/balanced-php.png)](http://travis-ci.org/balanced/balanced-php)

## Installation

Balanced is PSR-0 compliant so add this to your `composor.json`:

    {
        "require": {
            "balanced/balanced": "*"
        }
    }

Or download the repository and `require` it:

    require($path_to_source . "bootstrap.php")
    
And make sure to initialize it:

    Balanced\Bootstrap::init();

## Usage

See https://www.balancedpayments.com/docs/php for tutorials and documentation.

## Testing
    
    $ phpunit --bootstrap vendor/autoload.php tests/
    
Or if you'd like to skip network calls:

    $ phpunit --exclude-group suite --bootstrap vendor/autoload.php tests/

## Example

    $ cd examples
    $ composer.phar install
    $ php -S localhost:8080 buyer-example.php

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Write your code **and tests**
4. Ensure all tests still pass (`phpunit --bootstrap vendor/autoload.php tests/`)
5. Commit your changes (`git commit -am 'Add some feature'`)
6. Push to the branch (`git push origin my-new-feature`)
7. Create new pull request

## Publishing

1. Increment minor `VERSION` in `src/Balanced/Settings` and `composer.json` (`git commit -am 'vVERSION release'`)
2. Tag it (`git tag -a vVERSION -m 'vVERSION release'`)
3. Push the tag (`git push --tag`)
4. [Packagist](http://packagist.org/packages/balanced/balanced) will see the new tag and take it from there
