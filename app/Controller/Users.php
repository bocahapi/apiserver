<?php
namespace App\Controller;

use App\Models\User;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;

/**
 * Class Users
 * @package App\Controller
 */
Class Users extends BaseController
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
	public function index(ServerRequestInterface $request, ResponseInterface $response)
	{
        /**
         * @var Response $response
         */
        return $response->withJson(
            User::find(1)->toArray(),
            200,
            JSON_PRETTY_PRINT
        );
	}

	public function addUser()
    {
    }
}