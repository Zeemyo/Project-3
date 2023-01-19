<?php

namespace App\Helpers;

use App\Interfaces\V1\Xendit\XenditInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Traits\BugsnagTrait;
use Throwable;

class MidtransHelper
{

    public static function createTransaction(array $params)
    {
        try {
            $res  = self::requestor(env('MIDTRANS_SERVER_KEY'), 'POST', 'charge', $params);

            return $res;
        } catch (Throwable $e) {
            throw $e;
        }
    }

    protected static function requestor(string $serverKey, string $verb, string $endpoint, array $payload = [])
    {
        try {
            // Preparing Base Uri
            $client = new Client([
                'base_uri' => 'https://api.sandbox.midtrans.com/v2/',
                'auth' => [
                    $serverKey,
                    ''
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ]
            ]);

            $res = $client->request($verb, $endpoint, $payload);

            $data = (string) $res->getBody();
            $data = json_decode($data);

            return $data;
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
