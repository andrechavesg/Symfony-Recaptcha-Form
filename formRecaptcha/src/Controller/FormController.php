<?php
namespace App\Controller;

use ReCaptcha\ReCaptcha;
use Swift_Mailer;
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
     * @param Swift_Mailer $mailer
     * @param ReCaptcha $reCaptcha
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function envia(Request $request,Swift_Mailer $mailer,ReCaptcha $reCaptcha)
    {
        $nome = $request->get("nome");
        $assunto = $request->get("assunto");
        $email = $request->get("email");
        $conteudo = $request->get("conteudo");
        $recaptchaToken = $request->get("recaptchaToken");

        $resposta = $reCaptcha->verify($recaptchaToken);
        $naoEhUmBot = $resposta->isSuccess();

        if($naoEhUmBot) {
            $message = (new \Swift_Message())
                ->setSubject($assunto)
                ->setFrom($email)
                ->setTo("contato@hefesto.io")
                ->setBody("E-mail de contato do {$nome}:\n\n{$conteudo}",
                    'text/html'
                );

            $mailer->send($message);
        } else {
            throw new \Exception("Token inválido");
        }

        return $this->render("index.html.twig");
    }
}