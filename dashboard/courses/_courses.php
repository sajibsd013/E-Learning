<?php

$db = new DB();

$UserID = $_SESSION['userId'];

$sql1 = "SELECT * FROM `courses` WHERE `TeacherID`='$UserID'";

$all = $db->getCount($sql1);

$sql2 = "SELECT * FROM `courses` WHERE `status`='approved' AND `TeacherID`='$UserID'";
$approved = $db->getCount($sql2);
$db->close();

$pending = $all - $approved;

$display = 'd-none';
if ($all) {
  $display = "none";
}

$create_url = $root . '/courses/create.php'
?>

<div id="" class="my-3  <?php echo $display; ?>">
  <div class=" bg-white my-2 p-3 p-md-2 border-success d-flex justify-content-between align-items-center" style="border-left: 4px solid">
    <h3 class="fw-normal">Your Courses </h3>
    <a class="btn btn-sm btn-outline-dark " onclick="redirectTo(` <?php echo $create_url; ?>`)">Create new course</a>

  </div>
  <div class=" mt-3">
    <nav class="">
      <div class="nav nav-tabs " id="nav-tab" role="tablist">
        <button class="nav-link active" id="All_post-tab" data-bs-toggle="tab" data-bs-target="#All_post" type="button" role="tab" aria-controls="All_post" aria-selected="true">All
          <span class="badge bg-primary ms-2"> <?php echo $all; ?></span>
        </button>
        <button class="nav-link " id="Approved_post-tab" data-bs-toggle="tab" data-bs-target="#Approved_post" type="button" role="tab" aria-controls="Approved_post" aria-selected="false">Approved
          <span class="badge bg-success ms-2"> <?php echo $approved; ?></span>
        </button>
        <button class="nav-link" id="Pending_post-tab" data-bs-toggle="tab" data-bs-target="#Pending_post" type="button" role="tab" aria-controls="Pending_post" aria-selected="false">Pending
          <span class="badge bg-warning ms-2"> <?php echo $pending; ?></span>
        </button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="All_post" role="tabpanel" aria-labelledby="All_post-tab">
        <?php

        $db = new DB();
        $sql = "SELECT * FROM `courses` WHERE `TeacherID`='$UserID'";
        $rows = $db->execute($sql);
        include '_load_course.php';
        $db->close();

        ?>
      </div>
      <div class="tab-pane fade" id="Approved_post" role="tabpanel" aria-labelledby="Approved_post-tab">
        <?php
        $db = new DB();
        $sql = "SELECT * FROM `courses` WHERE `TeacherID`='$UserID' AND `status`='approved'  ";
        $rows = $db->execute($sql);
        include '_load_course.php';
        $db->close();
        ?>
      </div>
      <div class="tab-pane fade" id="Pending_post" role="tabpanel" aria-labelledby="Pending_post-tab">
        <?php
        $db = new DB();

        $sql = "SELECT * FROM `courses` WHERE  `TeacherID`='$UserID' AND `status`='pending'";
        $rows = $db->execute($sql);
        include '_load_course.php';
        $db->close();
        ?>
      </div>
    </div>
  </div>
</div>


<?php
$db = new DB();
$sql = "SELECT * FROM `moderators` WHERE `UserID`='$UserID'";
$count = $db->getCount($sql);

$display2 = 'd-none';
if ($count) {
  $display2 = "none";
}

?>
<div id="" class="my-5  <?php echo $display2; ?>">
  <div class=" bg-white my-2 p-3 p-md-2 border-success " style="border-left: 4px solid">
    <h3 class="fw-normal">Others Courses </h3>
  </div>
  <div class="mt-3">

    <table class="table bg-white border border-top-0" style="font-size: 13px;">
      <thead class="bg-white">
        <tr>
          <th scope="col">Course Title</th>
          <th scope="col">Price</th>
          <th scope="col">Publish date</th>
        </tr>
      </thead>


      <tbody class="text-secondary bg-light">
        <?php
        $sql = "SELECT * FROM `moderators` WHERE `UserID`='$UserID'";
        $rows0 = $db->execute($sql);
        foreach ($rows0 as $row0) {
          $course_url = $root . '/dashboard/course/?id=' . $row0['CourseID'];;
          $sql2 = "SELECT * FROM `courses` WHERE  `CourseID`=" . $row0['CourseID'];
          $row2 = $db->getRow($sql2);
          $timastand = $row2['timastand'];
          $datetime = new DateTime($timastand, timezone_open('asia/dhaka'));
          $date_format = $datetime->format('M d, Y');

        ?>
          <tr>
            <td>
              <a class="pointer text-decoration-none" onclick="redirectTo(`<?php echo $course_url ?>`)"><?php echo $row2['course_title'] ?></a>
            </td>
            <td>$<?php echo $row2['price'] ?></td>

            <td><?php echo $date_format ?></td>
          </tr>
        <?php
        }
        ?>

      </tbody>
    </table>


  </div>
</div>