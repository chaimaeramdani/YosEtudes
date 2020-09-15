<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ModelRepository;
use App\Entity\Model;



class CVController extends AbstractController
{
    /**
     * @Route("/cv", name="cv1")
     */
    public function index()
    {
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CVController',
        ]);
    }
    /**
     * @Route("/head", name="head")
     */
    public function head()
    {
        return $this->render('cv/head.html.twig');
    }
     /**
     * @Route("/cva", name="cva")
     */
    public function cva(ModelRepository $Modelrepo)
    {
        $models = $this->getDoctrine()->getRepository(Model::class)->findAll();
        return $this->render('cv/cva.html.twig', [
            'controller_name' => 'CVController',
            'model' => $models
        ]);
        return $this->render('cv/cva.html.twig');
    }
     /**
     * @Route("/cvv", name="cvv")
     */
    public function cvv()
    {
        return $this->render('cv/cvv.html.twig');
    }
    
   /**
     * @Route("/bama", name="bama")
     */
    public function bama()
    {
        return $this->render('cv/bama.html.twig');
    } 
}
