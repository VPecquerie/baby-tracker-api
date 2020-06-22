<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_users")
 */
class User extends BaseUser
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\ManyToMany(targetEntity=Baby::class, inversedBy="parents")
   */
  protected $babies;

  public function __construct()
  {
    parent::__construct();
    $this->babies = new ArrayCollection();
  }

  /**
   * @return Collection
   */
  public function getBabies(): Collection
  {
    return $this->babies;
  }

  /**
   * @param Collection $babies
   */
  public function setBabies(Collection $babies): void
  {
    $this->babies = $babies;
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id): void
  {
    $this->id = $id;
  }


}
