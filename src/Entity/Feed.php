<?php

namespace App\Entity;

use App\Repository\FeedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeedRepository::class)
 * @ORM\Table(name="feeds")
 */
class Feed
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * Many feeds have one baby. This is the owning side.
   * @ORM\ManyToOne(targetEntity=Baby::class, inversedBy="feeds")
   * @ORM\JoinColumn(name="baby_id", referencedColumnName="id")
   */
  protected $baby;

  /**
   * @ORM\Column(type="datetime")
   */
  private $start;

  /**
   * @ORM\Column(type="datetime")
   */
  private $finish;

  /**
   * @ORM\Column(type="integer")
   */
  private $quantity;

  /**
   * @ORM\Column(type="text", nullable=true)
   */
  private $comments;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getStart(): ?\DateTimeInterface
  {
      return $this->start;
  }

  public function setStart(\DateTimeInterface $start): self
  {
      $this->start = $start;

      return $this;
  }

  public function getFinish(): ?\DateTimeInterface
  {
      return $this->finish;
  }

  public function setFinish(\DateTimeInterface $finish): self
  {
      $this->finish = $finish;

      return $this;
  }

  public function getQuantity(): ?int
  {
      return $this->quantity;
  }

  public function setQuantity(int $quantity): self
  {
      $this->quantity = $quantity;

      return $this;
  }

  public function getComments(): ?string
  {
      return $this->comments;
  }

  public function setComments(?string $comments): self
  {
      $this->comments = $comments;

      return $this;
  }

  /**
   * @return mixed
   */
  public function getBaby()
  {
    return $this->baby;
  }

  /**
   * @param mixed $baby
   */
  public function setBaby($baby): void
  {
    $this->baby = $baby;
  }


}
