<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(dirname(__FILE__)."/phpFlickr.php");

class Flicrk {
	public $f;
	public function test(){
		$this->f = new phpFlickr("ab6bd6a8a063463309463a643925d60c");
		$recent = $f->photos_getRecent();
		foreach ($recent['photo'] as $photo) {
		    $owner = $f->people_getInfo($photo['owner']);
		    echo "<a href='http://www.flickr.com/photos/" . $photo['owner'] . "/" . $photo['id'] . "/'>";
		    echo $photo['title'];
		    echo "</a> Owner: ";
		    echo "<a href='http://www.flickr.com/people/" . $photo['owner'] . "/'>";
		    echo $owner['username'];
		    echo "</a><br>";
		}
	}
}
