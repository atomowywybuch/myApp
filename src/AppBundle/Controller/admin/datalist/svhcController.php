<?php

namespace AppBundle\Controller\admin\datalist;

use AppBundle\Entity\datalist\_svhc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class svhcController extends Controller
{
    /**
     * @Route("/admin/datalist/svhc", name="svhc_list")
     */

    public function indexAction()
    {
      //Gets all substances to the object substances
      $svhc = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_svhc')
        ->findAll();

      //passess the substances object to the view
      return $this->render('datalist/svhc/list.html.twig', array(
        'svhc' => $svhc

      ));
    }

    /**
    * @Route("/admin/datalist/svhc/create")
    */

    //Create new svhc

    public function createAction(Request $request)
    {
      $svhc = new _svhc;

      //Generate Form for new Substance
      $form = $this->createFormBuilder($svhc)
        ->add('name', TextType::class, array('label'=> 'Nazwa', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('we', TextType::class, array('label'=> 'WE', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('imp_date', DateType::class, array(
          'label'=> 'Implemenacja',
          'widget' => 'single_text',
          'html5' => false,
          'attr' =>array(
                    'class' => 'form-control js-datepicker',
                     'style' => 'margin-bottom:15px')
                   ))
        ->add('reason', TextType::class, array('label'=> 'Powód', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

      //Take data from the form after clicking submit
      $form->handleRequest($request);

      //Validate that data are correct
      if($form->isSubmitted() && $form->isValid()){

        //assign data from the Form to variables
        $svhcName = $form['name']->getData();
        $svhcCas = $form['cas']->getData();
        $svhcWe = $form['we']->getData();
        $svhcImDate = $form['imp_date']->getData();
        $svhcReason = $form['reason']->getData();

        //pass data from variables to substance object
        $svhc->setName($svhcName);
        $svhc->setCas($svhcCas);
        $svhc->setWe($svhcWe);
        $svhc->setImpDate($svhcImDate);
        $svhc->setReason($svhcReason);

        //execute database insert
        $em = $this->getDoctrine()->getManager();
        $em->persist($svhc);
        $em->flush();

        //success notification
        $this->addFlash(
          'notice',
          'SVHC dodany'
        );

        //return to list
        return $this->redirectToRoute('svhc_list');
      }


      //if not submitted or not valid, displays form again
      return $this->render('datalist/svhc/create.html.twig', array(
        'form' =>$form->createView()
      ));
    }

    /**
    * @Route("/admin/datalist/svhc/edit/{id}")
    */

    //edit certain substance based on button clicked, passess the changes through request
    public function editAction($id, Request $request)
    {
      //Takes the substance and passes to substance object
      $svhc = $this->getDoctrine()
        ->getRepository('AppBundle:datalist\_svhc')
        ->find($id);

      //Generate Form for new Substance
      $form = $this->createFormBuilder($svhc)
        ->add('name', TextType::class, array('label'=> 'Nazwa', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('cas', TextType::class, array('label'=> 'CAS', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('we', TextType::class, array('label'=> 'WE', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('imp_date', DateType::class, array(
          'label'=> 'Implemenacja',
          'widget' => 'single_text',
          'html5' => false,
          'attr' =>array(
                    'class' => 'form-control js-datepicker',
                     'style' => 'margin-bottom:15px')
                   ))
        ->add('reason', TextType::class, array('label'=> 'Powód', 'attr' =>array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Zapisz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

        //Take data from the form after clicking submit
        $form->handleRequest($request);

        //Validate that data are correct
        if($form->isSubmitted() && $form->isValid()){

          //assign data from the Form to variables
          $svhcName = $form['name']->getData();
          $svhcCas = $form['cas']->getData();
          $svhcWe = $form['we']->getData();
          $svhcImDate = $form['imp_date']->getData();
          $svhcReason = $form['reason']->getData();

          //pass data from variables to substance object
          $svhc->setName($svhcName);
          $svhc->setCas($svhcCas);
          $svhc->setWe($svhcWe);
          $svhc->setImpDate($svhcImDate);
          $svhc->setReason($svhcReason);

          //execute database insert
          $em = $this->getDoctrine()->getManager();
          $em->persist($svhc);
          $em->flush();

          //success notodication
          $this->addFlash(
            'notice',
            'svhc zmieniony'
          );

          //return to list
          return $this->redirectToRoute('svhc_list');
        }

      //if not submitted or not valid, displays form again
      return $this->render('datalist/svhc/edit.html.twig', array(
        'svhc' => $svhc,
        'form' => $form->createView()
      ));
    }

}
