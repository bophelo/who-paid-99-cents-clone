<?php

namespace App\Controllers;

use DI\Container;
use App\Models\Payment;
use App\Controllers\Controller;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PaymentsIndexController extends Controller {

    public function __invoke(Request $request, Response $response)
    {
        $payments = Payment::latest()->get();

        return $this->container->get('view')->render($response, 'payments.twig', [
            'payments' => $payments
        ]);
    }
}