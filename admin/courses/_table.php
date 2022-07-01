<?php
function courseTable($con, $sql)
{
?>
    <table class="table bg-white border border-top-0" style="font-size: 13px;">
        <thead class="bg-white">
            <tr>
                <th scope="col">Course Title</th>
                <th scope="col">Description</th>
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
                $course_title = $row['course_title'];
                $timastand = $row['timastand'];
                $status = $row['status'];
                $price = $row['price'];
                $course_Description = $row['course_Description'];

                $datetime = new DateTime($timastand, timezone_open('asia/dhaka'));
                $date_format = $datetime->format('M d, Y');

                if ($status == "approved") {
                    $s_class = "success";
                    $a_form = '';
                } else {
                    $s_class = "warning";
                    $post_aprv_url = '/E-learning/admin/config/_approve.php?CourseID='.$CourseID;

                    $a_form = '
                    <a class="shadow-lg pull-left p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`'.$post_aprv_url.'`)"  style="cursor: pointer;" "><i class="fa fa-check text-primary" aria-hidden="true"></i></a>
                    ';
            
                }
                $post_dlt_url = '/E-learning/admin/config/_delete.php?CourseID='.$CourseID;



                echo '
            <tr>

                <td >' . $course_title . '</td>
                <td >' . $course_Description . '</td>
                <td >৳' . $price . '</td>

                <td >' . $date_format . '</td>
                <td class="">
                <small class="bg-' . $s_class . ' text-white p-1 fw-bold rounded">' . $status . ' </small> 
                </td>

                <td class="d-flex ">
                <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $post_dlt_url . '`)"  style="cursor: pointer;" "><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                 '.$a_form.'
                </td>
            </tr>

                ';
            }

            ?>


        </tbody>
    </table>
<?php
}
?>