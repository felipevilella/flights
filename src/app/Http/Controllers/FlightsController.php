<?php

namespace App\Http\Controllers;

use App\Functional\Flights\IFlight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    private $_fligth;

    public function __construct(IFlight $fligth) {
        $this->fligths = $fligth;
    }

    public function store() {

        try {
            $outBoundFlights = $this->fligths->OutBoundFlight();
            $inBoundFlights = $this->fligths->InBoundFlight();

            return $this->fligths->GroupFlight($outBoundFlights, $inBoundFlights);

        } catch(Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
       
    }
}
