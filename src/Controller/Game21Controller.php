<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Dice\DiceGraphic;
use App\Entity\Highscore;

class Game21Controller extends AbstractController
{

    /**
     * @Route("/game21")
     */
    public function start(SessionInterface $session, Request $request): Response
    {
        $session->set('scoreUsr', 0);
        $session->set('scoreBot', 0);
        $session->set('stopgame', 0);
        $session->set('dice1graph', 0);
        $session->set('dice2graph', 0);
        $session->set('totalscore', 0);
        $session->set('dicelist', []);



        return $this->render('game21.html.twig', [
        ]);
    }

    /**
     * @Route("/dice1", name="dice1")
     */
    public function startgame(SessionInterface $session, Request $request): Response
    {
        $dice = new \App\Dice\DiceGraphic();
        $rolls = 1;
        $res = [];
        $class = [];

        if ($session->get('stopgame') == 0) {
            $die = $dice->roll();
            $res[] = $die;
            $session->set('scoreUsr', ($session->get('scoreUsr') + $die));
            $session->set('dice1graph', $dice->graphic());
        }
        $session->set('listan', []);
        $session->set('listan', [$session->get('dice1graph')]);

        $session->set('dice1status', false);




        return $this->render('dice1.html.twig', []);
    }


}
