<?php

namespace AppBundle\Controller;

use AppBundle\Entity\substances;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class SubstanceController extends Controller
{
  /**
  * @Route("/substance/create", name="substance_create")
  */

  public function createAction(Request $request)
  {
    $substance = new substances;

    $form = $this->createFormBuilder($substance)
      ->add('name')
      ->add('cas', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('we', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('vpressure', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
      ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
      ->getForm();

    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()){
      $name = $form['name']->getData();
      $cas = $form['cas']->getData();
      $we = $form['we']->getData();
      $vpressure = $form['vpressure']->getData();

      $substance->setName($name);
      $substance->setCas($cas);
      $substance->setWe($we);
      $substance->setVpressure($vpressure);

      $em = $this->getDoctrine()->getManager();
      $em->persist($substance);
      $em->flush();

      $this->addFlash(
        'notice',
        'Substancja dodana'
      );

      return $this->redirectToRoute('substance_list');
    }



    return $this->render('substance/create.html.twig', array(
      'form' =>$form->createView()
    ));
  }

  /**
  * @Route("/substance", name="substance_list")
  */

  public function listAction()
  {
    $substances = $this->getDoctrine()
      ->getRepository('AppBundle:substances')
      ->findAll();

    return $this->render('substance/list.html.twig', array(
      'substances' => $substances

    ));
  }

  /**
  * @Route("/substance/details/{id}", name="substance_details")
  */

  public function detailsAction($id)
  {
    $substance = $this->getDoctrine()
      ->getRepository('AppBundle:substances')
      ->find($id);

    return $this->render('substance/details.html.twig', array(
      'substance' => $substance

    ));
  }

  /**
  * @Route("/substance/edit/{id}")
  */

  public function editAction($id, Request $request)
  {
    $substance = $this->getDoctrine()
      ->getRepository('AppBundle:substances')
      ->find($id);

      $substance->setName($substance->getName());
      $substance->setCas($substance->getCas());
      $substance->setWe($substance->getWe());
      $substance->setVpressure($substance->getVpressure());

      $form = $this->createFormBuilder($substance)
        ->add('name')
        ->add('cas', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('we', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('vpressure', TextType::class, array('attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Zapisz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()){
        $name = $form['name']->getData();
        $cas = $form['cas']->getData();
        $we = $form['we']->getData();
        $vpressure = $form['vpressure']->getData();

        $em = $this->getDoctrine()->getManager();
        $substance = $em->getRepository('AppBundle:substances')->find($id);

        $substance->setName($name);
        $substance->setCas($cas);
        $substance->setWe($we);
        $substance->setVpressure($vpressure);



        $em->flush();

        $this->addFlash(
          'notice',
          'Substancja zmieniona'
        );

        return $this->redirectToRoute('substance_list');
      }

    return $this->render('substance/edit.html.twig', array(
      'substance' => $substance,
      'form' => $form->createView()
    ));
  }

  /**
  * @Route("/substance/delete/{id}")
  */

  public function deleteAction($id)
  {
    $em = $this->getDoctrine()->getManager();
    $substance = $em->getRepository('AppBundle:substances')->find($id);

    $em->remove($substance);
    $em->flush();

    $this->addFlash(
      'notice',
      'Substancja usunięta'
    );

    return $this->redirectToRoute('substance_list');
  }
}
