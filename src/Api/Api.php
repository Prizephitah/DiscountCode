<?php

namespace Prizephitah\DiscountCode\Api;

use Prizephitah\DiscountCode\CodeController;
use Prizephitah\DiscountCode\Session\SessionInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @OA\Info(title="DiscountCode REST API", version="1.0")
 */
class Api
{
    protected ContainerInterface $container;
    protected SessionInterface $session;

    public function __construct(ContainerInterface $container, SessionInterface $session) {
        $this->container = $container;
        $this->session = $session;
    }

    /**
     * @OA\Get(
     *     path="/discount-code/{brand}",
     *     summary="Get a discount code for a brand",
     *     @OA\Parameter(in="path", name="brand", required=true, @OA\Schema(type="string")),
     *     @OA\Response(
     *          response="200",
     *          description="The discount code object",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(ref="#components/schemas/DiscountCodeResponse")
     *          )
     *     )
     * )
     */
    public function getCode(ServerRequestInterface $request, ResponseInterface $response, string $brand, CodeController $codeController): ResponseInterface {
        try {
            $code = $codeController->getCode($brand, $this->session->get('user'));

            $response->getBody()->write(json_encode(DiscountCodeResponse::fromModel($code)));
            return $response->withHeader('Content-Type', 'application/json');
        } catch (\Throwable $t) {
            //TODO Log error
            $response->getBody()->write('Internal server error.');
            return $response->withStatus(500);
        }
    }
}