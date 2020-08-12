<?

/**
 * Class DB
 */
class DB
{
    protected $connection;
    protected $login;
    protected $pass;
    protected $database;

    public function __construct()
    {
        $this->login = 'mysql';
        $this->pass = 'mysql';
        $this->database = 'site';

        $this->connection = new PDO('mysql:host=localhost;dbname='.$this->database, $this->login, $this->pass);
    }

    /**
     * @param array  $data
     * @param string $table
     *
     * @return bool|void
     */

    public function insert($table = '', $data = [])
    {
        if (empty($data)) {
            return;
        }

        foreach ($data as $key => $field) {
            $field = htmlspecialchars(strip_tags(stripcslashes($field)));
            $data[$key] = "'".$field."'";
        }

        $fields = implode(', ', array_keys($data));
        $values = implode(', ', $data);
        $query = 'INSERT INTO '.$table.' ('.$fields.') VALUES ('.$values.')';

        try {
            $this->connection->query($query);
        } catch (PDOException $e) {
            return $e->getMessage();
        }

        return true;
    }

    public function select($table = '', $fields = [])
    {

    }

    public function __destruct()
    {
        $this->connection = null;
    }
}