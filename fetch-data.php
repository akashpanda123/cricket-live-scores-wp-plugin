<?php
namespace LiveScores;
use LiveScores\Lib\CricketNews;
use LiveScores\Lib\ResponseDisplayer;

require_once dirname(__FILE__)."/vendor/autoload.php";

/*
$liveScores = new CricketLiveScores;
echo $liveScores->getLiveScores();
*/
$page = $_GET['page'];

$cricketHome = new CricketNews();
$response = $cricketHome->getHomeNews();

$responseDisplayer = new ResponseDisplayer();
$responseDisplayer->display( $page , $response);
