<?php

namespace App\Controllers;

use DI\Container;
use App\Models\Payment;
use App\Controllers\Controller;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotFoundException;

class PaymentsIndexController extends Controller {

    public function __invoke(Request $request, Response $response)
    {
        //check if token exists
        //dump($request->getQueryParams());
        if(!$token = $request->getQueryParams()['token'] ?? false){
            throw new HttpNotFoundException($request);
        }

        //verify in db
        if(!Payment::where('token',$token)->first()){
            throw new HttpNotFoundException($request);
        }
        
        $payments = Payment::latest()->get();

        return $this->container->get('view')->render($response, 'payments.twig', [
            'payments' => $payments,
            'messages' => $this->container->get('flash')->getMessages()
        ]);
    }
}