<?php

namespace App\Manager\Fixtures;

use App\Entity\TypeContrat;
use Doctrine\Persistence\ObjectManager;


class TypeContratManager
{

    public static function ADD(ObjectManager $obj): void
    {
        $contrat = new TypeContrat();
        $contrat->setTitle('CDI');
        $obj->persist($contrat);


        $contrat = new TypeContrat();
        $contrat->setTitle('CDD');
        $obj->persist($contrat);

        $contrat = new TypeContrat();
        $contrat->setTitle('Stage');
        $obj->persist($contrat);

        $obj->persist($contrat);
    }
}
