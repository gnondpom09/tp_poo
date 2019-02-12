<?php
class SessionSingleton {
    /**
     *    Returns an instance of the singleton class.
     *    @return    object        The singleton instance
     */
    public static function _instance()
    {
        // Start a session if not already started
        Session::start();

        if ( false == isset( $_SESSION[ self::$_singleton_class ] ) )
        {
            $class = self::$_singleton_class;
            $_SESSION[ self::$_singleton_class ] = new $class;
        }

        return $_SESSION[ self::$_singleton_class ];       
    }

    /**
     *    Destroy the singleton object. Deleting the session variable in the
     *    destructor does not make sense since the destructor is called every
     *    time the script ends.
     */
    public static function _destroy()
    {
        $_SESSION[ self::$_singleton_class ] = null;
    }

    /**
     *    Initialize the singleton object. Use instead of constructor.
     */
    public function _initialize( $name )
    {
        // Something...
    }

    /**
     *    Prevent cloning of singleton.
     */
    private function __clone()
    {
        trigger_error( "Cloning a singleton object is not allowed.", E_USER_ERROR );
    }

    private static $_singleton_class = __CLASS__;
}