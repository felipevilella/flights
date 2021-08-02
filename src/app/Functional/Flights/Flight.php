<?php

namespace App\Functional\Flights;
          
use App\Functional\Flights\Services\InBoundFlight;
use App\Functional\Flights\Services\OutboundFlight;
use App\Functional\Flights\Services\GroupFlight;

class Flight implements IFlight {
    use InBoundFlight, OutboundFlight, GroupFlight;
}