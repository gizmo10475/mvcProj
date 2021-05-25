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
        if ($session->get('coinsUsr') == null) {
            $session->set('coinsUsr', 10);
            $session->set('coinsBot', 100);
        }
        $session->set('scoreUsr', 0);
        $session->set('scoreBot', 0);
        $session->set('stopgame', 0);
        $session->set('dice1graph', 0);
        $session->set('dice2graph', 0);
        $session->set('totalscore', 0);
        $session->set('dicelist', []);
        $session->set('coinbetUsr', 0);
        $session->get('coinsUsr');
        $session->get('coinsBot');
        $halfCoins = $session->get('coinsUsr') / 2;
        $session->set('halfCoins', $halfCoins);


        if ($request->get('diceChoice') == 'en tärning') {
            if ($request->get('coinBet')) {
                $session->set('coinbetUsr', (int)$request->get('coinBet'));
                $session->set('coinsUsr', $session->get('coinsUsr') - (int)$request->get('coinBet'));
            }
            return $this->redirectToRoute('dice1');
        }
        if ($request->get('diceChoice') == 'två tärningar') {
            if ($request->get('coinBet')) {
                $session->set('coinbetUsr', (int)$request->get('coinBet'));
                $session->set('coinsUsr', $session->get('coinsUsr') - (int)$request->get('coinBet'));
            }
            return $this->redirectToRoute('dice2');
        }

        return $this->render('game21.html.twig');
    }


    /**
     * @Route("/dice1", name="dice1")
     */
    public function startgame(SessionInterface $session, Request $request): Response
    {
        $dice = new \App\Dice\DiceGraphic();
        $res = [];


        var_dump($session->get('coinbetUsr'));


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

        if ($session->get('stopgame') == 1) {
            $session->set('stopgame', 1);
            while ($session->get('scoreBot') < 21) {
                $bot = $dice->roll();
                $session->set('scoreBot', ($session->get('scoreBot') + $bot));
                if ($session->get('scoreBot') == 21) {
                    $session->set('coinsBot', $session->get('coinsBot') + $session->get('coinbetUsr'));
                }
                if ($session->get('scoreBot') > 21) {
                    $session->set('coinsUsr', $session->get('coinsUsr') + ($session->get('coinbetUsr') * 2));
                    $session->set('coinsBot', $session->get('coinsBot') - $session->get('coinbetUsr'));
                }
            }
        }

        return $this->render('dice1.html.twig', []);
    }


    /**
     * @Route("/dice2", name="dice2")
     */
    public function startgame2(SessionInterface $session, Request $request): Response
    {
        $dice = new \App\Dice\DiceGraphic();
        $res = [];


        var_dump($session->get('coinbetUsr'));


        if ($request->get('btn') == 'stop') {
            $session->set('stopgame', 1);
        }

        if ($session->get('stopgame') == 0) {
            $die = $dice->rollTwo();
            $res[] = $die;
            $session->set('scoreUsr', ($session->get('scoreUsr') + $die));
            $session->set('dice1graph', $dice->graphic());
        }
        $session->set('listan', []);
        $session->set('listan', [$session->get('dice1graph')]);

        $session->set('dice1status', false);

        if ($session->get('stopgame') == 1) {
            $session->set('stopgame', 1);
            while ($session->get('scoreBot') < 21) {
                $bot = $dice->roll();
                $session->set('scoreBot', ($session->get('scoreBot') + $bot));
                if ($session->get('scoreBot') == 21) {
                    $session->set('coinsBot', $session->get('coinsBot') + $session->get('coinbetUsr'));
                }
                if ($session->get('scoreBot') > 21) {
                    $session->set('coinsUsr', $session->get('coinsUsr') + ($session->get('coinbetUsr') * 2));
                    $session->set('coinsBot', $session->get('coinsBot') - $session->get('coinbetUsr'));
                }
            }
        }

        return $this->render('dice2.html.twig', []);
    }


    /**
     * @Route("/config")
     */
    public function config(SessionInterface $session, Request $request): Response
    {
        $session->set('coinsUsr', 10);
        $session->set('coinsBot', 100);

        return $this->render('game21.html.twig');
    }
}
