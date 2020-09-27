<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminAccountController extends AbstractController
{
    /**
     * @Route("/admin/login", name="admin_account_login")
     */
    public function index()
    {
        return $this->render('back-office/login_admin.html.twig', [
            'controller_name' => 'AdminAccountController',
        ]);
    }
}
