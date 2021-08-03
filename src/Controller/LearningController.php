<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LearningController extends AbstractController
{
    #[Route('/learning', name: 'learning')]
    public function index(): Response
    {


        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    #[Route('/aboutme', name: 'aboutme')]
    public function AboutMe(): Response
    {


        return $this->render('aboutme/index.html.twig', [
            'controller_name' => 'aboutme',
        ]);
    }

    #[Route('/', name: 'showname')]
    public function ShowMyName(Request $request): Response
    {

        //let symfony autocomplete request, it will also import it as a use.
        $RequestName = $request->query->get('name');

        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Change name'])
            ->getForm();
         //handy built in way to create a form. Nice thing is we can save it in a var $form and do all kinds of shizzle with it.

        return $this->render('homepage/index.html.twig', [
            'name' => 'unknown', 'lastName' => 'Unknower', 'form' => $form->createView(),
        ]);
    }

    #[Route('/changename', name: 'changename')]
    public function ChangeMyName()
    {
    }
}
