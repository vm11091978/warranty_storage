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

    #[Route('/login', name: 'login', methods: 'GET')]
    public function login()
    {
        return $this->render('auth/login.html.twig');
    }
}
