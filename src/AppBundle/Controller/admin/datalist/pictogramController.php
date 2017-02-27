<?php

namespace AppBundle\Controller\admin\datalist;

use AppBundle\Entity\datalist\_pictograms;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class pictogramController extends Controller
{
    /**
     * @Route("/admin/datalist/pictograms", name="pictograms_list")
     */

    public function indexAction()
    {
      //Gets all substances to the object substances
      $picto = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_pictograms')
        ->findAll();

      //passess the substances object to the view
      return $this->render('datalist/pictograms/list.html.twig', array(
        'picto' => $picto

      ));
    }

    /**
    * @Route("/admin/datalist/pictograms/create")
    */

    //Create new pictograms

    public function createAction(Request $request)
    {
      $picto = new _pictograms;
      $now = new\DateTime('now');

      //Generate Form for new Substance
      $form = $this->createFormBuilder($picto)
        ->add('symbol', TextType::class, array('label'=> 'Symbol', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('description', TextType::class, array('label'=> 'description', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('imagefile', FileType::class, array('label'=> 'Plik', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

        //assign data from the Form to variables
        $pictoSymbol = $form['symbol']->getData();
        $pictoDescription = $form['description']->getData();
        $pictoImage = $form['imagefile']->getData();


        //pass data from variables to substance object
        $picto->setSymbol($pictoSymbol);
        $picto->setDescription($pictoDescription);
        $picto->setImageName($pictoImage);
        $picto->setUpdatedAt($now);


        //execute database insert
        $em = $this->getDoctrine()->getManager();
        $em->persist($picto);
        $em->flush();

        //success notification
        $this->addFlash(
          'notice',
          'picto dodany' 
        );

        //return to list
        return $this->redirectToRoute('pictograms_list');
      }


      //if not submitted or not valid, displays form again
      return $this->render('datalist/pictograms/create.html.twig', array(
        'form' =>$form->createView()
      ));
    }

    /**
    * @Route("/admin/datalist/pictograms/edit/{id}")
    */

    //Create new pictograms

    public function editAction($id, Request $request)
    {
      $picto = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_pictograms')
        ->find($id);
      $now = new\DateTime('now');

      //Generate Form for new Substance
      $form = $this->createFormBuilder($picto)
        ->add('symbol', TextType::class, array('label'=> 'Symbol', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('description', TextType::class, array('label'=> 'description', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('imagefile', FileType::class, array('label'=> 'Plik', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

        //assign data from the Form to variables
        $pictoSymbol = $form['symbol']->getData();
        $pictoDescription = $form['description']->getData();
        $pictoImage = $form['imagefile']->getData();


        //pass data from variables to substance object
        $picto->setSymbol($pictoSymbol);
        $picto->setDescription($pictoDescription);
        $picto->setImageName($pictoImage);
        $picto->setUpdatedAt($now);


        //execute database insert
        $em = $this->getDoctrine()->getManager();
        $em->persist($picto);
        $em->flush();

        //success notification
        $this->addFlash(
          'notice',
          'picto zmieniony'
        );

        //return to list
        return $this->redirectToRoute('pictograms_list');
      }


      //if not submitted or not valid, displays form again
      return $this->render('datalist/pictograms/create.html.twig', array(
        'form' =>$form->createView()
      ));
    }

    /**
    * @Route("/admin/datalist/pictograms/delete/{id}")
    */

    //Delete chosen substance
    public function deleteAction($id)
    {
      //find the substance
      $em = $this->getDoctrine()->getManager();
      $picto = $em->getRepository('AppBundle:datalist\_pictograms')->find($id);

      //prepare and execute delete command
      $em->remove($picto);
      $em->flush();

      //success notification
      $this->addFlash(
        'notice',
        'Picto usunięty'
      );

      return $this->redirectToRoute('pictograms_list');
    }




}
