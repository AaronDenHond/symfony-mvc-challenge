<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\RequestStack;


class LearningController extends AbstractController
{

    //setting up sessions with a built in RequestStack. Should be here right?


    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }


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

        $form = $this->createFormBuilder()
            ->add('name', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Change name'])
            ->getForm();

        //handy built in way to create a form. Nice thing is we can save it in a var $form and do all kinds of shizzle with it.


      
        $newName = 'unknown';
        /*  var_dump($session->get('name')); */

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $newName = $task['name'];
            $session = $this->requestStack->getSession();
            $session->set('name', $newName);
             return $this->redirectToRoute('changename', ['name' => $newName]); 
        }
        //let symfony autocomplete request, it will also import it as a use.
        


        //handy built in way to create a form. Nice thing is we can save it in a var $form and do all kinds of shizzle with it.
        
        return $this->render('homepage/index.html.twig', [
            'name' => $newName,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/changename', name: 'changename')]
    public function ChangeMyName(Request $request) : RedirectResponse
    {


       /*  $session = $this->requestStack->getSession(); */


        /*  $session->set('name', $newName)); */

        return $this->redirectToRoute('showname');
    }
}
