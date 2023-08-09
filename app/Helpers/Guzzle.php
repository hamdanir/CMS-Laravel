<?php

namespace App\Helpers;

use App\Exceptions\SessionExpired;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Exceptions\SofiaException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;
use Psr\Http\Message\ResponseInterface;

class Guzzle
{

  private $client;

  public function __construct(string $uri = '')
  {
      // $this->client = new Client(['base_uri' => config('global.base_env')]);
      if (env('APP_ENV') === 'local') {
        $this->client = new Client(['base_uri' => config('api.dev')]);
      }
  
      if (env('APP_ENV') === 'staging') {
        $this->client = new Client(['base_uri' => config('api.staging')]);
      }
  
      if (env('APP_ENV') === 'production') {
        $this->client = new Client(['base_uri' => config('api.prod')]);
      }
  
      if (!empty($uri)) {
        $this->client = new Client(['base_uri' => $uri]);
      }
  }

  public function post(string $path, $data = '')
  {
    try {
      $response = $this->client->post($path, [
        'headers' => $this->headers(),
        'json' => $data,
        'timeout' => 60
      ]);

      $body = json_decode($response->getBody());

      return $body;
    } catch (RequestException $e) {
      if ($e->hasResponse()) {
        $exception = (string) $e->getResponse()->getBody();
        $exception = json_decode($exception);
        return $exception;
      } else {
        Log::error($e);
        throw $e;
      }
    } catch (SofiaException $e) {
      Log::error($e);
      throw $e;
    } catch (SessionExpired $e) {
      Log::error($e);
      throw $e;
    }
  }

  public function put(string $path, $data = '')
  {
    try {
        // dd($this->client);
      $response = $this->client->put($path, [
        'headers' => $this->headers(),
        'json' => $data,
        'timeout' => 60
      ]);

      $body = json_decode($response->getBody());

      return $body;
    } catch (RequestException $e) {
      if ($e->hasResponse()) {
        $exception = (string) $e->getResponse()->getBody();
        $exception = json_decode($exception);
        return $exception;
      } else {
        Log::error($e);
        throw $e;
      }
    } catch (SofiaException $e) {
      Log::error($e);
      throw $e;
    } catch (SessionExpired $e) {
      Log::error($e);
      throw $e;
    }
  }

  public function get(string $path, $data = '')
  {
    try {
        // dd($this->client);
      $response = $this->client->get($path, [
        'headers' => $this->headers(),
        'query' => $data,
        'timeout' => 60
      ]);

      $body = json_decode($response->getBody());

      return $body;
    } catch (RequestException $e) {
      if ($e->hasResponse()) {
        $exception = (string) $e->getResponse()->getBody();
        $exception = json_decode($exception);
        return $exception;
      } else {
        Log::error($e);
        throw $e;
      }
    } catch (SofiaException $e) {
      Log::error($e);
      throw $e;
    } catch (SessionExpired $e) {
      Log::error($e);
      throw $e;
    }
  }

  public function del(string $path, $data = '')
  {
    try {
        // dd($this->client);
      $response = $this->client->delete($path, [
        'headers' => $this->headers(),
        'json' => $data,
        'timeout' => 60
      ]);

      $body = json_decode($response->getBody());

      return $body;
    } catch (RequestException $e) {
      if ($e->hasResponse()) {
        $exception = (string) $e->getResponse()->getBody();
        $exception = json_decode($exception);
        return $exception;
      } else {
        Log::error($e);
        throw $e;
      }
    } catch (SofiaException $e) {
      Log::error($e);
      throw $e;
    } catch (SessionExpired $e) {
      Log::error($e);
      throw $e;
    }
  }

  public function tes(string $path, $data = '')
  {
    // dd($data);
    if ($path == '/api/get-login') {
      if ($data['email'] == 'test@gmail.com' && $data['password'] == 'Password1') {

        $data = [
            "uuid" => "7a19031a-ad6b-4d15-82d7-8ddceaced4f8",
            "tokenSession" => "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiIwMTVnaHpAZ21haWwuY29tIiwiaWF0IjoxNjc4MjAzMDU4LCJleHAiOjE2NzgyODk0NTh9.VxpB_lL_oNPzxIleCky_MTpc4fQ3NKnVvTn6rq67RGc0Y0szpihmMATnjj",
            "nameUser" => "test email 1",
            "email" => "test@gmail.com",
            "phoneNumber" => "0896842903641",
            "pfp" => "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png",
            "generated" => false,
            "roleName" => "Admin",
        ];
        return json_decode(json_encode(['status' => 200, 'message' => "Success", 'data' => $data]));
      } else {
        return json_decode(json_encode(['status' => 404, 'message' => "Not Found", 'data' => []]));
      }
      
    } elseif ($path == '/api/get-list') {
      $data = [
        [
          "First_name" => "Airi",
          "Last_name" => "Satou",
          "Position" => "Accountant",
          "Office" => "Tokyo",
          "Start_date" => "28th Nov 08",
          "Salary" => "$162,700"
        ],
        [
          "First_name" => "Angelica",
          "Last_name" => "Ramos",
          "Position" => "Chief Executive Officer (CEO)",
          "Office" => "London",
          "Start_date" => "9th Oct 09",
          "Salary" => "$1,200,000"
        ],
        [
          "First_name" => "Ashton",
          "Last_name" => "Cox",
          "Position" => "Junior Technical Author",
          "Office" => "San Francisco",
          "Start_date" => "12th Jan 09",
          "Salary" => "$86,000"
        ],
        [
          "First_name" => "Bradley",
          "Last_name" => "Greer",
          "Position" => "Software Engineer",
          "Office" => "London",
          "Start_date" => "13th Oct 12",
          "Salary" => "$132,000"
        ],
        [
          "First_name" => "Brenden",
          "Last_name" => "Wagner",
          "Position" => "Software Engineer",
          "Office" => "San Francisco",
          "Start_date" => "7th Jun 11",
          "Salary" => "$206,850"
        ],
      ];
    return json_decode(json_encode(['status' => 200, 'message' => "Success", 'data' => $data, 'totalData' => 5]));
    }
  }

  private function headers()
  {
    return [
      'X-Content-Type-Options'=>'nosniff',
      'X-XSS-Protection'=> '1; mode=block',
      'Strict-Transport-Security'=> 'max-age=31536000; includeSubDomains; preload',
      'X-Frame-Options'=>'SAMEORIGIN',
      'Content-Type' => 'application/json',
      'authToken' => session()->get('LoginSession'),
      'Authorization' =>  'Bearer ' . session()->get('LoginSession')
    ];
  }
}
