<?php
namespace App\Controller;

use App\Models\User;
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
	public function index(ServerRequestInterface $request, ResponseInterface $response)
	{
        return $response->withJson(
            User::all()->toArray(),
            200,
            JSON_PRETTY_PRINT
        );
	}

	public function getUser(ServerRequestInterface $request, ResponseInterface $response, $params)
    {
        // if wanna get user by custom fields
        // print_r(User::where('username', $params[$args])->first()->toArray());

        return $response->withJson(
            User::find($params['id'])->toArray(),
            200, JSON_PRETTY_PRINT
        );
    }

    public function addUser(ServerRequestInterface $request, ResponseInterface $response)
    {
        $params = $request->getParsedBody();

        $addUser = User::create([
            'username' => $params['username'],
            'password' => md5($params['password']),
            'email'    => $params['email']
        ]);

        $result = [
          'message' => 'Input User Berhasil'
        ];

        if (!$addUser) {
            $result = [
                'message' => 'Input User Gagal'
            ];
        }

        return $response->withJson(
            $result,
            200,
            JSON_PRETTY_PRINT
        );
    }

    public function update(ServerRequestInterface $request, ResponseInterface $response, $params)
    {
        $values = $request->getParsedBody();

        $update = User::where('uid', $params['id'])->update([
            'username' => $values['username'],
            'password' => md5($values['password']),
            'email'    => $values['email']
        ]);


        $result = [
            'message' => 'Update User Berhasil'
        ];

        if (!$update) {
            $result = [
                'message' => 'Update User Gagal'
            ];
        }

        return $response->withJson(
            $result,
            200,
            JSON_PRETTY_PRINT
        );

    }

    public function delete(ServerRequestInterface $request, ResponseInterface $response, $params)
    {
        User::destroy($params['id']);

        return $response->withJson([
            'message' => 'Deleting User Berhasil'
        ],
            200,
            JSON_PRETTY_PRINT
        );
    }
}