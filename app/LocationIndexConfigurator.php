<?php

namespace App;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class LocationIndexConfigurator extends IndexConfigurator
{
    use Migratable;

    protected $name = 'location';

    /**
     * @var array
     */
    protected $settings = [
        //
    ];
}