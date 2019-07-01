<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/location', function(Request $request) {
	$search = $request->search;
	$lat = $request->lat;
	$lon = $request->lon;
	$locations = App\Location::search($search)->whereGeoDistance('geoPoint', [(double) $lon, (double) $lat], '1000m')->select(['id', 'uCode', 'Address', 'area', 'city', 'latitude', 'longitude'])->get()->toArray();
	foreach ($locations as $locaiton) {
		echo $locaiton['Address'] .'<br>';
	}
});
