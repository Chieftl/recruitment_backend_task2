<?php

namespace App\Controller;

use App\Form\TimezoneFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimezoneController extends AbstractController
{
    /**
     * @Route("/timezone", name="app_timezone_index")
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(TimezoneFormType::class);

        return $this->render('timezone/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
