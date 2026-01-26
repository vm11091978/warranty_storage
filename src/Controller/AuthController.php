<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class AuthController extends AbstractController
{
    #[Route('/register', name: 'register', methods: 'GET')]
    public function register()
    {
        return $this->render('auth/register.html.twig');
    }
}
