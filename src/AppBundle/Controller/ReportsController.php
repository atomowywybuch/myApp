<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReportsController extends Controller
{
    /**
     * @Route("/reports", name="reports")
     */
    public function indexAction()
    {
        // replace this example code with whatever you need
        return $this->render('reports/reports.html.twig');
    }
}
