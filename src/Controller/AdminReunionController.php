<?php

namespace App\Controller;

use App\Entity\Reunion;
use App\Form\Reunion1Type;
use App\Repository\ReunionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/secretaire/reunion")
 */
class AdminReunionController extends AbstractController
{
    /**
     * @Route("/", name="admin_reunion_index", methods={"GET"})
     */
    public function index(ReunionRepository $reunionRepository): Response
    {
        return $this->render('admin_reunion/index.html.twig', [
            'reunions' => $reunionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="admin_reunion_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reunion = new Reunion();
        $form = $this->createForm(Reunion1Type::class, $reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reunion);
            $entityManager->flush();

            return $this->redirectToRoute('admin_reunion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_reunion/new.html.twig', [
            'reunion' => $reunion,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_reunion_show", methods={"GET"})
     */
    public function show(Reunion $reunion): Response
    {
        return $this->render('admin_reunion/show.html.twig', [
            'reunion' => $reunion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="admin_reunion_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Reunion $reunion,
                         EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Reunion1Type::class, $reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_reunion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_reunion/edit.html.twig', [
            'reunion' => $reunion,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="admin_reunion_delete", methods={"POST"})
     */
    public function delete(Request $request, Reunion $reunion,
                           EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reunion->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reunion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_reunion_index', [], Response::HTTP_SEE_OTHER);
    }
}
