<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TP1Ex1Q1Controller extends AbstractController
{
    #[Route('/twig-date', name: 'twig_date')]
    public function dateTwig(): Response
    {
        $date = new \DateTime();

        return $this->render('tp1_ex1_q1/date.html.twig', [
            'date' => $date,
        ]);
    }
}
