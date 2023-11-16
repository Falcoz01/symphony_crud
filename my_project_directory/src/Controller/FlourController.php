<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Flour;
use App\Form\FlourType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class FlourController extends AbstractController
{
    #[Route('/flour', name: 'app_flour')]
    public function show(EntityManagerInterface $entityManager): Response
    {
        $flours = $entityManager->getRepository(Flour::class)->findALL();

       
        return $this->render('flour/show.html.twig', [
            'controller_name' => 'FlourController',
            'flours' => $flours
        ]);
    }


#[Route('/flour_create', name: 'app_flour_create')]
public function create(EntityManagerInterface $entityManager , Request $request): Response
{
    $flour = new Flour();
    $form = $this->createForm(FlourType::class, $flour);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) { 

        $entityManager->persist($flour);

        $entityManager->flush();

        return $this->redirectToRoute('app_flour');
        
         
    }
    /*
    $flour->setType('T45');
    $flour->setRate(1);
    $flour->setUsage('patisserie et pate a pizza');
    $flour->setStock(10);

  
    */



    return $this->render('flour/create.html.twig', [
        'controller_name' => 'FlourController',
        'form' => $form
    ]);
}
}


