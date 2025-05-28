<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Entity\Note;

use Symfony\Component\Security\Http\Attribute\IsGranted;

final class DashboardController extends AbstractController
{
	#[IsGranted('ROLE_USER')]
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
#[IsGranted('ROLE_USER')]
#[Route('/dashboardExemple', name: 'app_dashboard_exemple')]
public function dashboardExemple(): Response
{
    return $this->render('dashboard/exemple.html.twig', [
        'controller_name' => 'DashboardController',
    ]);
}

// Admin : démonstration de 3 critères
#[IsGranted('ROLE_ADMIN')]
#[Route('/dashboardAdmin', name: 'app_dashboard_admin')]
public function dashboardAdmin(EntityManagerInterface $em): Response
{
    $user = $this->getUser();

    // Critère 1 : Notes "En cours"
    $notesEnCours = $em->createQueryBuilder()
        ->select('n')
        ->from(Note::class, 'n')
        ->join('n.etat', 'e')
        ->where('e.nom = :etat')
        ->setParameter('etat', 'En cours')
        ->getQuery()
        ->getResult();

    // Critère 2 : Notes taguées "Urgent"
    $notesUrgentes = $em->createQueryBuilder()
        ->select('n')
        ->from(Note::class, 'n')
        ->join('n.tag', 't')
        ->where('t.nom = :tag')
        ->setParameter('tag', 'Urgent')
        ->getQuery()
        ->getResult();

    // Critère 3 : Notes de l'utilisateur connecté
    $notesUtilisateur = $em->getRepository(Note::class)->findBy(['user' => $user]);

    return $this->render('dashboard/admin.html.twig', [
        'notes_en_cours' => $notesEnCours,
        'notes_urgentes' => $notesUrgentes,
        'notes_utilisateur' => $notesUtilisateur,
    ]);
}
}
