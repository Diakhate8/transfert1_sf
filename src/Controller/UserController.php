<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/api")
 */
class UserController extends AbstractController
{ 
    /**
     * @Route("/user", name="user.show", methods={"Get"})
     */
    public function showUser(UserRepository $postRepo)
    {
        return $this->json($postRepo->findAll(), 200, [],['groups'=> 'post:read']);
    }
    // /**
    //  * @Route("/user", name="user.add", methods={"Post"})
    //  */
    // public function addUser(Request $request, SerializerInterface $serializer, 
    // EntityManagerInterface $em, ValidatorInterface $validator)
    // {             
    //     $jsonRecu = $request->getContent(); 
    //     //var_dump($jsonRecu);die();
    //     try{
    //         $user = $serializer->deserialize($jsonRecu, User::class, 'json');
    //         //var_dump($depot);die();
    //         //generate date auto            
    //         $depot->setCreatedAt(new \DateTime());

    //         $errors= $validator->validate($depot);
    //         if(count($errors) >0){
    //             return $this->json($errors, 400);
    //         }

    //         $em->persist($depot);
    //         $em->flush();

    //         return $this->json($depot, 201, [],["groups"={"post:read", "post:write"}]);
    //     }catch(notEncodableValueExeption $e){
    //         return $this->json([
    //         "status" => 400,
    //         "message" => $e->getMessage()
    //         ], 400);
    //     }

    // }
}

