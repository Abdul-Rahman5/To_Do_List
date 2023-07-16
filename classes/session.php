<?php 

class Session {
    public function __construct()
    {
        if (!isset($_SESSION)) {
            # code...
            session_start();
        }
    }

    public function set($key ,$val)
    {
        $_SESSION[$key] = $val;
    }
        public  function has( $key)
        {
        return isset($_SESSION[$key]);
        }
    public function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public function unset($key)
    {
        unset($_SESSION[$key]) ;
    }
    public function destroy()
    {
      session_destroy() ;
    }
}



