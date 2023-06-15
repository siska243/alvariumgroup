<?php

namespace App\Manager\Fixtures;
use App\Entity\Ville;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CityManager{

    public static function ADD(ObjectManager $obj,SluggerInterface $sluger):void
    {
        $cities=new Ville();
        $cities->setTitle('Paris');
        $cities->setZip('75000');
        $cities->setIsActive(true);
        $cities->setSlug(strtolower($sluger->slug($cities->getTitle())));
        $obj->persist($cities);

        $cities = new Ville();
        $cities->setTitle('Marseille');
        $cities->setZip('91000');
        $cities->setIsActive(true);
        $cities->setSlug(strtolower($sluger->slug($cities->getTitle())));
        $obj->persist($cities);

        $cities = new Ville();
        $cities->setTitle('Reims');
        $cities->setZip('91000');
        $cities->setIsActive(true);
        $cities->setSlug(strtolower($sluger->slug($cities->getTitle())));
        $obj->persist($cities);

    }
}
