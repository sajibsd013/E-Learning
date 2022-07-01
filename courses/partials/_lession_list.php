<?php
$db = new DB();
$sql = "SELECT * FROM `lessons` WHERE `CourseID`='$CourseID'  ORDER BY `LessonNo` ASC";

$rows = $db->execute($sql);

foreach ($rows as $row) {
    $count = $row['LessonNo'];
    $lsn_dlt_url = $root . '/dashboard/config/_delete.php?LessonID=' . $row['LessonID'];
    $lsn_edit_url = $root . '/dashboard/update/?lesson=' . $row['LessonID'];
    $Content_url  = $root . '/courses/content.php?course=' . $CourseID . '&lesson=' . $count;
    $sql_s = "SELECT `id` FROM `lesson_status` WHERE `LessonID`=" . $row['LessonID'] . " AND `UserID`=" . $_SESSION['userId'];
    $row_s = $db->getCount($sql_s);

    $status = "locked";
    if ($row_s or $count == '1') {
        $status = "unlocked";
    }


?>
    <div class="accordion mb-1 py-" id="accordionExample">
        <div class="accordion-item py-0">
            <h4 class="accordion-header" id="heading">
                <button class="accordion-button collapsed border text-center py-2 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count ?>" aria-expanded="false" aria-controls="collapse<?php echo $count ?>">
                    <small>Lesson <?php echo $count ?> - <?php echo $row['title'] ?></small>
                </button>
            </h4>
            <div id="collapse<?php echo $count ?>" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
                <div class="accordion-body p-0">
                    <div class="card">
                        <div class="card-header ">
                            <div class="d-flex justify-content-between align-items-center">
                                <small><?php echo $row['title'] ?></small>
                                <small><?php echo $status ?></small>
                            </div>

                        </div>
                        <div class="card-body ">
                            <?php
                            if ($status == "unlocked") {
                            ?>
                                <div class=" text-muted small">
                                    <?php echo $row['content'] ?>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary w-100 mt-4" onclick="redirectTo(`<?php echo $Content_url ?>`)"> View Content </button>

                            <?php
                            } else {
                            ?>
                                <div class="text-center text-muted small">
                                    Locked
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>

                            <?php
                            }
                            ?>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

<?php
}
$db->close(); 

?>

<div class="accordion mb-1 py-" id="accordionExample">
    <div class="accordion-item py-0">
        <h4 class="accordion-header" id="heading">
            <button class="accordion-button collapsed border text-center py-2 " type="button" data-bs-toggle="collapse" data-bs-target="#collapse121" aria-expanded="false" aria-controls="collapse121">
                <small>Certificate</small>
            </button>
        </h4>
        <div id="collapse121" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#accordionExample">
            <div class="accordion-body p-0">
                <div class="card">
                    <div class="card-header ">
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Get Certificate</small>
                            <small><?php echo $status ?></small>
                        </div>

                    </div>
                    <div class="card-body ">
                        <?php
                        if ($status == "unlocked") {
                            $Content_url_C  = $root . '/courses/content.php?course=' . $CourseID . '&lesson=finished';

                        ?>
                            <button class="btn btn-sm btn-outline-secondary w-100 mt-4" onclick="redirectTo(`<?php echo $Content_url_C ?>`)"> View Content </button>

                        <?php
                        } else {
                        ?>
                            <div class="text-center text-muted small">
                                Locked
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>

                        <?php
                        }
                        ?>

                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
