<?php

namespace AppBundle\Controller\admin\datalist;


use AppBundle\Entity\datalist\_druglike;
use AppBundle\Entity\datalist\_druglike_category;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class druglikeController extends Controller
{


  /**
  * @Route("/admin/datalist/druglike", name="lista_prekursorow")
  */

  //List substances
  public function listAction()
  {
    //Gets all substances to the object substances
    $druglike = $this->getDoctrine()
      ->getRepository('AppBundle:datalist\_druglike')
      ->findAll();
    //passess the substances object to the view
    return $this->render('datalist/druglike/list.html.twig', array(
      'druglike' => $druglike

    ));
  }

  /**
  * @Route("/admin/datalist/druglike/create")
  */

  //Create new druglike
  public function createAction(Request $request)
  {
    $druglike = new _druglike;
    $category = new _druglike_category;


    //Generate Form for new Substance
    $form = $this->createFormBuilder($druglike)
      ->add('name')
      ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('category', EntityType::class, array('class' => 'AppBundle:datalist\_druglike_category', 'choice_label' => 'name'))
      ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
      ->getForm();

    //Take data from the form after clicking submit
    $form->handleRequest($request);

    //Validate that data are correct
    if($form->isSubmitted() && $form->isValid()){

      $druglike = $form->getData();

      //execute database insert
      $em = $this->getDoctrine()->getManager();
      $em->persist($druglike);
      $em->flush();

      //success notification
      $this->addFlash(
        'notice',
        'Prekursor dodany'
      );

      //return to list
      return $this->redirectToRoute('lista_prekursorow');
    }


    //if not submitted or not valid, displays form again
    return $this->render('datalist/druglike/create.html.twig', array(
      'form' =>$form->createView()
    ));
  }

  /**
  * @Route("/admin/datalist/druglike/edit/{id}")
  */

  //edit certain substance based on button clicked, passess the changes through request
  public function editAction($id, Request $request)
  {
    //Takes the substance and passes to substance object
    $druglike = $this->getDoctrine()
      ->getRepository('AppBundle:datalist\_druglike')
      ->find($id);


      //Generate Form for new Substance
      $form = $this->createFormBuilder($druglike)
        ->add('name')
        ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('category', EntityType::class, array('class' => 'AppBundle:datalist\_druglike_category', 'choice_label' => 'name'))
        ->add('Save', SubmitType::class, array('label'=> 'Zapisz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

      //pass data from variables to substance object
        $druglike = $form->getData();
      //execute database insert
        $em = $this->getDoctrine()->getManager();
        $em->persist($druglike);
        $em->flush();

        //success notodication
        $this->addFlash(
          'notice',
          'Prekursor zmieniony'
        );

        //return to list
        return $this->redirectToRoute('lista_prekursorow');
      }

    //if not submitted or not valid, displays form again
    return $this->render('datalist/druglike/edit.html.twig', array(
      'druglike' => $druglike,
      'form' => $form->createView()
    ));
  }
}
