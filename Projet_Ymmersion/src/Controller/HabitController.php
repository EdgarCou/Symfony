<?php

namespace App\Controller;

use App\Entity\Habit;
use App\Form\HabitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitController extends AbstractController
{
    #[Route('/habits', name: 'show_habits')]
    public function showHabits(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $personalHabits = $em->getRepository(Habit::class)->findBy(['user' => $user, 'type' => 'personal']);

        return $this->render('habit/show.html.twig', [
            'personalHabits' => $personalHabits,
        ]);
    }

    #[Route('/habit/add', name: 'add_habit_form')]
    public function addHabit(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $group = $user->getGroup();

        $habit = new Habit();
        $isGroupCreator = $group && $group->getCreator() === $user;
        $form = $this->createForm(HabitType::class, $habit, [
            'is_group_creator' => $isGroupCreator,
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $habit->setCreatedAt(new \DateTime());
            $habit->setUser($user);

            if ($habit->getType() === 'group') {
                if ($isGroupCreator) {
                    $habit->setGroup($group);
                } else {
                    $this->addFlash('error', 'Only the group creator can add group habits.');
                    return $this->redirectToRoute('show_group_habits');
                }
            } else {
                $habit->setGroup(null); 
            }

            $em->persist($habit);
            $em->flush();

            if ($habit->getType() === 'group') {
                return $this->redirectToRoute('show_group_habits');
            } else {
                return $this->redirectToRoute('show_habits');
            }
        }

        return $this->render('habit/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/habit/toggle/{id}', name: 'toggle_habit', methods: ['POST'])]
    public function toggleHabit(int $id, EntityManagerInterface $em): Response
    {
        $habit = $em->getRepository(Habit::class)->find($id);
        if (!$habit) {
            throw $this->createNotFoundException('Habit not found');
        }

        $habit->setCompleted(!$habit->getCompleted());
        $em->flush();

        if ($habit->getType() === 'group') {
            return $this->redirectToRoute('show_group_habits');
        } else {
            return $this->redirectToRoute('show_habits');
        }
    }

    #[Route('/habit/delete/{id}', name: 'delete_habit', methods: ['POST'])]
    public function deleteHabit(int $id, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $habit = $em->getRepository(Habit::class)->find($id);
        if (!$habit) {
            throw $this->createNotFoundException('Habit not found');
        }

        if ($habit->getType() === 'group' && $habit->getGroup()->getCreator() !== $user) {
            throw $this->createAccessDeniedException('Only the group creator can delete group habits.');
        }

        $em->remove($habit);
        $em->flush();

        if ($habit->getType() === 'group') {
            return $this->redirectToRoute('show_group_habits');
        } else {
            return $this->redirectToRoute('show_habits');
        }
    }

    #[Route('/group/habits', name: 'show_group_habits')]
    public function showGroupHabits(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $group = $user->getGroup();

        if (!$group) {
            throw $this->createNotFoundException('You are not in a group.');
        }

        $groupHabits = $em->getRepository(Habit::class)->findBy(['group' => $group, 'type' => 'group']);

        return $this->render('habit/group_habits.html.twig', [
            'group' => $group,
            'groupHabits' => $groupHabits,
        ]);
    }
}
