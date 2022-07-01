<?php
function articleTable($con, $sql) {
    ?>
    <table class="table bg-white border border-top-0" style="font-size: 13px;">
        <thead class="bg-white">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody class="text-secondary bg-light">

        <?php
            $sql =  $sql;
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $BlogID = $row['BlogID'];
                $blog_title = $row['blog_title'];
                $blog_desc = $row['blog_desc'];
                $UserID = $row['UserID'];
                $status = $row['status'];
                $timestand = $row['timestand'];
                $datetime = new DateTime($timestand,timezone_open('asia/dhaka'));
                $date_format = $datetime->format('M d, Y');

                if($status == "approved"){
                    $s_class = "success";
                    $a_form = '';
                }
                else{
                    $s_class = "warning";
                    $post_aprv_url = '/E-learning/admin/config/_approve.php?BlogID='.$BlogID;

                    $a_form = '
                    <a class="shadow-lg pull-left p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`'.$post_aprv_url.'`)"  style="cursor: pointer;" "><i class="fa fa-check text-primary" aria-hidden="true"></i></a>
                    ';
                }
                
                $sql2 = "SELECT * FROM `users` WHERE `UserID` =".$UserID;
                $result2 = mysqli_query($con, $sql2);
                $row2= mysqli_fetch_assoc($result2);
                $username = $row2['username'];
                $post_dlt_url = '/E-learning/admin/config/_delete.php?BlogID='.$BlogID;


                echo '
            <tr>
                <td>
                <a class="text-decoration-none text-bold" style="cursor: pointer;" onclick="redirectTo(`/E-learning/blog/article/?p='.$BlogID.'`)"  >'.$blog_title.'</a>
                </td>
                <td  >
                <a class="text-decoration-none text-bold" style="cursor: pointer;" onclick="redirectTo(`/E-learning/profile/?p='.$UserID.'`)">'.$username.'</a>
                </td>
                <td >'.$date_format.'</td>
                <td class="">
                <small class="bg-'.$s_class.' text-white p-1 fw-bold rounded">'.$status.' </small> 
                </td>

                <td class="d-flex ">
                <a class="shadow-lg mx-2 p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`'.$post_dlt_url.'`)"  style="cursor: pointer;" "><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
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