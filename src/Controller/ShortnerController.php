<?php

namespace App\Controller;

use App\Entity\Shortner;
use Error;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ShortnerController extends AbstractController
{
    public function generateRandomString($length = 7) {
        return substr(str_shuffle(str_repeat($setOfChars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($setOfChars)) )),1,$length);
    }

    
    #[Route('/default', name: 'default')]
    public function index()
    {
        return $this->render('default/index.html.twig');
    }

    public function store(ValidatorInterface $validator, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $urlToShorten = $request->get('url');
        $newShortyUri = $this->generateRandomString();

        $shorty = new Shortner;
        $shorty->setUrl($urlToShorten);
        $shorty->setShortyUrl($newShortyUri);
        $shorty->setValid(true);
        $errors = $validator->validate($shorty);

        if (count($errors) > 0) {
            $this->addFlash('errors', $errors);
            return $this->redirectToRoute('index');
        }

        $entityManager->persist($shorty);

        $entityManager->flush();

        $shortenedURL = $this->getParameter('app.URL') . $newShortyUri;
        $this->addFlash('success', "Shorty ha fatto il suo! Ecco il tuo url $shortenedURL");
        return $this->redirectToRoute('index');
    }

    public function redirectToStoredUrl(Shortner $url)
    {
        return $this->redirect($url->getUrl());
    }
}
