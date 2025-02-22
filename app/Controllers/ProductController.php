<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;

class ProductController extends Controller {
    use ResponseTrait;

    public function addProduct() {
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

    }

}
