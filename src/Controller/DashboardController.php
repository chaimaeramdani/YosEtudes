<?php

namespace App\Controller;

use App\Entity\Model;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ModelRepository;
use App\Entity\Categorie;
use App\Entity\Image;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

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
    public function Model(Request $request,ModelRepository $Modelrepo ,EntityManagerInterface $manager)
    {
        if($request->request->get("titre")){
            dd($request);
            $Model = new Model();
            $Model = $Modelrepo->findOneBy([
                'id' => $request->request->get("id"),
            ]);
            $Model->setTitre($request->request->get("titre")) ;
            $Model->setDescription($request->request->get("description"));
             if($request->files->get('image') != null){
                $image = new Image();
                $images = $request->files->get('image');
                $file = md5(uniqid()).'.'.$images->getClientOriginalExtension();
                $images->move(
                    $this->getParameter('images_directory'),
                    $file
                );
                $image->setUrl('/ImageUploaded/'.$file);
                $Model->setImage($image);
            }
            $manager->persist($Model);
            $manager->flush();
        }
        $models = $this->getDoctrine()->getRepository(Model::class)->findAll();
        return $this->render('back-office/Model.html.twig', [
            'controller_name' => 'Model',
            'models' => $models
        ]);
    }

        /**
     * @Route("/model/{id}/delete", name="delete")
     */
    public function delete(Model $Model , EntityManagerInterface $manager)
    {
        $manager->remove($Model);
        $manager ->flush();
        return $this->redirectToRoute('Model');

    }
    //  /*
    //  /**
    //  * @Route("/model/{id}/edit", name="edit")
    //  */
    // public function edit(Model $Model , Request $request, EntityManagerInterface $manager)
    // {
    //     $form= $this -> createForm (ModelType::class ,$Model);
    //     $form->handleRequest($request);
    //     if($form->isSubmitted()&&$form->isValid()){
    //         $manager->persist($Model);
    //     $manager ->flush();}
    //     return $this->render('model/edit.html.twig',[
    //         'model'=>$Model ->createView()
    //     ] );

    // }
  
}
