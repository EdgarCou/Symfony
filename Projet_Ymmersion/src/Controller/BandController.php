<?php
namespace App\Controller;

use App\Entity\Group;
use App\Form\GroupType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GroupController extends AbstractController
{
    /**
     * @Route("/group/create", name="group_create")
     */
    public function create(Request $request): Response
    {
        $group = new Group();
        $form = $this->createForm(GroupType::class, $group);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($group);
            $entityManager->flush();

            return $this->redirectToRoute('group_list'); // Assuming you have a route to list groups
        }

        return $this->render('group/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/group/invite", name="group_invite")
     */
    public function invite(Request $request): Response
    {
        // Logic to invite a user to a group
    }

    /**
     * @Route("/group/accept", name="group_accept")
     */
    public function accept(Request $request): Response
    {
        // Logic to accept a group invitation
    }

    /**
     * @Route("/group/leave", name="group_leave")
     */
    public function leave(Request $request): Response
    {
        // Logic to leave a group
    }
}