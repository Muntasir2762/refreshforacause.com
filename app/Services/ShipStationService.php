<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ShipStationService
{
    protected $baseUrl;
    protected $apiKey;
    protected $apiSecret;

    public function __construct()
    {
        $this->baseUrl = config('services.shipstation.base_url');
        $this->apiKey = config('services.shipstation.api_key');
        $this->apiSecret = ''; // No secret required; use an empty string
    }

    public function createLabel(array $shipmentData)
    {
        $response = Http::withBasicAuth($this->apiKey, $this->apiSecret)
            ->post("{$this->baseUrl}/v2/labels", $shipmentData);

        if ($response->successful()) {
            return $response->json();
        }

        // Handle errors
        return [
            'success' => false,
            'message' => $response->body(),
        ];
    }

    /**
     * Get available carriers.
     *
     * @return array
     */
    public function getCarriers()
    {
        $response = Http::withBasicAuth($this->apiKey, $this->apiSecret)
            ->get("{$this->baseUrl}/v2/carriers");

        if ($response->successful()) {
            return $response->json();
        }

        return [
            'success' => false,
            'message' => $response->body(),
        ];
    }
}
