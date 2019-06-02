<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Symfony\Component\Routing\Annotation\Route;

/**
 * Created by PhpStorm.
 * User: Hefesto
 * Date: 2019-06-02
 * Time: 12:03
 */

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render("index.html.twig");
    }
}