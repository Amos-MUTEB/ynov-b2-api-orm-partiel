<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Style;
use App\Entity\Album;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');
        $albums = [];
        $styles = [];

        for ($i = 0; $i < 20; $i++) {
            $album = new Album();
            $album->setName($faker->word())
                  ->setCreated($faker->dateTime('2020-04-16 16:08:17'));

            $manager->persist($album);
            $albums[] = $album;
        }

        for ($j = 0; $j < 70; $j++) {
            $artist = new Artist();
            $artist->setName($faker->words(4, true))
                ->setCreated($faker->dateTime('2020-04-16 16:08:17'))
                ->setAlbums($albums[$faker->numberBetween(0, count($albums) - 1)]);
                
            $manager->persist($artist);
        }
        for ($j = 0; $j < 20; $j++) {
            $artist = new Style();
            $artist->setName($faker->words(4, true))
                ->setCreated($faker->dateTime('2020-04-16 16:08:17'));
            
            $manager->persist($artist);
        }
        $user = new User();
          $user->setEmail('amos@partiel.com')
            ->setPassword($this->encoder->encodePassword($user, 'Azerty123'));
        

        $manager->flush();
    }
}
