<?php

namespace App\DataFixtures;


use App\Entity\Tag;
use App\DataFixtures\BaseFixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany( 10, 'main_tags', function(int $i) {
            $tag = new Tag();
            $tag->setName($this->faker->realText(20));
            return $tag;
        });

        $manager->flush();
    }
}
