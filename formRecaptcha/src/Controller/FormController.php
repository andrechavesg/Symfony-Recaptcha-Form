<?php

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Created by PhpStorm.
 * User: Hefesto
 * Date: 2019-06-02
 * Time: 12:03
 */

class FormController extends AbstractController
{
    /**
     * @Route("/envia",methods={"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $nome = $request->get("nome");
        $assunto = $request->get("assunto");
        $email = $request->get("email");
        $conteudo = $request->get("conteudo");



        return $this->render("index.html.twig");
    }
}