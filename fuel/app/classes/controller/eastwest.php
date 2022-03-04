<?php

class Controller_EastWest extends Controller_Template{

    /*
    The basic welcome message

    @access public
    @return Response
    */

    public function action_index(){

        //$this->template->var="Hello First Variable use ---!!!";
        //return Response::forge(View::forge('eastwest/index'));

        //Add css dynamically into your views
        //$this->template->main_css=Asset::css('main.css');
        //$this->template->main_css=Asset::css('east.css');

        $this->template->content=View::forge('eastwest/index');
    }

    public function action_west(){
        die('this is my west page');
    }

    public function action_east(){
        die('this is my east page');
    }

}