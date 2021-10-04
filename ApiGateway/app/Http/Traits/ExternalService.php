<?php
namespace App\Http\Traits;

use GuzzleHttp\Client;

trait ExternalService
{

    /**
     * Send request to any service
     *
     * @param
     *            $method
     * @param
     *            $requestUrl
     * @param array $formParams
     * @param array $headers
     * @return string
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);
        if (isset($this->secret)) {
            $this->secret = request()->headers;

            foreach ($this->secret as $key => $header) {
                if (in_array($key, [
                    'authorization',
                    'accept'
                ])) {
                    $headers[$key] = $header;
                }
            }
        }

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers' => $headers,
            'query' => $method == 'GET' ? $formParams : ''
        ]);
        return $response->getBody()->getContents();
    }
}