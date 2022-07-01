<div class="container">
    <?php
    $UserID = $_SESSION['userId'];
    $db = new DB();
    $sql_n = "SELECT * FROM `notifications` WHERE `n_to`= '$UserID' ORDER BY `timestand`";
    $c_n = $db->getCount($sql_n);
    $rows_n = $db->execute($sql_n);

    $sql_nc = "SELECT * FROM `notifications` WHERE `n_to`= '$UserID' AND `status`=0 ORDER BY `timestand` DESC";
    $c_nc = $db->getCount($sql_nc);

    $db->close();

    $url_d = $root . '/config/_notification.php?delete=1';

    ?>


    <div class="row">
        <div class=" mx-auto" style="max-width: 800px;">
            <div class="d-flex justify-content-between ">
                <h4 class="my-2">Notifications</h4>
                <div>
                    <button onclick="confirm('Are you sure') && getFunc('<?php echo $url_d  ?>')" class="btn btn-sm btn-danger ">Clear all</button>
                </div>

            </div>

            <ul class="list-group mt-3">
                <?php
                if ($c_n) {
                    foreach ($rows_n as $row_n) {
                        $timestand = $row_n['timestand'];
              
                        $time = timeFormat($timestand);

                        $url = $root . $row_n['path'];
                ?>
                        <li class="border-top list-group-item">
                            <a onclick="redirectTo('<?php echo $url  ?>')" class="pointer py-1 small d-flex link-dark text-decoration-none justify-content-between align-items-center">
                                <span><?php echo $row_n['content']  ?></span>
                                <span class="ms-2 text-muted text-end d-block" style="min-width: 100px;"><?php echo $time  ?></span>
                            </a>
                        </li>

                    <?php
                    }
                } else {
                    ?>
                    <li class="pointer list-group-item small text-muted text-center">
                        No Notifications
                    </li>

                <?php
                }
                ?>

            </ul>
        </div>
    </div>

</div>