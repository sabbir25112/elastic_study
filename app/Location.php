<?php

namespace App;

use ScoutElastic\Searchable;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use Searchable;

    protected $table = 'places_elastic';
    protected $guarded = ['id'];

    protected $casts = [ 'geoPoint' => 'array' ];

    /**
     * @var string
     */
    protected $indexConfigurator = LocationIndexConfigurator::class;

    /**
     * @var array
     */
    protected $searchRules = [
        //
    ];

    /**
     * @var array
     */
    protected $mapping = [
        "properties" => [
            'id' => ['type' => 'integer'],
            'longitude' => ['type' => 'double'],
            'latitude' => ['type' => 'double'],
            'geoPoint' => ['type' => 'geo_point'],
            'Address' => ['type' => 'text'],
            'city' => ['type' => 'keyword'],
            'area' => ['type' => 'keyword'],
            'postCode' => ['type' => 'keyword'],
            'pType' => ['type' => 'keyword'],
            'subType' => ['type' => 'keyword'],
            'flag' => ['type' => 'integer'],
            'device_ID' => ['type' => 'keyword'],
            'uCode' => ['type' => 'keyword'],
            'email' => ['type' => 'text'],
            'user_id' => ['type' => 'integer'],
            'isRewarded' => ['type' => 'integer'],
            'route_description' => ['type' => 'text'],
            'contact_person_name' => ['type' => 'text'],
            'contact_person_phone' => ['type' => 'text'],
            // 'created_at' => ['type' => 'date', 'format' => 'yyyy-MM-DD HH:mm:ss', 'ignore_malformed' => true],
            // 'updated_at' => ['type' => 'date', 'format' => 'yyyy-MM-DD HH:mm:ss', 'ignore_malformed' => true],
            'road_details' => ['type' => 'text'],
            'number_of_floors' => ['type' => 'integer'],
            'tags' => ['type' => 'text']
        ]
    ];

    public function searchableAs()
    {
        return 'location';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        unset($array['created_at']);
        unset($array['updated_at']);

        return $array;
    }
}