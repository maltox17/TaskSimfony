<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {   
        //Crear el formulario
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        //Vincular formulario con el objeto
        $form->handleRequest($request);

        //comprobar si elform se ha enviando
        if($form->isSubmitted() && $form->isvalid()){
            //Modificando el objeto para guardarlo
            $user->setRole('ROLE_USER');
            
            $user->setCreatedAt(new \DateTime('now'));
           
           //Cifrar la contrasena
           $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

           //Guardar usuario
           $em = $this->getDoctrine()->getManager();
           $em->persist($user);
           $em->flush();
           return $this->redirectToRoute('task');
        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function login(AuthenticationUtils $autenticationUtils){
        $error = $autenticationUtils->getLastAuthenticationError();

        $lastUsername = $autenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', array(
            'error' => $error,
            'last_username' => $lastUsername
        ));
    }
}
