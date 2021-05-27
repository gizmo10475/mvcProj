<?php

namespace App\Controller;

use App\Entity\Histogram;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistogramController extends AbstractController
{

    /**
     * @Route("/histogram")
     */
    public function start(): Response
    {

        $histogram = $this->getDoctrine()->getRepository(Histogram::class)->findAll();

        return $this->render('histogram.html.twig', [
            'histogram' => $histogram,
        ]);
    }
}
