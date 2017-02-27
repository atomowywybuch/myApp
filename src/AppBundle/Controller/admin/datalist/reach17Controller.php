<?php

namespace AppBundle\Controller\admin\datalist;

use AppBundle\Entity\datalist\_reach17;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class reach17Controller extends Controller
{
    /**
     * @Route("/admin/datalist/reach17", name="reach17_list")
     */

    public function indexAction()
    {
      //Gets all substances to the object substances
      $reach17 = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_reach17')
        ->findAll();

      //passess the substances object to the view
      return $this->render('datalist/reach17/list.html.twig', array(
        'reach17' => $reach17

      ));
    }

    /**
    * @Route("/admin/datalist/reach17/create")
    */

    //Create new reach17

    public function createAction(Request $request)
    {
      $reach17 = new _reach17;

      //Generate Form for new Substance
      $form = $this->createFormBuilder($reach17)
        ->add('name', TextType::class, array('label'=> 'Nazwa', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('we', TextType::class, array('label'=> 'WE', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('conditions', TextType::class, array('label'=> 'Warunki', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

        //assign data from the Form to variables
        $reach17Name = $form['name']->getData();
        $reach17Cas = $form['cas']->getData();
        $reach17We = $form['we']->getData();
        $reach17Conditions = $form['conditions']->getData();

        //pass data from variables to substance object
        $reach17->setName($reach17Name);
        $reach17->setCas($reach17Cas);
        $reach17->setWe($reach17We);
        $reach17->setConditions($reach17Conditions);

        //execute database insert
        $em = $this->getDoctrine()->getManager();
        $em->persist($reach17);
        $em->flush();

        //success notification
        $this->addFlash(
          'notice',
          'reach17 dodany'
        );

        //return to list
        return $this->redirectToRoute('reach17_list');
      }


      //if not submitted or not valid, displays form again
      return $this->render('datalist/reach17/create.html.twig', array(
        'form' =>$form->createView()
      ));
    }

    /**
    * @Route("/admin/datalist/reach17/edit/{id}")
    */

    //edit certain substance based on button clicked, passess the changes through request
    public function editAction($id, Request $request)
    {
      //Takes the substance and passes to substance object
      $reach17 = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_reach17')
        ->find($id);

      //Generate Form for new Substance
      $form = $this->createFormBuilder($reach17)
        ->add('name', TextType::class, array('label'=> 'Nazwa', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('we', TextType::class, array('label'=> 'WE', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('conditions', TextType::class, array('label'=> 'Warunki', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Zapisz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

        //Take data from the form after clicking submit
        $form->handleRequest($request);

        //Validate that data are correct
        if($form->isSubmitted() && $form->isValid()){

          //assign data from the Form to variables
          $reach17Name = $form['name']->getData();
          $reach17Cas = $form['cas']->getData();
          $reach17We = $form['we']->getData();
          $reach17Conditions = $form['conditions']->getData();

          //pass data from variables to substance object
          $reach17->setName($reach17Name);
          $reach17->setCas($reach17Cas);
          $reach17->setWe($reach17We);
          $reach17->setConditions($reach17Conditions);

          //execute database insert
          $em = $this->getDoctrine()->getManager();
          $em->persist($reach17);
          $em->flush();

          //success notodication
          $this->addFlash(
            'notice',
            'reach17 zmieniony'
          );

          //return to list
          return $this->redirectToRoute('reach17_list');
        }

      //if not submitted or not valid, displays form again
      return $this->render('datalist/reach17/edit.html.twig', array(
        'reach17' => $reach17,
        'form' => $form->createView()
      ));
    }

}
