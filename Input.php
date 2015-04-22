<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if (isset($_REQUEST[$key]))
        {
            return true;
        }
        // TODO: Fill in this function
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        // TODO: Fill in this function
        if (isset($_REQUEST[$key]))
        {
            return $_REQUEST[$key];
        }
        else
        {
            return $default;
        }
    }

    public static function getString($key, $min = null, $max = null)
    {
        $keyVal = self::get($key);

        if ($keyVal == null)
        {
            throw new OutOfRangeException ("$key has no value");

        } 

        if (!is_string($key))
        { 
            throw new InvalidArgumentException ("$key should be a string");
        }

        if (((!is_int($max)) && (!is_null($max))) || ((!is_int($min))) && (!is_null($min)))
        {
            throw new InvalidArgumentException ("min and max should be numbers");
        }

        if (!is_string($keyVal))
        {
            throw new DomainException ("$key should be a string");
        }

        if (!empty($min) && !empty($max))
        { 
            if ((strlen($keyVal) < $min) || (strlen($keyVal) > $max))
            {
                throw new LengthException ("$key is too short or too long");
            }
        }
        
        return $keyVal;
    }

    public static function getNumber($key, $min = null, $max = null)
    {
        $keyVal = self::get($key);

        if(!is_numeric($keyVal))
        {   
            throw new Exception("$key should be a number");
        }

        if (((!is_int($max)) && (!is_null($max))) || ((!is_int($min))) && (!is_null($min)))
        {
            throw new InvalidArgumentException ("min and max should be numbers");
        }

        if (($keyVal < $min) || ($keyVal > $max)) 
        {
            throw new RangeException("Number must be within the range of $min and $max");
        }
         
            return $keyVal;
    }

    public static function getDate($key)
    {
        $keyVal = self::get($key);

        $date = date_create($keyVal);

        if (!$date)
        {
            throw new Exception("$key should be date in format yyyy-mm-dd");
        } else 
        {
            return date_format($date, 'Y-m-d');
        }
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    
    private function __construct() {}
}
