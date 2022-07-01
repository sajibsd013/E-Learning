<?php
include '_table.php';

function getTotal($sql, $con)
{
  $sql = $sql;
  $result = mysqli_query($con, $sql);
  $total = mysqli_num_rows($result);
  return $total;
}

$UserID = $_SESSION['userId'];


$sql1 = "SELECT * FROM `courses` ";

$all = getTotal($sql1, $con);

$sql2 = "SELECT * FROM `courses` WHERE `status`='approved' ";

$approved = getTotal($sql2, $con);

$pending = $all - $approved;
?>

<div id="blog" class="my-2">
  <div class=" bg-white my-5 p-3 border-success" style="border-left: 4px solid">
    <h3 class="fw-normal">Courses </h3>
  </div>



  <div class="">
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
        $sql = "SELECT * FROM `courses` ORDER BY `CourseID` DESC";
        courseTable($con, $sql);
        ?>
      </div>
      <div class="tab-pane fade" id="Approved_post" role="tabpanel" aria-labelledby="Approved_post-tab">
        <?php
        $sql = "SELECT * FROM `courses` WHERE `status`='approved' ORDER BY `CourseID` DESC ";
        courseTable($con, $sql);
        ?>
      </div>
      <div class="tab-pane fade" id="Pending_post" role="tabpanel" aria-labelledby="Pending_post-tab">
        <?php
        $sql = "SELECT * FROM `courses` WHERE `status`='pending' ORDER BY `CourseID` DESC";
        courseTable($con, $sql);
        ?>
      </div>
    </div>
  </div>

</div>