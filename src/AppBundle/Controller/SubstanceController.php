<?php

namespace AppBundle\Controller;

use AppBundle\Entity\substances;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class SubstanceController extends Controller
{
  /**
  * @Route("/substance/create", name="substance_create")
  */

  //Create new substance
  public function createAction(Request $request)
  {
    $substance = new substances;

    //Generate Form for new Substance
    $form = $this->createFormBuilder($substance)
      ->add('name')
      ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('we', TextType::class, array('label'=> 'WE', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('vpressure', TextType::class, array('label'=> 'Prężność pary', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('envusage', EntityType::class, array('label'=> 'Korzystanie ze środowiska', 'class' => 'AppBundle:datalist\_env_usage', 'choice_label' => 'name'))
      ->add('druglike', EntityType::class, array('label'=> 'Prekursory narkotykowe', 'class' => 'AppBundle:datalist\_druglike', 'choice_label' => 'name'))
      ->add('kobize', EntityType::class, array('label'=> 'Kobize', 'class' => 'AppBundle:datalist\_kobize', 'choice_label' => 'name'))
      ->add('svhc', EntityType::class, array('label'=> 'SVHC', 'class' => 'AppBundle:datalist\_svhc', 'choice_label' => 'name'))
      ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
      ->getForm();

    //Take data from the form after clicking submit
    $form->handleRequest($request);

    //Validate that data are correct
    if($form->isSubmitted() && $form->isValid()){

      //assign data from the Form to variables
      $name = $form['name']->getData();
      $cas = $form['cas']->getData();
      $we = $form['we']->getData();
      $vpressure = $form['vpressure']->getData();
      $envusage = $form['envusage']->getData();
      $druglike = $form['druglike']->getData();
      $kobize = $form['kobize']->getData();
      $svhc = $form['svhc']->getData();

      //pass data from variables to substance object
      $substance->setName($name);
      $substance->setCas($cas);
      $substance->setWe($we);
      $substance->setVpressure($vpressure);
      $substance->setEnvUsage($envusage);
      $substance->setDruglike($druglike);
      $substance->setKobize($kobize);
      $substance->setKobize($svhc);

      //execute database insert
      $em = $this->getDoctrine()->getManager();
      $em->persist($substance);
      $em->flush();

      //success notification
      $this->addFlash(
        'notice',
        'Substancja dodana'
      );

      //return to list
      return $this->redirectToRoute('substance_list');
    }


    //if not submitted or not valid, displays form again
    return $this->render('substance/create.html.twig', array(
      'form' =>$form->createView()
    ));
  }

  /**
  * @Route("/substance", name="substance_list")
  */

  //List substances
  public function listAction()
  {
    //Gets all substances to the object substances
    $substances = $this->getDoctrine()
      ->getRepository('AppBundle:substances')
      ->findAll();
    //passess the substances object to the view
    return $this->render('substance/list.html.twig', array(
      'substances' => $substances

    ));
  }

  /**
  * @Route("/substance/details/{id}", name="substance_details")
  */

  //View substance details based on clicked button
  public function detailsAction($id)
  {
    //Takes the substance and passes to substance object
    $substance = $this->getDoctrine()
      ->getRepository('AppBundle:substances')
      ->find($id);
    //passess the object to the view
    return $this->render('substance/details.html.twig', array(
      'substance' => $substance

    ));
  }

  /**
  * @Route("/substance/edit/{id}")
  */

  //edit certain substance based on button clicked, passess the changes through request
  public function editAction($id, Request $request)
  {
    //Takes the substance and passes to substance object
    $substance = $this->getDoctrine()
      ->getRepository('AppBundle:substances')
      ->find($id);


      //Generate Form for new Substance
      $form = $this->createFormBuilder($substance)
        ->add('name')
        ->add('cas', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('we', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('vpressure', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('envusage', EntityType::class, array('label'=> 'Korzystanie ze środowiska', 'class' => 'AppBundle:datalist\_env_usage', 'choice_label' => 'name'))
        ->add('druglike', EntityType::class, array('label'=> 'Prekursory narkotykowe', 'class' => 'AppBundle:datalist\_druglike', 'choice_label' => 'name'))
        ->add('kobize', EntityType::class, array('label'=> 'Kobize', 'class' => 'AppBundle:datalist\_kobize', 'choice_label' => 'name'))
        ->add('svhc', EntityType::class, array('label'=> 'SVHC', 'class' => 'AppBundle:datalist\_svhc', 'choice_label' => 'name'))
        ->add('Save', SubmitType::class, array('label'=> 'Zapisz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

        //assign data from the Form to variables
        $name = $form['name']->getData();
        $cas = $form['cas']->getData();
        $we = $form['we']->getData();
        $vpressure = $form['vpressure']->getData();
        $envusage = $form['envusage']->getData();
        $druglike = $form['druglike']->getData();
        $kobize = $form['kobize']->getData();
        $svhc = $form['svhc']->getData();

        //find the right substance
        $em = $this->getDoctrine()->getManager();
        $substance = $em->getRepository('AppBundle:substances')->find($id);

        //prepare data modification
        $substance->setName($name);
        $substance->setCas($cas);
        $substance->setWe($we);
        $substance->setVpressure($vpressure);
        $substance->setEnvUsage($envusage);
        $substance->setDruglike($druglike);
        $substance->setKobize($kobize);
        $substance->setSvhc($svhc);


        //execute data modification
        $em->flush();

        //success notodication
        $this->addFlash(
          'notice',
          'Substancja zmieniona'
        );

        //return to list
        return $this->redirectToRoute('substance_list');
      }

    //if not submitted or not valid, displays form again
    return $this->render('substance/edit.html.twig', array(
      'substance' => $substance,
      'form' => $form->createView()
    ));
  }

  /**
  * @Route("/substance/delete/{id}")
  */

  //Delete chosen substance
  public function deleteAction($id)
  {
    //find the substance
    $em = $this->getDoctrine()->getManager();
    $substance = $em->getRepository('AppBundle:substances')->find($id);

    //prepare and execute delete command
    $em->remove($substance);
    $em->flush();

    //success notification
    $this->addFlash(
      'notice',
      'Substancja usunięta'
    );

    return $this->redirectToRoute('substance_list');
  }
}
