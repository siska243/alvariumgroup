<?php

namespace App\DataFixtures;

use App\Manager\Fixtures\CityManager;
use Doctrine\Persistence\ObjectManager;
use App\Manager\Fixtures\DomaineManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Manager\Fixtures\TypeContratManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    private $_slugger;
    public function __construct(SluggerInterface $slugger){
        $this->_slugger=$slugger;
    }
    public function load(ObjectManager $manager): void
    {
        CityManager::ADD($manager,$this->_slugger);
        DomaineManager::ADD($manager);
        TypeContratManager::ADD($manager);
        $manager->flush();
    }
}
