<?php 

namespace App\Functional\Flights\Services;

use Illuminate\Support\Facades\Http;

trait OutboundFlight {
    public function OutboundFlight() {
        try {
            $reponse = Http::get($_ENV['URL_API']."/flights?outbound=1");
            
            return (array) $reponse->json();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}