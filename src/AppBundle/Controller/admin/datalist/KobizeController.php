<?php

namespace AppBundle\Controller\admin\datalist;

use AppBundle\Entity\datalist\_kobize;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class kobizeController extends Controller
{
    /**
     * @Route("/admin/datalist/kobize", name="kobize")
     */
     
    public function indexAction()
    {
      //Gets all substances to the object substances
      $kobize = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_kobize')
        ->findAll();

      //passess the substances object to the view
      return $this->render('datalist/kobize/list.html.twig', array(
        'kobize' => $kobize

      ));
    }

    /**
    * @Route("/admin/datalist/kobize/create")
    */

    //Create new kobize

    public function createAction(Request $request)
    {
      $kobize = new _kobize;

      //Generate Form for new Substance
      $form = $this->createFormBuilder($kobize)
        ->add('number', TextType::class, array('label'=> 'Numer', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('name', TextType::class, array('label'=> 'Nazwa', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

        //assign data from the Form to variables
        $kobizeNumber = $form['number']->getData();
        $kobizeName = $form['name']->getData();
        $kobizeCas = $form['cas']->getData();

        //pass data from variables to substance object
        $kobize->setNumber($kobizeNumber);
        $kobize->setName($kobizeName);
        $kobize->setcas($kobizeCas);

        //execute database insert
        $em = $this->getDoctrine()->getManager();
        $em->persist($kobize);
        $em->flush();

        //success notification
        $this->addFlash(
          'notice',
          'Kobize dodany'
        );

        //return to list
        return $this->redirectToRoute('kobize');
      }


      //if not submitted or not valid, displays form again
      return $this->render('datalist/kobize/create.html.twig', array(
        'form' =>$form->createView()
      ));
    }

    /**
    * @Route("/admin/datalist/kobize/edit/{id}")
    */

    //edit certain substance based on button clicked, passess the changes through request
    public function editAction($id, Request $request)
    {
      //Takes the substance and passes to substance object
      $kobize = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_kobize')
        ->find($id);

      //Generate Form for new Substance
        $form = $this->createFormBuilder($kobize)
          ->add('number', TextType::class, array('label'=> 'Numer', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
          ->add('name', TextType::class, array('label'=> 'Nazwa', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
          ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
          ->add('Save', SubmitType::class, array('label'=> 'Zapisz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
          ->getForm();

        //Take data from the form after clicking submit
        $form->handleRequest($request);

        //Validate that data are correct
        if($form->isSubmitted() && $form->isValid()){

          //assign data from the Form to variables
          $kobizeNumber = $form['number']->getData();
          $kobizeName = $form['name']->getData();
          $kobizeCas = $form['cas']->getData();

          //pass data from variables to substance object
          $kobize->setNumber($kobizeNumber);
          $kobize->setName($kobizeName);
          $kobize->setCas($kobizeCas);

          //execute database insert
          $em = $this->getDoctrine()->getManager();
          $em->persist($kobize);
          $em->flush();

          //success notodication
          $this->addFlash(
            'notice',
            'kobize zmieniony'
          );

          //return to list
          return $this->redirectToRoute('kobize');
        }

      //if not submitted or not valid, displays form again
      return $this->render('datalist/env_usage/edit.html.twig', array(
        'kobize' => $kobize,
        'form' => $form->createView()
      ));
    }

}
