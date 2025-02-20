<?php

namespace App\Controller;

use App\Entity\Invitation;
use App\Entity\User;
use App\Entity\Group;
use App\Repository\InvitationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvitationController extends AbstractController
{
    #[Route('/invite', name: 'send_invitation', methods: ['GET', 'POST'])]
    public function sendInvitation(Request $request, UserRepository $userRepository, InvitationRepository $invitationRepository, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $creator = $this->getUser();
            $username = $request->request->get('username');
            $userInvited = $userRepository->findOneBy(['username' => $username]);

            if (!$userInvited) {
                $this->addFlash('error', 'User not found');
                return $this->redirectToRoute('send_invitation');
            }

            $existingInvitation = $invitationRepository->findOneBy([
                'creator' => $creator,
                'userInvited' => $userInvited,
                'status' => false
            ]);

            if ($existingInvitation) {
                $this->addFlash('error', 'An invitation has already been sent to ' . $userInvited->getUsername());
                return $this->redirectToRoute('send_invitation');
            }

            $invitation = new Invitation();
            $invitation->setCreator($creator);
            $invitation->setUserInvited($userInvited);
            $invitation->setStatus(false);

            $entityManager->persist($invitation);
            $entityManager->flush();

            $this->addFlash('success', 'Invitation sent to ' . $userInvited->getUsername());
            return $this->redirectToRoute('send_invitation');
        }

        return $this->render('send.html.twig');
    }

    #[Route('/invitations', name: 'view_invitations', methods: ['GET'])]
    public function viewInvitations(InvitationRepository $invitationRepository): Response
    {
        $user = $this->getUser();
        $invitations = $invitationRepository->findBy(['userInvited' => $user, 'status' => false]);

        return $this->render('view.html.twig', [
            'invitations' => $invitations,
        ]);
    }

    #[Route('/invitation/{id}/accept', name: 'accept_invitation', methods: ['POST'])]
    public function acceptInvitation(Invitation $invitation, EntityManagerInterface $entityManager): Response
    {
        $invitation->acceptInvitation();
        $entityManager->flush();

        $group = $invitation->getCreator()->getGroup();
        if ($group !== null) {
            $this->addUserToGroup($invitation->getUserInvited(), $group, $entityManager);
        } else {
            $this->addFlash('error', 'Le créateur de l\'invitation n\'a pas de groupe.');
        }

        $entityManager->remove($invitation);
        $entityManager->flush();

        return $this->redirectToRoute('view_invitations');
    }

    #[Route('/invitation/{id}/decline', name: 'decline_invitation', methods: ['POST'])]
    public function declineInvitation(Invitation $invitation, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($invitation);
        $entityManager->flush();

        return $this->redirectToRoute('view_invitations');
    }

    private function addUserToGroup(User $user, Group $group, EntityManagerInterface $entityManager): void
    {
        $user->setGroup($group);
        $entityManager->flush();
    }
}