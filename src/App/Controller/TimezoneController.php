<?php

namespace App\Controller;

use App\Form\TimezoneFormType;
use App\Service\TimezoneService;
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

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            return $this->redirectToRoute('app_timezone_result', $formData);
        }

        return $this->render('timezone/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/timezone/result", name="app_timezone_result")
     */
    public function result(Request $request, TimezoneService $timezoneService): Response
    {
        $date = new \DateTime($request->get('date'));
        $timezone = $request->get('timezone');
    }
}
