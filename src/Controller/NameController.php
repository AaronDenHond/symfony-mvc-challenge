<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NameController extends AbstractController
{
    #[Route('/name', name: 'name')]
    
    public function index(): Response
    {
        return $this->render('name/index.html.twig', [
            'name' => 'test',
        ]);
    }
  /*   #[Route('/name', name: 'name')]
    
    public function changeName(): Response
    {
        return $this->render('learning/index.html.twig', [
            'name' => 'unknown',
        ]);
    } */


}
