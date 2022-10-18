<?php

namespace App\Controller;

use App\Message\EmailMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new EmailMessage("ouss@gmail.com"));

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
