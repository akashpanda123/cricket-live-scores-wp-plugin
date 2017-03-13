<?php
namespace LiveScores\Lib;
class Parser
{
	public static function parseXmlUrl($xmlFileUrl) {
		return simplexml_load_file($xmlFileUrl);
	}
}