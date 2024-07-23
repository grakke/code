<?php

class AdminController extends BaseController{
    public function indexAction() {
         require __VIEW__.'index.html';
    }
    public function mainAction() {
         require __VIEW__.'main.html';
    }
    public function dragAction() {
         require __VIEW__.'drag.html';
    }
    public function menuAction() {
         require __VIEW__.'menu.html';
    }
    public function topAction() {
         require __VIEW__.'top.html';
    }
}

