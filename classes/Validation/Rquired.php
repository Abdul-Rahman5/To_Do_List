<?php
require_once "validator.php";

class Required implements validator{
    public function check($key,$value)
    {
        if (empty($value)) {
            return "$key is rquired";
        }else{
            return false;
        }
    }
}


?>