<?php



class Database{
    public $conn ;

    /**
     * constructor for database class
     * @param array $config
     */

    public function __construct(array $config) {
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";  // dns

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // default fetch mode as object
            //PDO::ATTR_EMULATE_PREPARES => false,  // disable emulation mode, to prevent SQL injections.
        ] ;

            try {

                $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
                echo 'Connected successfully';

            }   catch (PDOException $e) {
                throw  new Exception('connection failed' . $e->getMessage()) ;
            }
        }

        /**
         * Query the database
         * @param string $query
         * @return PDOStatement
         * @throws PDOException
         */
        public function query($query ,$params = []){
            try {
                $sth = $this->conn->prepare($query);
                // bind name params
                foreach ($params as $param => $value){
                    $sth->bindValue(':' . $param,$value);
                }
                $sth->execute();
                return $sth;
            }   catch (PDOException $e) {
                throw new Exception('query failed to Executed'. $e->getMessage());
            }
        }




}