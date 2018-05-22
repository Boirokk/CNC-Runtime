<?php
class Database{
  private static $dsn = 'mysql:hostname=localhost;dbname=cncruntime';
  private static $username = 'boirokk';
  private static $password = '1OMMpXQz7x6bSlHqT2b1';
  private static $db;

  public function __construct(){}

  public static function getDB() {
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
