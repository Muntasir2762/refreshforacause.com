<?php

namespace App\Http\Controllers;

use App\Services\ShipStationService;
use Illuminate\Http\Request;

class ShipStationController extends Controller
{
    protected $shipStationService;

    public function __construct(ShipStationService $shipStationService)
    {
        $this->shipStationService = $shipStationService;
    }

    /**
     * Generate a shipping label.
     */
    public function createLabel(Request $request)
    {
        $shipmentData = [
            'shipment' => $request->all(), // Validate input here
        ];

        $response = $this->shipStationService->createLabel($shipmentData);

        if ($response['success'] ?? true) {
            return response()->json($response);
        }

        return response()->json($response, 400);
    }

    /**
     * Get available carriers.
     */
    public function getCarriers()
    {
        $response = $this->shipStationService->getCarriers();

        if ($response['success'] ?? true) {
            return response()->json($response);
        }

        return response()->json($response, 400);
    }
}
