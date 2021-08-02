<?php 

namespace App\Functional\Flights\Services;

use Illuminate\Support\Facades\Http;


trait InBoundFlight {
    public function InBoundFlight() {
        try {
            $reponse = Http::get($_ENV['URL_API']."/flights?inbound=1");
            
            return (array) $reponse->json();
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}