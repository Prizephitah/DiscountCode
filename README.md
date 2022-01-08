# Discount Code
This is a small demo project to display my skills. The task was to design and 
implement a system for discount codes. I've chosen to use PHP with the [Slim 4](https://www.slimframework.com/) 
framework to do this. There is no UI, just an API. 

## Requirements
* PHP 8.0+
* Composer

See also [composer.json](composer.json) for more detailed requirements.

## Installation
1. Check out the code to intended directory.
2. Run `composer install`
3. Run `php -S localhost:8080 -t public public/index.php`
4. Point your browser to [localhost:8080](http://localhost:8080)

## Tests
Unit tests are done via [PHPUnit](https://phpunit.de/). The test code is located in [tests/](tests/).

### Running the tests
1. Run `php vendor/bin/phpunit tests/`

## Documentation
Documentation is placed in [docs/](docs/). The architecture documentation is available in [Architecture.md](docs/Architecture.md).

### Generating API documentation
API documentation in Open API specification can be generated by running `php vendor/bin/openapi -o docs/openapi.yaml src/`.