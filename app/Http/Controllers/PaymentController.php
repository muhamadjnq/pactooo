<?php

namespace App\Http\Controllers;

use App\Services\OxaPayService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $oxaPay;

    public function __construct(OxaPayService $oxaPay)
    {
        $this->oxaPay = $oxaPay;
    }

    public function create(Request $request)
    {
      $url = 'https://api.oxapay.com/merchants/request';

      $data = array(
        'merchant' => 'VCYPND-T5Y2UA-BH3AL9-4P2PW6',
        'amount' => 100,
        'currency' => 'TRX',
        'lifeTime' => 30,
        'feePaidByPayer' => 0,
        'underPaidCover' => 2.5,
        'callbackUrl' => 'https://example.com/callback',
        'returnUrl' => 'https://example.com/success',
        'description' => 'Order #12345',
        'orderId' => 'ORD-12345',
        'email' => 'customer@example.com'
      );

        $options = array(
          'http' => array(
              'header' => 'Content-Type: application/json',
              'method'  => 'POST',
              'content' => json_encode($data),
          ),
        );

        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response);
        dd($result);
            }

    public function callback(Request $request)
    {
        // پردازش نتیجه پرداخت
        return $request->all();
    }
}
