<?php

namespace controllers;

use core\BaseSQL;
use core\Routing;
use core\Users;
use core\View;

class PagesController{
	
	public function defaultAction(){


		$v = new View("homepage", "back");
		$v->assign("pseudo","prof");
	}
	

}