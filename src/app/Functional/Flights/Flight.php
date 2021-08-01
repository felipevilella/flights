<?php

namespace App\Functional\Flights;
          
use App\Functional\Flights\Services\FlightBack;
use App\Functional\Flights\Services\OutboundFlight;
use App\Functional\Flights\Services\GroupFlight;

class Flight implements IFlight {
    use FlightBack, OutboundFlight, GroupFlight;
}