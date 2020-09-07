<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

     /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('about.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

     /**
     * @Route("/blog", name="blog")
     */
    public function blog()
    {
        return $this->render('blog.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

     /**
     * @Route("/cart", name="cart")
     */
    public function cart()
    {
        return $this->render('cart.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

     /**
     * @Route("/confirmation", name="confirmation")
     */
    public function confirmmation()
    {
        return $this->render('confirmation.html.twig');
    }

     /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('contact.html.twig');
    }
     /**
     * @Route("/cv", name="cv")
     */
    public function cv()
    {
        return $this->render('cv.html.twig');
    }
     /**
     * @Route("/walid", name="walid")
     */
    public function walid()
    {
        return $this->render('walid.html.twig');
    }
     /**
     * @Route("/cvv", name="cvv")
     */
    public function cvv()
    {
        return $this->render('cvv.html.twig');
    }
     /**
     * @Route("/head", name="head")
     */
    public function head()
    {
        return $this->render('head.html.twig');
    }

     /**
     * @Route("/login", name="connexion")
     */
    public function login()
    {
        return $this->render('login.html.twig');
    }
      /**
     * @Route("/login2", name="login")
     */
    public function login2()
    {
        return $this->render('login.html.twig');
    }
  /**
     * @Route("/base", name="base")
     */
    public function base()
    {
        return $this->render('base.html.twig');
    }

     /**
     * @Route("/main", name="main")
     */
    public function main()
    {
        return $this->render('main.html.twig');
    }

   
        /**
            * @Route("/connexio2n", name="security_login")
            * @return response
            */
           public function inscr(AuthenticationUtils $utils,Request $request,User $user = null , EntityManagerInterface $manager, 
           UserPasswordEncoderInterface $encoder)
           {
               $error = $utils ->getLastAuthenticationError();
              $username = $utils->getLastUsername();
            //  return $this->redirectToRoute('cogin_colorlib');
            $user= new User();
            $formU= $this ->createForm(RegistrationType::class , $user );
            $formU->handleRequest($request);
       
            if($formU->isSubmitted()&& $formU->isValid()){
                $hash=$encoder->encodePassword($user,$user->getPassword());
                $user->setPassword($hash);
                $this->addFlash('success',"votre compte a ete créé par succes ");
                $manager->persist($user);
                $manager->flush();
              
       }
                return $this->render('about.html.twig', [
                   'hasError' =>$error !== null,
                   'username' => $username,'formR'=>$formU->createView()
               ]);
           }  
       
           /**
            * @Route("/inscription", name="registration")
            */
           public function regn(Request $request, EntityManagerInterface $manager, 
           UserPasswordEncoderInterface $encoder) 
           {
               $user= new User();
               $form= $this ->createForm(RegistrationType::class , $user );
               $form->handleRequest($request);
       
       
       
               if($form->isSubmitted()&& $form->isValid()){
                   $hash=$encoder->encodePassword($user,$user->getPassword());
                   $user->setPassword($hash);
                   $this->addFlash('success',"votre compte a ete créé par succes ");
       
                   $manager->persist($user);
                   $manager->flush();
       
                 //  return $this->redirectToRoute('security_login');
               }
               return $this->render('inscription.html.twig',['formR'=>$form->createView() ]);
       
       
           } 
}
