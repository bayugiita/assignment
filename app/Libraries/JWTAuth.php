<?php

namespace App\Libraries;

use Exception;
use Firebase\JWT\Key;
use \Firebase\JWT\JWT;

class JWTAuth {
    // Method to encode the JWT
    public function encode($data) {
        try {
            $issuedAt       = time();
            $expirationTime = $issuedAt + 3600; // Token expires in 1 hour
            $payload        = array(
                'iat'  => $issuedAt,
                'exp'  => $expirationTime,
                'data' => $data,
            );

            $jwt = JWT::encode($payload, getenv('SECRET_KEY'), 'HS256');
            return $jwt;
        } catch (Exception $e) {
            // If error occurs, return null
            return null;
        }
    }

    // Method to decode the JWT
    public function decode($jwt) {
        try {
            $decoded = JWT::decode($jwt, new Key(getenv('SECRET_KEY'), 'HS256'));
            return $decoded;
        } catch (Exception $e) {
            // If error occurs, return null
            return null;
        }
    }

    public function verify() {
        $request    = request();
        $authHeader = $request->getHeader('Authorization');
        $result     = ['success' => false, 'message' => 'Invalid credentials'];

        if ($authHeader === null) {
            $result['message'] = 'Missing auth header';
            return $result;
        }

        $jwt = str_replace('Bearer ', '', $authHeader->getValue());

        if ($jwt === null) {
            $result['message'] = 'Missing JWT';
            return $result;
        }

        $decoded = $this->decode($jwt);

        if ($decoded === null) {
            $result['message'] = 'Invalid JWT';
            return $result;
        }

        $result['success'] = true;
        $result['message'] = 'Valid JWT';
        return $result;
    }
}
