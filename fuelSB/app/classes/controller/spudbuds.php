<?php

class Controller_SpudBuds extends Controller_Template
{

	public function action_index()
	{
		
		$data = array();
		$this->template->css = 'spudbuds.css';
		$this->template->title = 'Home Page';
		$this->template->header = 'SpudBuds/Group 14';
		$this->template->content = View::forge('SpudBuds/index', $data);
	}

	public function action_bio()
	{
		$data = array();
		$this->template->css = 'spudbuds.css';
		$this->template->title = 'Bios';
		$this->template->header = 'Meet the Team';
		$this->template->content = View::forge('SpudBuds/bios', $data);
	}
	


}
?>