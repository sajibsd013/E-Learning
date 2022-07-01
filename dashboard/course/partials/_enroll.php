<table class="table bg-white border border-top-0" style="font-size: 13px;">
  <thead class="bg-white">
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Payment Status</th>
      <th scope="col" class="<?php echo $action_display ?>">Action</th>

    </tr>
  </thead>

  <tbody class="text-secondary bg-light">

    <?php
    $db = new DB();
    $sql = "SELECT * FROM `enrolls` WHERE `CourseID`='$CourseID'";
    $rows = $db->execute($sql);
    $db->close();
    foreach ($rows as $row) {
      $payment_status = $row['payment_status'];
      if ($payment_status == "paid") {
        $s_class = "success";
      } else {
        $s_class = "warning";
      }
      $post_dlt_url = $root.'/dashboard/config/_delete.php?EnrollID=' . $row['EnrollID'];


    ?>
      <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['mobile'] ?></td>
        <td>
          <small class="bg-<?php echo $s_class ?> text-white p-1 fw-bold rounded"><?php echo $payment_status ?> </small>
        </td>
        <td class="d-flex <?php echo $action_display ?> ">
          <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded pointer" onclick="return confirm(`Are you sure?`) && getFunc(`<?php echo $post_dlt_url ?>`)"><i class=" fa fa-trash text-danger" aria-hidden="true"></i></a>
        </td>

        </trecho>
      <?php
    }

      ?>


  </tbody>
</table>