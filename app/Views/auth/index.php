<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
    <?php $img3=$konfig['logo'];
    if ($img3!='') {
        $img_3=''.base_url().'/public/theme/images/'.$img3.'';
    } else {
        $img_3='';
    }
    ?>
    <img class="text-white pb-4" src="<?= $img_3;?>" alt="Logo" style="width:80%">
    <!--h1 class="title fw-bold text-white mb-3"></h1-->
    <!--p class="subtitle text-white op-7"></p-->
    <script>
        var lding ="<img src='<?= base_url();?>/public/theme/images/loader/loadingblue.gif'>";
    </script>
</div>
<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
    <div class="container container-login container-transparent animated fadeIn">
        <?php $img4=$konfig['logo_login'];
        if ($img4!='') {
            $img_4=''.base_url().'/public/theme/images/'.$img4.'';
        } else {
            $img_4='';
        }
        ?>
        <h3 class="text-center"><img class="text-white pb-4" src="<?= $img_4;?>" alt="Logo" style="max-width:140px;margin:0 auto;"><br>Sign In To App</h3>
        <div id="msg_res"></div>
        <form id="formlogin" method="POST" action="javascript:login()">
            <div class="login-form">
                <div class="form-group">
                    <label for="username" class="placeholder"><b>Username</b></label>
                    <input id="username" name="username" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control" required>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mt-3" id="msg"></div>
                        </div>
                        <div class="col-md-5">
                            <button type="submit" class="btn btn-primary btn-block float-right mt-3 mt-sm-0 fw-bold">Sign In</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

</div>