<?php
include '../db/_db.php';
if (isset($_GET['q'])) {
    $searchTerm = $_GET['q'];
    $db = new DB();
    $sql = "SELECT `course_title` FROM courses WHERE (course_title LIKE '%{$searchTerm}%' OR course_Description LIKE '%{$searchTerm}%') ";
    $count = $db->getRow($sql);

    if ($count) {
        $rows = $db->execute($sql);
        foreach ($rows as $row) {
?>
            <option><?php echo $row['course_title'] ?></option>
        <?php

        }
    }
    $sql1 = "SELECT `blog_title` FROM blog WHERE (blog_title LIKE '%{$searchTerm}%' OR blog_desc LIKE '%{$searchTerm}%') ";
    $count1 = $db->getRow($sql1);

    if ($count1) {
        $rows1 = $db->execute($sql1);
        foreach ($rows1 as $row1) {
        ?>
            <option><?php echo $row1['blog_title'] ?></option>
<?php

        }
    }

    $db->close();
}
?>