<?php

namespace App\Manager\Fixtures;

use App\Entity\Domaine;
use Doctrine\Persistence\ObjectManager;


class DomaineManager
{

    public static function ADD(ObjectManager $obj): void
    {
        $domaine = new Domaine();
        $domaine->setTitle('Informatique');
        $obj->persist($domaine);

        $domaine = new Domaine();
        $domaine->setTitle('Comptabilité');
        $obj->persist($domaine);

        $domaine = new Domaine();
        $domaine->setTitle('Chimie');
        $obj->persist($domaine);
    }
}
