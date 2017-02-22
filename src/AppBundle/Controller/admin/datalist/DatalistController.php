<?php

namespace AppBundle\Controller\admin\datalist;

use AppBundle\Entity\buty;
use AppBundle\Entity\datalists\colors;
use AppBundle\Entity\rozmiary;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class DatalistController extends Controller
{


  /**
  * @Route("/admin/datalist", name="listy")
  */

  //List substances
  public function listAction()
  {

    return $this->render('datalist/list.html.twig');
  }

  /**
  * @Route("/buty/create")
  */
  /*
  //Create new but
  public function createAction(Request $request)
  {
    $but = new buty;
    $kolor = new colors;
    $rozmiar = new rozmiary;

    //Generate Form for new Substance
    $form = $this->createFormBuilder($but)
      ->add('but')
      ->add('kolor', EntityType::class, array('class' => 'AppBundle:datalists\colors', 'choice_label' => 'kolor'))

      ->add('rozmiar', EntityType::class, array('class' => 'AppBundle:rozmiary', 'choice_label' => 'rozmiar'))
      ->add('Save', SubmitType::class, array('label'=> 'Stwórz', 'attr' =>array('class' => 'btn-primary', 'style' => 'margin-bottom:15px')))
      ->getForm();

    //Take data from the form after clicking submit
    $form->handleRequest($request);

    //Validate that data are correct
    if($form->isSubmitted() && $form->isValid()){

      //assign data from the Form to variables
      $butname = $form['but']->getData();
      $butkolor = $form['kolor']->getData();
      $butrozmiar = $form['rozmiar']->getData();

      //pass data from variables to substance object
      $but->setBut($butname);
      $but->setKolor($butkolor);
      $but->setRozmiar($butrozmiar);


      //execute database insert
      $em = $this->getDoctrine()->getManager();
      $em->persist($but);
      $em->flush();

      //success notification
      $this->addFlash(
        'notice',
        'But dodany'
      );

      //return to list
      return $this->redirectToRoute('lista_butow');
    }


    //if not submitted or not valid, displays form again
    return $this->render('default/create.html.twig', array(
      'form' =>$form->createView()
    ));
  }
*/

}
