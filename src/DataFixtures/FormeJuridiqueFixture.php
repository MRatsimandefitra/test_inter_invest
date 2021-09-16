<?php 
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\FormeJuridique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class FormeJuridiqueFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $file = dirname(__FILE__)."/datas/forme_juridique.csv";
        $decoder = new Serializer([new ObjectNormalizer()], [new CsvEncoder()]);
        $rows = $decoder->decode(file_get_contents($file), 'csv');

        foreach($rows as $row) {

            $formeJuridique = new FormeJuridique();
            $formeJuridique->setLibelle($row['libelle']);
            $manager->persist($formeJuridique);
        }

        $manager->flush();
    }
}