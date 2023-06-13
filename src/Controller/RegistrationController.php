<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{

    private $_em;
    private $_hasher;

    public function __construct(UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager){
        $this->_hasher=$userPasswordHasher;
        $this->_em=$entityManager;
    }
    #[Route('/register', name: 'app_register')]
    public function register(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $this->_hasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $this->_em->persist($user);
            $this->_em->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/_default-user-account", name="")
     */
    public function account(){

        try{
            $user=$this->_em->find(User::class,1);
        }
        catch(\Exception $e){

        }
    }
}
