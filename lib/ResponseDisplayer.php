<?php
namespace LiveScores\Lib;

class ResponseDisplayer
{
	//private $viewYmlFileForTemplates;

	public function display($page , $response) {
		//$allCssAndJs = $this->fetchStyleSheetsAndJavascripts($page);
		//echo $this->generateStylesheets($allCssAndJs['stylesheets']).$response.$this->generateJavascripts($allCssAndJs['javascripts']);
		echo $response;
	}

	private function generateStylesheets($stylesheets) {
		foreach ($stylesheets as $key => $value) {
			$code .= "<link href='".\plugins_url("cricket-live-scores-wp-plugin/".$value)."'  rel='stylesheet' />";
		}
		return $code;
	}
	private function generateJavascripts($javascripts) {
		foreach ($javascripts as $key => $value) {
			$code .= "<script src='".$value."'></script>";
		}
		return $code;
	}
	private function fetchStyleSheetsAndJavascripts($page) {
		$viewYmlFileForTemplates = dirname(__FILE__)."/../config/view.yml";
		$parsedYaml = \Symfony\Component\Yaml\Yaml::parse(file_get_contents($viewYmlFileForTemplates));
		return array(
			'stylesheets' => ($parsedYaml[$page]['css'] != "")?explode(",", $parsedYaml[$page]['css']):array(),
			'javascripts' => ($parsedYaml[$page]['js'] != "")?explode(",", $parsedYaml[$page]['js']):array()
			);
	}
}
