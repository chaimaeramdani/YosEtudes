<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioController extends AbstractController
{
    /**
     * @Route("/rezume", name="rezume")
     */
    public function rezume()
    {
        return $this->render('portfolio/rezume.html.twig', [
            'controller_name' => 'PortfolioController',
        ]);
    }

    /**
     * @Route("/cycle", name="cycle")
     */
    public function cycle()
    {
        return $this->render('portfolio/cycle.html.twig', [
            'controller_name' => 'PortfolioController',
        ]);
    }
}

