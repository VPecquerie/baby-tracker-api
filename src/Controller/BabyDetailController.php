<?php

namespace App\Controller;

use App\Entity\Baby;
use App\Form\BabyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BabyDetailController extends AbstractController
{
  /**
   * @Route("/baby/detail/{id}", name="baby_detail")
   * @param Baby $baby
   * @return Response
   */
  public function index(Baby $baby)
  {
    return $this->render('baby/detail/index.html.twig', [
      'baby' => $baby
    ]);
  }
}
