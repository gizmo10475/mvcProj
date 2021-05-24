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
        // $rolls = 1;
        $res = [];
        // $class = [];

        if ($request->get('btn') == 'stop') {
            $session->set('stopgame', 1);
        }

        if ($session->get('stopgame') == 0) {
            $die = $dice->roll();
            $res[] = $die;
            $session->set('scoreUsr', ($session->get('scoreUsr') + $die));
            $session->set('dice1graph', $dice->graphic());
        }
        $session->set('listan', []);
        $session->set('listan', [$session->get('dice1graph')]);

        $session->set('dice1status', false);


        // if ($request = $this->get('request')) {
        //     var_dump("hejkasdiajsdioujahsdkjashdkajhsbnd");
        // }
        if ($session->get('stopgame') == 1) {
            $session->set('stopgame', 1);
            while ($session->get('scoreBot') < 21) {
                $bot = $dice->roll();
                $session->set('scoreBot', ($session->get('scoreBot') + $bot));
            }
        }

        var_dump($session->get('scoreBot'));

        // if ($request->get('stop')) {
        //     while ($session->get('scoreBot') < 21) {
        //         $bot = $dice->roll();
        //         $session->set('scoreBot', ($session->get('scoreBot') + $die));
        //     }
        // }


        return $this->render('dice1.html.twig', []);
    }



}
