<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Location;

class SearchController extends Controller
{
    public function index(Request $request)
    {
		return view('search');
    }

    public function autocomplete(Request $request)
    {
    	$search = $request->search;
		$lat = $request->lat;
		$lon = $request->lon;
		$locations = Location::search($search);

		if ($lat && $lon) $locations = $locations->whereGeoDistance('geoPoint', [(double) $lon, (double) $lat], '1000m');
		$locations = $locations->select(['id', 'uCode', 'Address', 'area', 'city', 'latitude', 'longitude'])->get();

		return $this->prepareResponse($locations);
    }

    private function prepareResponse($locations)
    {
    	$response = [];
    	foreach ($locations as $location)
    	{
    		$response[] = [
    			'id' 	=> $location->id,
    			'label' => $location->Address,
    			'value' => $location->uCode
    		];
    	}
    	return $response;
    }
}
