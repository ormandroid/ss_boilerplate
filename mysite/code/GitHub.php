<?php
class GitHub extends Page {}

class GitHub_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}

    public function GitHub(){
        $json = array();
        $json['repo'] = json_decode($this->GetContentFromGitHub('https://api.github.com/users/Rhym/repos'), true);
        echo print_r($json); exit();
    }

    public function GetContentFromGitHub($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

}