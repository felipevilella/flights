<?php

namespace App\Functional\Flights;

interface IFlight {
    public function InBoundFlight();
    public function OutboundFlight(); 
    public function GroupFlight(array $outBoundFlights, array $inBoundFlights);    
}



