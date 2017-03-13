<?php
namespace LiveScores\Lib;

class CricketNews
{
	private $urls = array(
			"all" => "http://www.espncricinfo.com/rss/content/story/feeds/0.xml",
			"india" => ""
		);

	public function getHomeNews() {
		return $this->fetchNewsByUrl($this->urls['all']);
	}

	public function fetchNewsByUrl($url) {
		$parsedData = Parser::parseXmlUrl($url);
		//print_r($parsedData);die;
		return $this->generateTemplate($parsedData);
	}

	private function generateTemplate($data) {
		$template = "";
		foreach ($data->channel->item as $key => $value) {
			$template .= '
				<div class="akls_main">
					<a href="'.$value->link.'"  target="_blank">'.$value->title.'</a>
					<span class="akls_description">'.$value->description.'</span>
				</div>
			';
		}

		return $template;

	}
}