<?php

namespace App\Controllers;

use DI\Container;
use App\Models\Payment;
use App\Controllers\Controller;
use Stripe\Exception\CardException;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentsController extends Controller {

    public function __invoke(Request $request, Response $response)
    {
        //dump(Payment::get());
        //dump($request->getParsedBody());
        ['name' => $name, 'email' => $email, 'payment_method' => $paymentMethod] = $request->getParsedBody();

        //dump($paymentMethod);
        //die();
        
        try {
            throw new CardException();
            $charge = $this->container->get('stripe')->paymentIntents->create([
                'amount' => 99,
                'currency' => 'usd',
                'payment_method' => $paymentMethod,
                'description' => 'Who Paid 99 cents Payment',
                'confirm' => true,
                'receipt_email' => $email,
            ]);
    
            Payment::create([
                'name' => $name,
                'email' => $email,
                'token' => $token = bin2hex(random_bytes(32)),
                'stripe_id' => 'abc',
            ]); 

            return $response->withHeader('Location', '/payments?token=' .$token);

        } catch (CardException $e) {
            return $response->withHeader('Location', '/');
        }
        
        return $response->withHeader('Location', '/payments?token=' .$token);
        //return $this->container->get('view')->render($response, 'home.twig');
    }
}