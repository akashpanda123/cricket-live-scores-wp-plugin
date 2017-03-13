<?php
namespace LiveScores\Lib;

class CricketLiveScores
{
	private $url = "http://static.cricinfo.com/rss/livescores.xml"; 

	public function getLiveScores() {
		$scores = $this->getLiveScoresFromRSSFeeds() ;
		return $this->generateTemplate($scores);
	}

	private function getLiveScoresFromRSSFeeds() {
		return Parser::parseXmlUrl($this->url);
	}

	private function generateTemplate($scores) {
		$template = "";
		foreach ($scores->channel->item as $item) {
	        $template .= '<a href='.$item->link.' target="blank"><div class="line">';
	        $template .= "<p>" . $item->description . "</p>";
	        $template .= '</div></a>';
		}
		return $template;
	}
}