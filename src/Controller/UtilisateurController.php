<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('api/utilisateur', name: 'app_api_utilisateur_')]
class UtilisateurController extends AbstractController
{
    public function __construct(private EntityManagerInterface $manager, private UtilisateurRepository $repository)
    {
    }

    #[Route(name: 'new', methods: 'POST')]
    public function new(Request $request): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $Utilisateur = new Utilisateur();
        $Utilisateur->setNom($parameters['nom']);
        $Utilisateur->setPrenom($parameters['prenom']);
        $Utilisateur->setEmail($parameters['email']);
        $Utilisateur->setPassword($parameters['password']);
        $Utilisateur->setPseudo($parameters['pseudo']);
        $Utilisateur->setDateNaissance($parameters['date_naissance']);
        $Utilisateur->setAdresse($parameters['adresse']);
        $Utilisateur->setTelephone($parameters['telephone']);

        $this->manager->persist($Utilisateur);
        $this->manager->flush();

        return $this->json(
            ['message' => "Utilisateur resource created with {$Utilisateur->getId()} id"],
            Response::HTTP_CREATED,
        );
    }

    #[Route('/{id}', name: 'show', methods: 'GET')]
    public function show(int $id): Response
    {
        $Utilisateur = $this->repository->findOneby(['id' => $id]);

        if (!$Utilisateur) {
            throw new \Exception("No Utilisateur found for {$id} id");
        }
        return $this->json(['message' => "Utilisateur found : {$Utilisateur->getNom()} for {$Utilisateur->getId()} id"]
        );
    }

    #[Route('/{id}', name: 'edit', methods: 'PUT')]
    public function edit(int $id): Response
    {
        $Utilisateur = $this->repository->findOneby(['id' => $id]);

        if (!$Utilisateur) {
            throw new \Exception("No Utilisateur found for {$id} id");
        }

        $Utilisateur->setNom('Utilisateur name updated');

        $this->manager->flush();

        return $this->json(['message' => "Utilisateur found : {$Utilisateur->getNom()} for {$Utilisateur->getId()} id"]
        );
    }

    #[Route('/{id}', name: 'delete', methods: 'DELETE')]
    public function delete(int $id): Response
    {
        $Utilisateur = $this->repository->findOneby(['id' => $id]);

        if (!$Utilisateur) {
            throw new \Exception("No Utilisateur found for {$id} id");
        }

        $this->manager->remove($Utilisateur);
        $this->manager->flush();

        return $this->json(['message' => 'Utilisateur resource deleted'], Response::HTTP_NO_CONTENT);
    }
}
