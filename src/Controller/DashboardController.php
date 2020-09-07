<?php

namespace App\Controller;

use App\Entity\Model;
use App\Repository\ModelRepository;
use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index()
    {
        return $this->render('back-office/dashabord.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    /**
     * @Route("/Model", name="Model")
     */
    public function Model()
    {
        $models = $this->getDoctrine()->getRepository(Model::class)->findAll();
        return $this->render('back-office/Model.html.twig', [
            'controller_name' => 'Model',
            'models' => $models
        ]);
    }
}
