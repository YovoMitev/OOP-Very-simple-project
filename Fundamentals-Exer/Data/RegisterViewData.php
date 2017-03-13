<?php
namespace Data;


class RegisterViewData
{
    private $cityes;

    public function getCityes(){
        return $this->cityes;
    }

    public function setCityes(callable $townsGenerator){
        $this->cityes = $townsGenerator();
    }


}