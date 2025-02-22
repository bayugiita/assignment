<?php

namespace App\Controllers;

use App\Libraries\JWTAuth;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;

class AuthController extends Controller {
    use ResponseTrait;

    public function login() {
        // $pembeliModel = new PembeliModel();
        $reqbody = $this->request->getJSON(true);
        $row     = true; //$pembeliModel->where('Email', $reqbody['email'])->first();

        if ($row === null) {
            return $this->respond([
                'message' => 'User did not found',
                'success' => false,
            ], 404);
        }

        // if (!password_verify($reqbody['password'], $row['Password'])) {
        //     return $this->respond([
        //         'message' => 'Email or password is incorrect',
        //         'success' => false,
        //     ], 404);
        // }

        if ($reqbody['email'] != 'test@mail.com' || $reqbody['password'] != 'something') {
            return $this->respond([
                'message' => 'Invalid credentials',
                'success' => false,
            ], 401);
        }

        // Initialize the JWTAuth library
        $jwtAuth = new JWTAuth();

        // Generate the token
        try {
            $token = $jwtAuth->encode([
                'id'    => 1,
                'email' => 'test@mail.com',
                'name'  => 'somebody',
            ]);

            return $this->respond([
                'message' => 'Successfully logged in',
                'success' => true,
                'token'   => $token,
            ], 200);
        } catch (Exception $e) {
            return $this->respond([
                'message' => 'Error generating token',
                'success' => false,
            ], 500);
        }
    }

    public function verify() {
        $jwtAuth = new JWTAuth();
        $result  = $jwtAuth->verify();

        return $this->respond($result, $result['success'] ? 200 : 401);
    }
}
