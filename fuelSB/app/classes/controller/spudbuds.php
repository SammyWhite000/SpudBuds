<?php

class Controller_SpudBuds extends Controller_Template
{
	public function action_index()
	{
		$data = array();
		$this->template->css = 'spudbuds.css';
		$this->template->title = 'Home Page';
		$this->template->header = 'Home';
		$this->template->contents = View::forge('spudbuds/index', $data);
	}

	public function action_bios()
	{
		$data = array();
		$this->template->css = 'aboutUs.css';
		$this->template->title = 'Bios';
		$this->template->header = 'Meet the Team';
		$this->template->contents = View::forge('spudbuds/bios', $data);
	}
	
	public function action_mosaic2()
	{
		$data = array();
		$this->template->css = 'Mosaic.css';
		$this->template->title = 'Mosaic';
		$this->template->header = 'Build a Mosaic Table';
		$this->template->contents = View::forge('spudbuds/mosaic2', $data);

	}
	
}
?>