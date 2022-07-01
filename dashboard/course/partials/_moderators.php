<?php
$action_url = $root . '/dashboard/config/_addmod.php';
$db = new DB();

$sql = "SELECT * FROM `courses` WHERE `CourseID`='$CourseID'";
$row = $db->getRow($sql);
$CourseID = $row['CourseID'];

?>


<table class="table bg-white border border-top-0 " style="font-size: 13px;">
  <thead class="bg-white">
    <tr>
      <th scope="col">Moderator Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col" class="<?php echo $action_display ?>">Action</th>

    </tr>
  </thead>

  <tbody class="text-secondary bg-light">

    <?php
    $sql2 = "SELECT * FROM `moderators` WHERE `CourseID`='$CourseID'";
    $rows2 = $db->execute($sql2);

    foreach ($rows2 as $row2) {
      $M_ID = $row2["UserID"];
      $sql3 = "SELECT * FROM `users` WHERE `UserID`='$M_ID'";
      $row3 = $db->getRow($sql3);

      $mod_dlt_url = $root . '/dashboard/config/_delete.php?ModeratorID=' . $row2['ModeratorID'];

    ?>

      <tr>
        <td><?php echo $row3['username'] ?></td>
        <td><?php echo $row3['email'] ?></td>
        <td><?php echo $row3['mobile'] ?></td>

        <td class="d-flex <?php echo $action_display ?>">
          <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded" onclick="return confirm(`Are you sure?`) && getFunc(`<?php echo $mod_dlt_url ?>`)" style="cursor: pointer;" "><i class=" fa fa-trash text-danger" aria-hidden="true"></i></a>
        </td>

      </tr>

    <?php
    }

    ?>


  </tbody>
</table>

<?php

?>


<div class="row justify-content-center g-3 <?php echo $action_display ?>">
  <div class="col-lg-8 bg-white shadow-lg rounded p-2 px-md-4">

    <h6 class="heading_color">Add Moderator</h6>

    <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
      <div class="row g-2 justify-content-center">

        <div class="form-floating  col-md-12 ">
          <input type="CourseID" class="form-control _form_data d-none" id="CourseID" value="<?php echo $CourseID ?>" name="CourseID" placeholder=" " disabled required>
        </div>
        <div class="form-floating  col-md-12">
          <input type="email" class="form-control  " id="email" name="email" placeholder=" " required onkeyup="addModerator(this.value)">
          <label for="email">Enter Moderator Email </label>
        </div>
        <div class="form-floating  col-md-12">
          <input type="password" class="form-control  _form_data" id="password" name="password" placeholder=" " required>
          <label for="password"> Enter Your Password </label>
        </div>
        <div class="form-floating  col-md-12 ">
          <input type="username" class="form-control border-0 bg-white" id="username" name="username" placeholder=" " style="display: none;" disabled required>
          <label for="username">Moderator Name</label>
        </div>
        <div class="form-floating  col-md-12 d-none">
          <input type="UserID" class="form-control _form_data " id="UserID" name="UserID" placeholder=" " disabled required>
          <label for="UserID">UserID</label>
        </div>

        <button id="submit" type="submit" class="btn btn-dark  w-100 fw-bold btn-sm my-3">Add Moderator</button>

      </div>
    </form>


  </div>
</div>