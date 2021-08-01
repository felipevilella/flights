<?php

namespace App\Http\Controllers;

use App\Functional\Flights\IFlight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    private $_fligth;

    public function __construct(IFlight $fligth) {
        $this->_fligth = $fligth;
    }

    public function listGroupFligths() {
        $outBoundFlight = $this->_fligth->outBoundFlight();
        return $outBoundFlight;
    }
}
