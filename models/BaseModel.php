<?php

require_once "../bootstrap.php";

Class Model {

    protected static $dbc;
    protected static $table;

    public $attributes = array();

    /*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    protected static function dbConnect()
    {
        if (!self::$dbc)
        {
            define('DB_HOST', '127.0.0.1');
            define('DB_NAME', 'get_listed_db');
            define('DB_USER', 'parks_user');
            define('DB_PASS', 'tokyo3');
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            self::$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // @TODO: Connect to database
        }
    }

    /*
     * Get a value from attributes based on name
     */
    public function __get($name)
    {
        if(array_key_exists($name, $this->attributes))
        {
            return $this->attributes[$name];
        }

        return null;
    }

    /*
     * Set a new attribute for the object
     */
    public function __set($name, $value)
    {
    
        $this->attributes[$name] = $value;

    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
        if (!empty($this->attributes['id']))

        {
            $this->update();
        } else {
            $this->insert();
        }

        // myTODO save() should breakdown into insert() and update()

        // @TODO: Ensure there are attributes before attempting to save

        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert

        // @TODO: Ensure that update is properly handled with the id key

        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id

        // @TODO: You will need to iterate through all the attributes to build the prepared query

        // @TODO: Use prepared statements to ensure data security
    }

    protected function update ()
    {
        $stmt = self::$dbc->prepare("
            UPDATE national_parks 
            SET name = :name, location = :location, date_established = :date_est, area_in_acres = :area, description = :description
            WHERE id = :id
            ");

        $stmt->bindValue(':name', $this->attributes['name'], PDO::PARAM_STR);
        $stmt->bindValue(':location', $this->attributes['location'], PDO::PARAM_STR);
        $stmt->bindValue(':date', $this->attributes['date_est'], PDO::PARAM_STR);
        $stmt->bindValue(':area', $this->attributes['area'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->attributes['id'], PDO::PARAM_STR);

        $stmt->execute();
    }

    protected function insert()
    {}
    /*
     * Find a record based on an id
     */

    
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements

        // @TODO: Store the resultset in a variable named $result

        $stmt = self::$dbc->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents

        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        }
        return $instance;
    }

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();

        $allRecords = self::$dbc->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_ASSOC);

        return $allRecords;

        // @TODO: Learning from the previous method, return all the matching records
    }

}