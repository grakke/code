<?php


namespace Application\Services;

use Application\http\model\GoogleMaps;
use Application\http\model\User;

class GeolocationService
{
    private $_maps;

    public function __construct(GoogleMaps $maps)
    {
        $this->_maps = $maps;
    }

    public function locate(User $user)
    {
        $location = $user->location;
        if ($location === null) {
            $location = 'Milan';
        }
        $coordinates = $this->_maps->getLatitudeAndLongitude($location);
        $user->latitude = $coordinates['latitude'];
        $user->longitude = $coordinates['longitude'];
    }
}
