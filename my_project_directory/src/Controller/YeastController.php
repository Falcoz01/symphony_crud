<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Yeast;
use App\Form\YeastType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class YeastController extends AbstractController
{
    #[Route('/yeast', name: 'app_yeast')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $yeasts = $entityManager->getRepository(Yeast::class)->findALL();


        return $this->render('yeast/show.html.twig', [
            'controller_name' => 'YeastController',
            'yeasts' => $yeasts
        ]);
    }


    #[Route('/yeast_create', name: 'app_yeast_create')]
public function create(EntityManagerInterface $entityManager , Request $request): Response
{
    $yeast = new Yeast();
    $form = $this->createForm(YeastType::class, $yeast);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) { 

        $entityManager->persist($yeast);

        $entityManager->flush();

        return $this->redirectToRoute('app_yeast');
        
         
    }

    return $this->render('yeast/create.html.twig', [
        'controller_name' => 'YeastController',
        'form' => $form
    ]);
}
}
