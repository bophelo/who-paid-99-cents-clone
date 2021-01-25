<?php

namespace App\Controllers;

use DI\Container;
use App\Controllers\Controller;
use App\Models\Payment;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentsController extends Controller {

    public function __invoke(Request $request, Response $response)
    {
        //dump(Payment::get());
        //dump($request->getParsedBody());
        ['name' => $name, 'email' => $email] = $request->getParsedBody();

        Payment::create([
            'name' => $name,
            'email' => $email,
            'token' => $token = bin2hex(random_bytes(32)),
            'payfast_id' => 'abc',
        ]);
        
        return $response->withHeader('Location', '/payments?token=' .$token);
        //return $this->container->get('view')->render($response, 'home.twig');
    }
}