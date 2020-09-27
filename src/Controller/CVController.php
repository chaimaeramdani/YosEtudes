<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ModelRepository;
use App\Entity\Model;
use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RegistrationType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CVController extends AbstractController
{

    /**
    * @Route("/login", name="registration")
    *@return Response
    */
    public function regsn(AuthenticationUtils $authenticationUtils,Request $request, EntityManagerInterface $manager ,UserPasswordEncoderInterface $encoder ) 
    {
        
        $client= new Client();
        $form= $this ->createForm(RegistrationType::class,$client);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $hash = $encoder->encodePassword($client , $client->getPassword());
            $client->setPassword($hash);
            $manager->persist($client);
            $manager->flush();
            return $this->redirectToRoute('registration');
        }
// get the login error if there is one
$error = $authenticationUtils->getLastAuthenticationError();

// last username entered by the user
$lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
            'form'=>$form->createView()
        ]);
    } 

    /**
    * @Route("/Connect", name="Connect")
    *
    */
    public function Cnx() 
    {
        return $this->render('login.html.twig', [ 
        ]);
    } 



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
