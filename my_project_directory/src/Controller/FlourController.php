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

    return $this->render('flour/create.html.twig', [
        'controller_name' => 'FlourController',
        'form' => $form
    ]);
}
#[Route('/flour_delete/{id}', name: 'app_flour_delete')]
    public function delete(EntityManagerInterface $entityManager, int $id): Response
    {
        $flour = $entityManager->getRepository(Flour::class)->find($id);

        $entityManager->remove($flour);
        $entityManager->flush();

        return $this->redirectToRoute('app_flour');
        
    }

    #[Route('/flour_update/{id}', name: 'app_flour_update')]
    public function update(EntityManagerInterface $entityManager , Request $request, int $id): Response
    {
        $flour = $entityManager->getRepository(Flour::class)->find($id);

        $form = $this->createForm(FlourType::class, $flour);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 

            $entityManager->persist($flour);

            $entityManager->flush();

        return $this->redirectToRoute('app_flour');
        
         
    }
    return $this->render('flour/update.html.twig', [
        'controller_name' => 'FlourController',
        'form' => $form
    ]);
}
}


