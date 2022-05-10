<?php

namespace App\Controller;

use App\Entity\Action;
use App\Entity\Maraude;
use App\Entity\Personne;
use App\Form\MaraudeType;
use App\Repository\ActionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class ActionController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: "GET")]
    public function index(ActionRepository $actionRepository): Response
    {
        $actions = $actionRepository->findBy([], ['createdAt' => 'DESC']);

        return $this->render('action/index.html.twig', compact('actions'));
    }

    #[Route('/action/create', name: 'app_action_create', methods: "GET|POST")]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $maraude = new Maraude;

        $form = $this->createForm(MaraudeType::class, $maraude);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // $data = $form->getData();
            // $maraude = new Maraude;
            // $maraude->setAdresseMaraude($data['adresseMaraude']);
            // $maraude->setCodePostalMaraude($data['codePostalMaraude']);
            // $maraude->setVilleMaraude($data['villeMaraude']);
            // $maraude->setDateMaraude($data['dateMaraude']);
            // $maraude->setHeureMaraude($data['heureMaraude']);
            // \dd($maraude);

            $em->persist($maraude);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('action/create.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    #[Route('/action/{id<[0-9]+>}', name: 'app_action_show', methods: "GET")]
    public function show(action $action): Response
    {
        return $this->render('action/show.html.twig', compact('action'));
    }

    #[Route('/action/{id<[0-9]+/edit>}', name: 'app_action_edit', methods: "GET|PUT")]
    public function edit(Request $request, EntityManagerInterface $em, Maraude $maraude): Response
    {
        $form = $this->createForm(MaraudeType::class, $maraude, [
            'method' => 'PUT'
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('action/edit.html.twig', [
            'myForm' => $form->createView()
        ]);
    }

    #[Route('/action/{id<[0-9]+/delete>}', name: 'app_action_delete', methods: "DELETE")]
    public function delete(EntityManagerInterface $em, Maraude $maraude)
    {
        $em->remove($maraude);
        $em->flush();

        return $this->redirectToRoute('app_home');
    }
}
