<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TP1Ex1Q1Controller extends AbstractController
{
    // Route GET pour afficher le formulaire
    #[Route('/tp1', name: 'tp1_formulaire', methods: ['GET'])]
    public function formulaire(): Response
    {
        return $this->render('tp1/index.html.twig');
    }

    // Route POST pour traiter les données
    #[Route('/tp1/bonjour', name: 'tp1_bonjour', methods: ['POST'])]
    public function bonjour(Request $request): Response
    {
        $prenom = $request->request->get('prenom');
        $nom = $request->request->get('nom');
        date_default_timezone_set('Europe/Paris');
        $date = new \DateTime();

        return $this->render('tp1/date.html.twig', [
            'prenom' => $prenom,
            'nom' => $nom,
            'date' => $date,
        ]);
    }
    #[Route('/tp1/but', name: 'tp1_but')]
    public function afficherBUT(): Response
{
    return $this->render('tp1/liste_but.html.twig');
}
}