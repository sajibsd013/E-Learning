<header class="px-3 py-1 fixed-top border-bottom  navbar-white bg-white">
    <div class="">
        <div class="d-flex flex-wrap align-items-center justify-content-between ">
            <a id="NavMenuBar" onclick="SideMenuOpenClose()" class="py-2 nabMenuBar text-dark" style="cursor: pointer; display:none;">
                <i class="fa fa-bars"></i>
            </a>
            <h4 id="NavMenuBarBreand" class="navbar-brand text-secondary py-2" style="cursor: pointer; display:inline-block;" onclick="redirectTo('<?php echo $root ?>/')"> E-Learning
                <!-- <img src="/e-learning/assets/img/logo.jpg" alt="" class="img-fluid pb-3" style="max-width: 120px;" /> -->

            </h4>
            <div class="ms-5 d-none d-md-block">
                <a class="_nav_link pointer" onclick="redirectTo('<?php echo $root ?>/')">
                    Home
                </a>

                <a class="_nav_link pointer" onclick="redirectTo('<?php echo $root ?>/courses/')">
                    Courses
                </a>
                <a class="_nav_link pointer" onclick="redirectTo('<?php echo $root ?>/blog/')">
                    Blog
                </a>
                <a class="_nav_link pointer " href="#">
                    Contact
                </a>
                <a class="_nav_link pointer" href="#">
                    About
                </a>
            </div>

            <div class="d-flex ms-auto ">
            <div class="mx-2">
                    <form class="d-flex my-0 py-0" action="<?php echo $root ?>/search" method="GET">
                        <input class="form-control py-0  mx-1" name="q" type="search" placeholder="Search" aria-label="Search" list="search_option" onkeyup="setSearchOption(this)" />
                        <datalist id="search_option">
                            <option value="">Demo</option>

                        </datalist>
                        <button class="btn btn-outline-success btn-sm py-0" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>


                <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                    $user_name = $_SESSION["userName"];
                    $type = $_SESSION["type"];
                    $UserID = $_SESSION['userId'];


                ?>
                <div class="dropdown text-end ">

                    <?php
                    $db = new DB();
                    $sql_n = "SELECT * FROM `notifications` WHERE `n_to`= '$UserID' ORDER BY `timestand` DESC LIMIT 7";
                    $c_n = $db->getCount($sql_n);
                    $rows_n = $db->execute($sql_n);

                    $sql_nc = "SELECT * FROM `notifications` WHERE `n_to`= '$UserID' AND `status`=0 ORDER BY `timestand` DESC";
                    $c_nc = $db->getCount($sql_nc);

                    $db->close();

                    $url_n = $root . '/config/_notification.php?clear=1';


                    ?>

                    <a onclick="getFunc('<?php echo $url_n  ?>')" class="d-block link-dark text-decoration-none pointer" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell _menu_icon"></i>
                        <?php
                        if ($c_nc) {
                        ?>
                            <span class="text-white rounded _n_count" id="n_count"><?php echo $c_nc ?></span>

                        <?php
                        }

                        ?>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end my-2 shadow _Notification" aria-labelledby="dropdownUser1">
                        <h5 class="dropdown-header">Notifications</h5>
                        <?php
                        if ($c_n) {
                            foreach ($rows_n as $row_n) {
                                $timestand = $row_n['timestand'];
                                $time = timeFormat($timestand);

                                $url = $root . $row_n['path'];
                        ?>
                                <li class="border-top">
                                    <a onclick="redirectTo('<?php echo $url  ?>')" class="pointer small d-flex link-dark p-2 px-3 text-decoration-none justify-content-between align-items-center">
                                        <span><?php echo $row_n['content']  ?></span>
                                        <span class="ms-2 text-muted text-end d-block" style="min-width: 100px;"><?php echo $time  ?></span>
                                    </a>
                                </li>

                            <?php
                            }
                            ?>
                            <li onclick="redirectTo('<?php echo $root ?>/notifications')" class="pointer border-top small text-success p-1 px-3 text-center">
                                View all
                            </li>

                        <?php

                        } else {
                        ?>
                            <li class="pointer border-top small text-muted p-2 px-3 text-center">
                                No Notifications
                            </li>

                        <?php
                        }
                        ?>

                    </ul>
                </div>

                <div class="mx-2">
                    <a class="text-decoration-none text-dark pointer" onclick="redirectTo('<?php echo $root ?>/settings/')">
                        <i class="fa fa-gear _menu_icon"></i>
                    </a>
                </div>
                <div class="me-2">
                    <a class="text-decoration-none text-dark pointer" href="<?php echo $root ?>/chat/">
                        <i class="fa fa-comment _menu_icon" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle _menu_icon"></i>
                    </a>
                    <ul class="dropdown-menu text-small my-2" aria-labelledby="dropdownUser1">



                        <?php
                        if ($type == "admin") {
                        ?>
                            <li><a class="dropdown-item pointer" onclick="redirectTo(`<?php echo $root ?>/admin/`)">
                                    <i class="fa fa-dashboard" aria-hidden="true"></i>
                                    Admin Panel
                                </a>
                            </li>

                            <?php

                            if (isset($_SESSION['userId'])) {
                                $UserID = $_SESSION['userId'];
                                $sql2 = "SELECT * FROM `courses` WHERE `TeacherID`='$UserID'";
                                $query2 = mysqli_query($con, $sql2);
                                $num_row = mysqli_num_rows($query2);

                                $sql3 = "SELECT * FROM `moderators` WHERE `UserID`='$UserID'";
                                $query3 = mysqli_query($con, $sql3);
                                $num_row2 = mysqli_num_rows($query3);
                                if ($num_row || $num_row2) {
                            ?>

                                    <li><a class="dropdown-item pointer" onclick="redirectTo(`<?php echo $root ?>/dashboard/`)">
                                            <i class="fa fa-dashboard" aria-hidden="true"></i>
                                            Dashboard
                                        </a>
                                    </li>

                            <?php

                                }
                }

                            }
                            ?>
                            <li>
                                <a class="dropdown-item pointer" onclick="redirectTo(`<?php echo $root ?>/profile/?p=<?php echo $_SESSION['userId'] ?>`)">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    Profile
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item pointer" onclick="redirectTo('<?php echo $root ?>/settings/')">
                                    <i class="fa fa-gear" aria-hidden="true"></i>
                                    Settings</a>
                            </li>

                            <li>
                                <a class="dropdown-item pointer" onclick="redirectTo('<?php echo $root ?>/courses/cart.php')">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    My Cart
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" onclick="logout()">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    Sign out</a>
                            </li>
                    </ul>
                </div>
            <?php
                        } else {
            ?>
                <a class="btn btn-sm btn-outline-secondary mx-1" onclick="redirectTo('<?php echo $root ?>/auth/login')">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Signin</a>
                <a class="btn btn-sm btn-outline-secondary  mx-1" onclick="redirectTo('<?php echo $root ?>/auth/registration')">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    Signup</a>
            <?php

                        }
            ?>

            </div>
        </div>
    </div>
    <div id="alert" class="alert alert-primary d-none my-0" role="alert">
        <span id="msg"></span>
    </div>
