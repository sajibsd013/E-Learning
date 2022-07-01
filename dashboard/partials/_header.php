<header class="px-3 py-1 fixed-top border-bottom  navbar-white bg-white">
    <div class="">
        <div class="d-flex flex-wrap align-items-center justify-content-between ">
            <a id="NavMenuBar" onclick="SideMenuOpenClose()" class="navbar-brand nabMenuBar text-dark" style="cursor: pointer; display:none;">
                <i class="fa fa-bars"></i>
            </a>
            <h4 id="NavMenuBarBreand" class="navbar-brand py-2" style="cursor: pointer; display:inline-block;" onclick="redirectTo('<?php echo $root ?>/dashboard/')">
                <i class="fa fa-dashboard" aria-hidden="true"></i> dashboard
            </h4>

            <div class="d-flex ms-auto">
                <div class="mx-3">
                    <a class="btn btn-sm btn-outline-secondary mx-1" onclick="redirectTo('<?php echo $root ?>/')">
                        View Website
                    </a>
                    <a class="btn btn-sm btn-outline-secondary mx-1" onclick="logout()">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> Signout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="alert" class="alert alert-primary d-none my-0" role="alert">
        <span id="msg"></span>
    </div>
</header>



<div id="SideNavID" class="sideNav NavOpen mt-5 bg-white border">
    <div class="_nav_top">
        <a class="nav-menu-item pointer" onclick="redirectTo('<?php echo $root ?>/dashboard/')">
            <i class="fa fa-dashboard m-2"></i>Overview
        </a>
        <a class="nav-menu-item pointer" onclick="redirectTo('<?php echo $root ?>/dashboard/courses/')">
            <i class="fa fa-tasks m-2"></i>Courses
        </a>

        <a class="nav-menu-item " href="#">
            <i class="fa fa-bar-chart m-2" aria-hidden="true"></i>Charts
        </a>

        <a class="nav-menu-item " href="#">
            <i class="fa fa-question-circle m-2"></i>Help
        </a>
    </div>
    <div class="_nav_bottom">
        <a class="nav-menu-item pointer" onclick="redirectTo('<?php echo $root ?>/settings/')">
            <i class="fa fa-gear m-2"></i> Settings
        </a>
    </div>
</div>

<div id="ContentOverlayID" onclick="SideMenuOpenClose()" class="ContentOverlayOpen">
</div>