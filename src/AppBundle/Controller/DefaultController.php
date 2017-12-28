<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('Main/MainPage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/SignUp", name="SignUp")
     */
    public function SignUpAction(Request $request)
    {

        $user = new Users();
        $user->setUserName('');
        $user->setEmail('');
        $user->setPassword('');

        $form = $this->createFormBuilder($user)
            ->add('UserName', TextType::class)
            ->add('Email', TextType::class)
            ->add('Password', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create user'))
            /*->add('enter', SubmitType::class, array('label' => 'Enter'))*/
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $user = $form->getData();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('Form/SignUp.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/SignIn", name="SignIn")
     */
    public function SignInAction(Request $request)
    {
        $user = new Users();
        $user->setUserName('');
        $user->setPassword('');

        $form = $this->createFormBuilder($user)
            ->add('UserName', TextType::class)
            ->add('Password', TextType::class)
            ->add('enter', SubmitType::class, array('label' => 'Enter'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $form->getData();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('Form/SignIn.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/AdminMainPage", name="AdminMainPage")
     */
    public function AdminMainPageAction(Request $request)
    {
        return $this->render('Main/AdminMainPage.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/Rules", name="Rules")
     */
    public function RulesAction(Request $request)
    {
        return $this->render('Rules/Rules.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/Contacts", name="Contacts")
     */
    public function ContactsAction(Request $request)
    {
        return $this->render('Contacts/Contacts.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}

