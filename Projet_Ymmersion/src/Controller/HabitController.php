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
        $habits = $em->getRepository(Habit::class)->findAll();

        return $this->render('habit/show.html.twig', [
            'habits' => $habits,
        ]);
    }

    #[Route('/habit/add', name: 'add_habit_form')]
    public function addHabit(Request $request, EntityManagerInterface $em): Response
    {
        $habit = new Habit();
        $form = $this->createForm(HabitType::class, $habit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $habit->setCreatedAt(new \DateTime());

            $em->persist($habit);
            $em->flush();

            return $this->redirectToRoute('show_habits');
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

        return $this->redirectToRoute('show_habits');
    }

    #[Route('/habit/delete/{id}', name: 'delete_habit', methods: ['POST'])]
    public function deleteHabit(int $id, EntityManagerInterface $em): Response
    {
        $habit = $em->getRepository(Habit::class)->find($id);
        if (!$habit) {
            throw $this->createNotFoundException('Habit not found');
        }

        $em->remove($habit);
        $em->flush();

        return $this->redirectToRoute('show_habits');
    }

}
