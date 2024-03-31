<?php
class Read
{
    public static function get_contacts($pdo)
    {
        // Connect to MySQL database
        $pdo = pdo_connect_mysql();
        // Prepare the SQL statement to get all records from our contacts table
        $stmt = $pdo->prepare('SELECT * FROM nilai_matakuliah');
        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $posts;
    }
}
