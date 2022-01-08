<?php

use Prizephitah\DiscountCode\Api\Api;
use Prizephitah\DiscountCode\Database\DatabaseInterface;
use Prizephitah\DiscountCode\Database\MockDatabase;
use Prizephitah\DiscountCode\Session\MockUserSession;
use Prizephitah\DiscountCode\Session\SessionInterface;
use Prizephitah\DiscountCode\UserAuthenticationMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require __DIR__.'/../vendor/autoload.php';

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions([
    DatabaseInterface::class => \DI\factory(function() {
        return new MockDatabase();
    }),
    SessionInterface::class => \DI\factory(function() {
        return new MockUserSession();
    })
]);
$container = $builder->build();

$app = \DI\Bridge\Slim\Bridge::create($container);
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    $response->getBody()->write("Discount code!");
    return $response;
});
$app->get('/discount-code/{brand}', Api::class . ':getCode')
    ->setName('getCode')
    ->add($container->get(UserAuthenticationMiddleware::class))
;

$app->run();