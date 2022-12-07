<?php

namespace App\Http\Controllers\Package;

use App\Http\Controllers\Controller;
use Sauladam\ShipmentTracker\ShipmentTracker;
use Illuminate\Http\Request;

class TrackerController extends Controller
{

    public function index()
    {
        return view('test');
    }

    public function getInformation(Request $request)
    {
        $trackingNumber = $request->input('trackingNumber');
        $trackingResult = array();

        if (empty($trackingNumber)) return response()->json(['message' => 'Tracking Number is Empty!', "status" => false])->setStatusCode(400);

        foreach (preg_split("/((\r?\n)|(\r\n?))/", $trackingNumber) as $line) :

            $provider = ShipmentTracker::get('UPS');
            $upsTrack = $provider->track($line);
            $trackingResult[] = array('track_number' => $line, 'dataShipment' => $upsTrack->getAdditionalDetails('shipmentDetails'));

        endforeach;

        return response()->json(['message' => "Successfully get data!", "data" => $trackingResult, "status" => true])->setStatusCode(200);


    }
}
