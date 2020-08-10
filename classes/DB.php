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
        $this->login    = 'mysql';
        $this->pass     = 'mysql';
        $this->database = 'site';

        $this->connection = new PDO('mysql:host=localhost;dbname=' . $this->database, $this->login, $this->pass);
    }

    /**
     * @param array $data
     * @param string $table
     * @return bool|void
     */

    public function insert($data = [], $table = '')
    {
        if (empty($data)) {
            return;
        }

        $fields = implode(', ', array_keys($data));
        $values = implode(', ', $data);

        try {
            $this->connection->query('INSERT INTO ' . $table . ' (' . $fields . ') VALUES (' . $values . ')');
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return true;
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}