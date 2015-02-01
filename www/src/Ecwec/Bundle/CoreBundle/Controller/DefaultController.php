<?php

namespace Ecwec\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecwec\Bundle\WeatherDataProviderBundle\Entity\Station;

class DefaultController extends Controller
{
    public function indexAction()
    {
        ini_set( "user_agent", "WX Dashboard (+https://github.com/ecwec/wx-dashboard)" );

        //@TODO make this a secure parameter
        $api_key = '';

        $tracked_stations = $this->getDoctrine()
            ->getRepository('WeatherDataProviderBundle:Station')
            ->findAll();

        $station_string_array = [];
        foreach ($tracked_stations as $station) {
            /** @var Station $station */
            $station_string_array[] = $station->getObjectId();
        }

        $get_stations = implode(',', $station_string_array);

        $json_url = "http://api.aprs.fi/api/get?name={$get_stations}&what=wx&apikey={$api_key}&format=json";
        $json = file_get_contents( $json_url, 0, null, null );
        $json_output = json_decode( $json, true);
        $stations_array = $json_output[ 'entries' ];

        $stations = [];

        foreach ($stations_array as $station) {

            $temp = ((9 / 5) * $station['temp']) + 32; // Convert celsius to fahrenheit.
            $stations[] = [
                'name' => $station['name'],
                'temp' => $temp
            ];
            ///var_dump($station['temp']);
        }

        return $this->render('CoreBundle::index.html.twig', array('stations' => $stations));
    }
}
