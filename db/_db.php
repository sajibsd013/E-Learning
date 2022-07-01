<?php
// Script to connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "elearningdb";

$con = mysqli_connect($servername, $username, $password, $database);


class DB
{
    function __construct()

    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "elearningdb";
        $this->conn = new mysqli($servername, $username, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function getCount($sql)
    {
        $result = $this->conn->query($sql);
        return $result->num_rows;
    }
    function execute($sql)
    {
        return $this->conn->query($sql);
    }

    function getRow($sql)
    {
        $rows = $this->execute($sql);
        return  $rows->fetch_assoc();
    }

    function close()
    {
        $this->conn->close();
    }
}

class Notification
{
    function __construct($content, $n_to, $path)

    {
        $n_by = $_SESSION['userId'];
        if ($n_by !== $n_to) {
            $db = new DB();
            $sql = "INSERT INTO `notifications` (`n_by`,`n_to`, `path`, `content`) 
                VALUES ('$n_by', '$n_to', '$path', '$content')";
            $db->execute($sql);
            $db->close();
        }
    }
}

function timeFormat($timestand){
    $start = new DateTime();
    $end = new DateTime($timestand, timezone_open('asia/dhaka'));

    $interval = $start->diff($end);

    $year = $interval->format('%y');
    $months = $interval->format('%m');
    $days = $interval->format('%a');
    $hours = $interval->format('%h');
    $min = $interval->format('%i');
    $time = "Just now";

    if ($year > 0) {
        $time = $year . ' yers ago';
    } else if ($months > 0) {
        $time = $months . ' months ago';
    } else if ($days > 0) {
        $time = $days . ' days ago';
    } else if ($hours > 0) {
        $time = $hours . ' hours ago';
    } else if ($min > 0) {
        $time = $min . ' mins ago';
    }
    return $time;
}
