<?php

namespace App\Controller;

use App\Entity\Group;
use App\Form\GroupType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupController extends AbstractController
{
    #[Route('/group/new', name: 'group_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();

        if ($user->getGroup() !== null) {
            $this->addFlash('error', 'Vous êtes déjà dans un groupe et ne pouvez pas en créer un nouveau.');
            return $this->redirectToRoute('group_list');
        }

        $group = new Group();
        $form = $this->createForm(GroupType::class, $group);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $group->setCreator($user);
            $group->setScore(0);

            $entityManager->persist($group);
            $entityManager->flush();

            $user->setGroup($group);
            $entityManager->persist($user);
            $entityManager->flush();


            return $this->redirectToRoute('app_admin');
        }

        return $this->render('newgroup.html.twig', [
            'groupForm' => $form->createView(),
        ]);
    }

    #[Route('/group', name: 'group_list')]
    public function list(EntityManagerInterface $entityManager): Response
    {
        $groups = $entityManager->getRepository(Group::class)->findAll();

        return $this->render('list.html.twig', [
            'groups' => $groups,
        ]);
    }


    #[Route('/group/leave', name: 'leave_group', methods: ['POST'])]
    public function leaveGroup(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $user->setGroup(null);
        $em->flush();

        return $this->redirectToRoute('app_admin');
    }
}