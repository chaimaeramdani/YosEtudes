<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\RegistrationType;



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
      * 
     * @Route("/login", name="account_login")
     * @return Response
     */
    public function login()
    {
        return $this->render('login.html.twig');
    }
    /**
      * 
     * @Route("/logout", name="account_logout")
     * @return Response
     */
    public function logout()
    {
    }
     
  /**
     * @Route("/base", name="base")
     */
    public function base()
    {
        return $this->render('base.html.twig');
    }

     /**
     * @Route("/admin/main", name="main")
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
                $manager->persist($user);
                $manager->flush();
              
       }
                return $this->render('about.html.twig', [
                   'hasError' =>$error !== null,
                   'username' => $username,'formR'=>$formU->createView()
               ]);
           }  
       
          
           
} 
