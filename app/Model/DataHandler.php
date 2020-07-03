<?php



class DataHandler
{
    private $host;
    private $dbdriver;
    private $dbname;
    private $username;
    private $password;
    private $port;
    private $dbh;

    public function __construct()
    {
        $this->host     = DBHOST;
        $this->dbdriver = 'mysql';
        $this->dbname   = DBNAME;
        $this->username = DBUSER;
        $this->password = DBPASS;
        $this->port     = DBPORT;

        try {
            $this->dbh = new PDO("$this->dbdriver:host=$this->host;dbname=$this->dbname;port=$this->port", $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return true;
        } catch (PDOException $e) {
            echo "Connection with " . $this->dbdriver . " failed: " . $e->getMessage();
        }
    }

    public function __destruct()
    {
        $this->dbh = null;
    }

    public function createData($sql)
    {
        $this->dbh->query($sql);

        return $this->lastInsertId();
    }

    public function readData($sql)
    {
        return $this->query($sql);
        // return $this->dbh->query($sql,PDO::FETCH_ASSOC);
    }

    public function readsData($query, $array = NULL)
    {
        $this->stm = $this->dbh->prepare($query);
        if ($array) {
            foreach ($array as $key => $value) {

                switch(true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                        break;
                }

                $key = ":" . $key;

                $this->stm->bindValue($key, $value, $type);

            }
        }
        $this->stm->execute();

        $this->stm->setFetchMode(PDO::FETCH_ASSOC);

        return $this->stm->fetchAll();
    }

    public function updateData($sql)
    {
        $this->query($sql);

        return $this->rowCount();
    }

    public function deleteData($sql)
    {
        $sth = $this->dbh->query($sql);

        return $sth->rowCount();
    }

    public function query($query, $array = NULL, $create = false)
    {
        try {
            $this->stm = $this->dbh->prepare($query);

            if ($array) {
                foreach ($array as $key => $value) {
                    $key = ":" . $key;
                    $this->stm->bindValue($key, $value);
                }
            }

            $this->stm->execute();

            if (! $create) {
                $this->stm->setFetchMode(PDO::FETCH_ASSOC);

                return $this->stm->fetch();
            }

            return true;


        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}