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
        $station->setObjectId('AJ4NR');
        $station->setName('AJ4NR');
        $station->setDescription('AJ4NR');
        $manager->persist($station);

        $station = new Station();
        $station->setObjectId('EW3427');
        $station->setName('EW3427');
        $station->setDescription('EW3427');
        $manager->persist($station);

        $manager->flush();
    }
}
 