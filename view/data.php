<?php

class Database
{
    private static $dsn = 'mysql:hostname=localhost;dbname=cncruntime';
    private static $username = 'boirokk';
    private static $password = '1OMMpXQz7x6bSlHqT2b1';
    private static $db;

    public function __construct()
    {
    }

    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
        }
        return self::$db;
    }
}

function get_entry()
{
    $db = Database::getDB();

    $query = 'SELECT * FROM start INNER JOIN stop ON start.start_id=stop.start_id ORDER BY start_time ASC';
    $statement = $db->prepare($query);
    $statement->execute();
    $models = $statement->fetchAll();
    $statement->closeCursor();
    return $models;
}

function get_row($id)
{
    $db = Database::getDb();

    $query = "SELECT * FROM start INNER JOIN stop ON start.start_id=stop.start_id WHERE start.start_id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $time = $statement->fetch();
    $statement->closeCursor();
    return $time;
}


$entries = get_entry();
?>



<table class="table table-hover">
    <thead>
    <tr align="center">
        <th scope="col">Operator</th>

        <th scope="col">Job #</th>
        <th scope="col">Description</th>

        <th scope="col">Total Runtime</th>
        <th scope="col">&nbsp</th>
    </tr>
    </thead>
    <tbody>
    <?php $array_start = array();
    $array_stop = array();
    ?>
    <?php foreach ($entries as $entry): ?>
        <?php array_push($array_start, $entry['start_time']);
        array_push($array_stop, $entry['stop_time']);
        ?>
        <tr align="center">
            <td><?php echo htmlspecialchars($entry['initials']); ?></td>
            <td><?php echo htmlspecialchars($entry['part_number']); ?></td>
            <td><?php echo htmlspecialchars($entry['description']); ?></td>
            <td>
                <?php
                $id = $entry['start_id'];
                $time = get_row($id);
                $datetime1 = new DateTime($time['stop_time']);
                $datetime2 = new DateTime($time['start_time']);
                $interval = $datetime1->diff($datetime2);
                echo $interval->format('%H:%I:%S');
                ?>
            </td>
            <td>
                <form class="" action=".." method="post">
                    <input type="hidden" name="action" value="delete_entry">
                    <input type="hidden" name="delete_entry"
                           value="<?php echo htmlspecialchars($entry['start_id']); ?>">
                    <input class="btn btn-sm btn-danger" type="submit" name="" value="Delete">
                </form>
            </td>

        </tr>

    <?php endforeach; ?>
    </tbody>
</table>

<?php
$datetime1 = new DateTime(end($array_stop));
$datetime2 = new DateTime(current($array_start));
$interval_total = $datetime1->diff($datetime2);

echo 'Total Operating Time: <br />' . $interval_total->format('%H:%I:%S');
echo "<br /> <br />Chad Czilli &copy 2018";
?>
