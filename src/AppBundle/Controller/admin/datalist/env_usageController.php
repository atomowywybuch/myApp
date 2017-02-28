<?php

namespace AppBundle\Controller\admin\datalist;

use AppBundle\Entity\datalist\_env_usage;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class env_usageController extends Controller
{


  /**
  * @Route("/admin/datalist/envusage", name="envusage")
  */

  //List substances
  public function listAction()
  {
    //Gets all substances to the object substances
    $envusage = $this->getDoctrine()
      ->getRepository('AppBundle:datalist\_env_usage')
      ->findAll();
    //passess the substances object to the view
    return $this->render('datalist/env_usage/list.html.twig', array(
      'envusage' => $envusage

    ));
  }

  /**
  * @Route("/admin/datalist/envusage/create")
  */

  //Create new druglike
  public function createAction(Request $request)
  {
    $envusage = new _env_usage;



    //Generate Form for new Substance
    $form = $this->createFormBuilder($envusage)
      ->add('name')
      ->add('rateperkg', TextType::class, array('label'=> 'Stawka za kilogram w zł', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
      ->getForm();

    //Take data from the form after clicking submit
    $form->handleRequest($request);

    //Validate that data are correct
    if($form->isSubmitted() && $form->isValid()){

      $envusage = $form->getData();

      //execute database insert
      $em = $this->getDoctrine()->getManager();
      $em->persist($envusage);
      $em->flush();

      //success notification
      $this->addFlash(
        'notice',
        'ENV usage dodany'
      );

      //return to list
      return $this->redirectToRoute('envusage');
    }


    //if not submitted or not valid, displays form again
    return $this->render('datalist/env_usage/create.html.twig', array(
      'form' =>$form->createView()
    ));
  }

  /**
  * @Route("/admin/datalist/envusage/edit/{id}")
  */

  //edit certain substance based on button clicked, passess the changes through request
  public function editAction($id, Request $request)
  {
    //Takes the substance and passes to substance object
    $envusage = $this->getDoctrine()
      ->getRepository('AppBundle:datalist\_env_usage')
      ->find($id);


      //Generate Form for new Substance
      $form = $this->createFormBuilder($envusage)
        ->add('name')
        ->add('rateperkg', TextType::class, array('label'=> 'Stawka za kilogram w zł', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Zapisz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

        $envusage = $form->getData();

        //execute database insert
        $em = $this->getDoctrine()->getManager();
        $em->persist($envusage);
        $em->flush();

        //success notodication
        $this->addFlash(
          'notice',
          'envusage zmieniony'
        );

        //return to list
        return $this->redirectToRoute('envusage');
      }

    //if not submitted or not valid, displays form again
    return $this->render('datalist/env_usage/edit.html.twig', array(
      'envusage' => $envusage,
      'form' => $form->createView()
    ));
  }
}
