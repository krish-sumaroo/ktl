<?php

class UserController extends BaseController {
	protected $layout = "temlA";

	public function getRegister(){
		$this->layout->content = View::make('users.register');
	}

	public function postCreate()
	{
		
	}
}