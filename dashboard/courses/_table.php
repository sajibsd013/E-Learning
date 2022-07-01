<?php
function courseTable($con, $sql, $root)
{
?>
    <table class="table bg-white border border-top-0" style="font-size: 13px;">
        <thead class="bg-white">
            <tr>
                <th scope="col">Course Title</th>
                <th scope="col">Price</th>
                <th scope="col">Publish date</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <tbody class="text-secondary bg-light">

            <?php
            $sql =  $sql;
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $CourseID = $row['CourseID'];
                $timastand = $row['timastand'];
                $status = $row['status'];

                $datetime = new DateTime($timastand, timezone_open('asia/dhaka'));
                $date_format = $datetime->format('M d, Y');
                $post_dlt_url = 1;

                if ($status == "approved") {
                    $s_class = "success";
                } else {
                    $s_class = "warning";
                }
                $post_dlt_url = $root . '/dashboard/config/_delete.php?CourseID=' . $CourseID;
                $post_edit_url = $root . '/dashboard/update/?course=' . $CourseID;
                $course_url = $root . '/dashboard/course/?id=' . $CourseID;

            ?>
                <tr>

                    <td>
                        <a class="pointer text-decoration-none" onclick="redirectTo(`<?php echo $course_url ?>`)"><?php echo $row['course_title'] ?></a>
                    </td>
                    <td>৳<?php echo $row['price'] ?></td>
                    <td><?php echo $date_format ?></td>
                    <td class="">
                        <small class="bg-<?php echo $s_class ?> text-white p-1 fw-bold rounded"> <?php echo $row['status'] ?></small>
                    </td>

                    <td class="d-flex ">
                        <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded" onclick="return confirm(`Are you sure?`) && getFunc(`<?php echo $post_dlt_url ?>`)" style="cursor: pointer;" "><i class=" fa fa-trash text-danger" aria-hidden="true"></i></a>
                        <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded pointer" href="<?php echo $post_edit_url ?>"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                    </td>
                </tr>



            <?php



            //     echo '
            // <tr>

            //     <td >                
            //         <a class="pointer text-decoration-none" onclick="redirectTo(`' . $course_url . '`)">' . $course_title . '</a>
            //     </td>
            //     <td style="max-width:300px">' . $course_Description . '</td>
            //     <td >$' . $price . '</td>

            //     <td >' . $date_format . '</td>
            //     <td class="">
            //     <small class="bg-' . $s_class . ' text-white p-1 fw-bold rounded">' . $status . ' </small> 
            //     </td>

            //     <td class="d-flex ">
            //     <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $post_dlt_url . '`)"  style="cursor: pointer;" "><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
            //     <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded pointer" onclick="redirectTo(`' . $post_edit_url . '`)"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
            //     </td>
            // </tr>

            //     ';
            }

            ?>


        </tbody>
    </table>
<?php
}
?>