<?php


namespace Ecwec\Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ecwec\Bundle\WeatherDataProviderBundle\Entity\Station;

class LoadStationData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $station = new Station();
        $station->setObjectId('WIWIWXOMR');
        $station->setName('WIWIWXOMR');
        $station->setDescription('WIWIWXOMR');
        $station->setLatitude(44.045);
        $station->setLongitude(-88.704);
        $manager->persist($station);

        $station = new Station();
        $station->setObjectId('WIWIWXERK');
        $station->setName('WIWIWXERK');
        $station->setDescription('WIWIWXERK');
        $station->setLatitude(44.004);
        $station->setLongitude(-88.842);
        $manager->persist($station);

        $station = new Station();
        $station->setObjectId('WIWIWXWLF');
        $station->setName('WIWIWXWLF');
        $station->setDescription('WIWIWXWLF');
        $station->setLatitude(44.213);
        $station->setLongitude(-88.846);
        $manager->persist($station);

        $manager->flush();
    }
}
 