</header>



<div id="SideNavID" class="sideNav NavOpen mt-5 bg-white border d-block d-md-none">
    <div class="_nav_top ">
        <a class="nav-menu-item pointer" onclick="redirectTo('<?php echo $root ?>/')">
            <i class="fa fa-home m-2"></i> Home
        </a>

        <a class="nav-menu-item pointer" onclick="redirectTo('<?php echo $root ?>/courses/')">
            <i class="fa fa-tasks m-2"></i> Courses
        </a>
        <a class="nav-menu-item pointer" onclick="redirectTo('<?php echo $root ?>/blog/')">
            <i class="fa fa-tasks m-2"></i> Blog
        </a>
        <a class="nav-menu-item pointer " href="#">
            <i class="fa fa-envelope m-2"></i> Contact
        </a>
        <a class="nav-menu-item pointer" href="#">
            <i class="fa fa-question-circle m-2"></i> About
        </a>
    </div>
    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {

    ?>
        <div class="_nav_bottom">
            <a class="nav-menu-item pointer" onclick="redirectTo('<?php echo $root ?>/settings/')">
                <i class="fa fa-gear m-2"></i> Settings
            </a>
        </div>
    <?php
    }
    ?>

</div>

<div id="ContentOverlayID" onclick="SideMenuOpenClose()" class="ContentOverlayOpen">
</div>