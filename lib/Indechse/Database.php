<?php
class Indechse_Database 
{
    private static $_instance;
    
    private $_conn;
    
    private function __construct() {
        
    }
    
    /**
     *
     * @return Indechse_Database 
     */
    public static function getInstance() {
        $cn = get_class();
        if (!(self::$_instance instanceof $cn)) {
            self::$_instance = new $cn();
        }
        
        return self::$_instance;
    }
    
    /**
     *
     * @param PDO $connection
     * @param string $name 
     */
    public function setConnection(PDO $connection, $name='default') {
        $this->_conn[$name] = $connection;
    }
    
    /**
     *
     * @param string $name
     * @return PDO|null
     */
    public function getConnection($name='default') {
        if ($this->_conn[$name] instanceof PDO) {
            return $this->_conn[$name];
        }
        
        return null;
    }
    
    public function createConnection($driver, $host, $dbname, $username, $password, $name='default') {
        switch ($driver) {
            case 'pgsql':
                $this->_conn[$name] = new PDO("pgsql:host={$host};dbname={$dbname};user={$username};password={$password}");
                break;
            case 'mysql':
                $this->_conn[$name] = new PDO("pgsql:host={$host};dbname={$dbname}",$username, $password);
                break;
            default:
                throw new Exception(sprintf("unsupported database driver '%s'", $driver));
        }
        $this->_conn[$name]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
}