<?php

class Controller_Home extends Controller_Template
{

	public function action_index()
	{
		//return Response::forge(View::forge('welcome/index'));
		//die('home index'); // die is similar to echo
		//return Response::forge(View::forge('home/index'));
		$data = array();
		$this->template->title = 'Home Page';
		$this->template->content = View::forge('home/index', $data);
	}

	public function action_other()
	{
		//return Response::forge(View::forge('welcome/index'));
		//die('home other index'); // die is similar to echo
		return Response::forge(View::forge('home/two'));
	}
	


}
