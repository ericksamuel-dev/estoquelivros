<?php
    class Request{
        protected $request;

        public function __construct(){
            $this->request = $_REQUEST;
        }

        public function __get($dado){
            if(isset($this->request[$dado])){
                return $this->request[$dado];
            }
            return false;
        }
    }
?>