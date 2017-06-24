<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


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
	public function index(ServerRequestInterface $request, ResponseInterface $response, $params)
	{
	    $method = $request->getMethod();
        $rest_api = [];
        switch ($method) {
            case 'POST':
                if (isset($params['id'])) {
                    $rest_api = [
                        'status' => 'OK!',
                        'code'   => '200',
                        'error' => false,
                        'msg'   => 'POST user id ' . $params['id']
                    ];
                }
                break;
            case 'GET':
                if (isset($params['id'])) {
                    $rest_api = [
                        'status' => 'OK!',
                        'code'   => '200',
                        'error' => false,
                        'msg'   => 'GET user id ' . $params['id']
                    ];
                } else {
                    $rest_api = [
                        'status' => 'OK!',
                        'code'   => '200',
                        'error' => false,
                        'data'  => [
                            [
                                'id' => 1,
                                'name' => 'administrator',
                                'email' => 'webmaster@mail.com'
                            ],
                            [
                                'id' => 2,
                                'name' => 'administrator2',
                                'email' => 'webmaster@mail.com'
                            ],
                        ]
                    ];
                }
                break;
            default :
                $rest_api = [
                    'status' => 'failed!',
                    'code'   => '404',
                    'msg'    => 'Not Found!'
                ];
                break;
        }

        return $response->withJson($rest_api, 200, JSON_PRETTY_PRINT);
	}

}