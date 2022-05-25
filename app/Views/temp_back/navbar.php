<?php
$dprofile=$konfig['dataProfile'];
$profilename=isset($dprofile->profilename)?($dprofile->profilename):'';
$profileimg=isset($dprofile->profileimg)?($dprofile->profileimg):'';
$levelname=$konfig['levelname'];
?>
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="white">
        <?php $img1=$konfig['logo_admin'];
        if ($img1!='') {
            $img_1=''.base_url().'/public/theme/images/'.$img1.'';
        } else {
            $img_1='';
        }
        ?>
        <a href="#" class="logo text-white">
            <img src="<?= $img_1; ?>"
                alt="Logo"
                class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
            data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <?php $img2=$profileimg;
                    if ($img2!='') {
                        $img_2=''.base_url().'/public/theme/images/user/'.$img2.'';
                    } else {
                        $img_2=''.base_url().'/public/theme/images/user/img_not.png';
                    }
                    ?>
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="<?= $img_2?>"
                                alt="Avatar" class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img
                                            src="<?= $img_2?>"
                                            alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4><?= $profilename; ?>
                                        </h4>
                                        <p class="text-muted"><?= $levelname; ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="<?= site_url('profile')?>">My
                                    Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="<?= site_url('profile/new_password')?>">New
                                    Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="<?= site_url('logout')?>">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>