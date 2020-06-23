<?php

namespace App\Entity;

use App\Repository\BabyRepository;
use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;
use \Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=BabyRepository::class)
 * @ORM\Table(name="babies")
 */
class Baby
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $firstname;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $lastname;

  /**
   * @ORM\Column(type="date", nullable=true)
   */
  protected $birthDate;

  /**
   * @ORM\ManyToMany(targetEntity=User::class, mappedBy="babies")
   */
  protected $parents;

  /**
   * @ORM\ManyToOne(targetEntity=Feed::class, inversedBy="baby")
   */
  protected $feeds;

  /**
   * @ORM\ManyToOne(targetEntity=Sleep::class, inversedBy="baby")
   */
  protected $sleeps;

  public function __construct()
  {
    $this->parents = new ArrayCollection();
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

  /**
   * @return mixed
   */
  public function getFirstname()
  {
    return $this->firstname;
  }

  /**
   * @param mixed $firstname
   */
  public function setFirstname($firstname): void
  {
    $this->firstname = $firstname;
  }

  /**
   * @return mixed
   */
  public function getBirthDate()
  {
    return $this->birthDate;
  }

  /**
   * @param mixed $birthDate
   */
  public function setBirthDate($birthDate): void
  {
    $this->birthDate = $birthDate;
  }

  /**
   * @return Collection
   */
  public function getParents(): Collection
  {
    return $this->parents;
  }

  /**
   * @param Collection $parents
   */
  public function setParents(Collection $parents): void
  {
    $this->parents = $parents;
  }

  /**
   * @return mixed
   */
  public function getFeeds()
  {
    return $this->feeds;
  }

  /**
   * @param mixed $feeds
   */
  public function setFeeds($feeds): void
  {
    $this->feeds = $feeds;
  }

  /**
   * @return mixed
   */
  public function getSleeps()
  {
    return $this->sleeps;
  }

  /**
   * @param mixed $sleeps
   */
  public function setSleeps($sleeps): void
  {
    $this->sleeps = $sleeps;
  }

  public function __toString()
  {
    return $this->firstname;
  }


}
