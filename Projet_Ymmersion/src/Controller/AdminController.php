<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted(attribute:"IS_AUTHENTICATED_FULLY");

        /** @Var User $user */
        $user = $this->getUser();

        return $this->render("admin/index.html.twig");

    }
}