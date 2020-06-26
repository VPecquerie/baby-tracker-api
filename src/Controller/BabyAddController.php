<?php

namespace App\Controller;

use App\Entity\Baby;
use App\Form\BabyType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BabyAddController extends AbstractController
{
  /**
   * @Route("/baby/add", name="baby_add")
   * @param Request $request
   * @return RedirectResponse|Response
   */
  public function index(Request $request)
  {

    $baby = new Baby();
    $form = $this->createForm(BabyType::class, $baby);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

      $em = $this->getDoctrine()->getManager();
      $baby = $form->getData();

      $baby->addParent($this->getUser());

      $em->persist($baby);
      $em->persist($this->getUser());
      $em->flush();
      return $this->redirectToRoute('dashboard');
    }
    return $this->render('baby/add/index.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
