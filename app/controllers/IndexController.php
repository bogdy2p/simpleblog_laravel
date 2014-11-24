<?php

class IndexController extends BaseContoller {
    
    public function showIndex(){
        
        //generates response from index.blade.php
        return View::make('index');
        
    }
  
}