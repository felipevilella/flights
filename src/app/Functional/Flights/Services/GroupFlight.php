<?php 

namespace App\Functional\Flights\Services;


trait GroupFlight {
    public function GroupFlight(array $outBoundFlights, array $inBoundFlights) {
        $groupFlight = [];
        $groupFlight['flights'] = array_merge($outBoundFlights, $inBoundFlights);
        $groupFlight['groups'] = [];

     
        foreach($inBoundFlights as $key => $inBoundFlight) {
            $outBounds = [];
            $groupKey = $key;
            $totalOutBoundAll = 0;

            foreach($outBoundFlights as $key1 => $outBoundFlight) {

                if($outBoundFlight['fare'] == $inBoundFlight['fare']) {
                    $totalOutBound = array_sum(array_column($outBounds,'price'));
                    $totalOutBoundPreinsertion = intVal($totalOutBound + $outBoundFlight['price']);

                    if($totalOutBound == 0 ) {
                        array_push($outBounds, $outBoundFlight);
                    } else if (
                        $totalOutBound <= $inBoundFlight['price'] &&
                        $totalOutBoundPreinsertion <= $inBoundFlight['price']
                    ) {
                        array_push($outBounds, $outBoundFlight);
                    }
                }
            }

            $totalOutBoundAll = intVal(array_sum(array_column($outBounds,'price')));
            

            if($totalOutBound <= intVal($inBoundFlight['price'])) {
                array_push($groupFlight['groups'], array(
                    'uniqueId' => uniqid(),
                    'totalPrice' => ($totalOutBoundAll/intVal(count($outBounds))) + intval($inBoundFlight['price']),
                    'outBound' => $outBounds,
                    'inbound' => $inBoundFlights[$key]
                ));
            }
        }

       $groupFlight['totalGroups'] = count($groupFlight['groups']);
       $groupFlight['totalFlights'] = count($groupFlight['flights']);
       $groupFlight['cheapestPrice'] = min(array_column($groupFlight['groups'], 'totalPrice'));
       $groupFlight['cheapestGroup'] = array_search($groupFlight['cheapestPrice'], array_column($groupFlight['groups'], 'totalPrice'));

       return $groupFlight;
    }
}