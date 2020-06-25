<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{

  private $faker;

  public function __construct()
  {
    $this->faker = Faker\Factory::create('fr_FR');
  }

  /**
   * @inheritDoc
   */
  public function load(ObjectManager $manager)
  {
    $user = new \App\Entity\User();
    $user->setFirstname($this->faker->firstName);
    $user->setLastname($this->faker->lastName);
    $user->setEmail($this->faker->email);
    $user->setUsername($this->faker->userName);
    $manager->persist($user);
  }
}
