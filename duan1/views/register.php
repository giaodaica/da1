
<?php
session_start();
// print_r($_SESSION['cart']);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    /*
    @hiercelik - hiercelik.net
    @koalapix - koalapix.com
*/
    @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css);
    @import url(http://fonts.googleapis.com/css?family=Titillium+Web&subset=latin,latin-ext);
    @media (min-width: 768px) {
        .kpx_row-sm-offset-3 div:first-child[class*="col-"] {
            margin-left: 25%;
        }
    }

    body {
        font-family: 'Titillium Web', sans-serif;
    }

   
    a:hover {
        opacity: 0.8;
        color: #ff5400;
        text-decoration: none;
    }

    .kpx_login .kpx_authTitle {
        text-align: center;
        line-height: 300%;
    }

    .kpx_login .kpx_socialButtons a {
        color: white;
        opacity: 0.9;
    }

    .kpx_login .kpx_socialButtons a:hover {
        color: white;
        opacity: 1;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-facebook {
        background: #3b5998;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-facebook:hover {
        background: #172d5e
    }

    .kpx_login .kpx_socialButtons .kpx_btn-facebook:focus {
        background: #fff;
        color: #3b5998;
        border-color: #3b5998;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-twitter {
        background: #00aced;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-twitter:hover {
        background: #043d52
    }

    .kpx_login .kpx_socialButtons .kpx_btn-twitter:focus {
        background: #fff;
        color: #00aced;
        border-color: #00aced;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-google-plus {
        background: #c32f10;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-google-plus:hover {
        background: #6b1301
    }

    .kpx_login .kpx_socialButtons .kpx_btn-google-plus:focus {
        background: #fff;
        color: #c32f10;
        border-color: #c32f10
    }

    .kpx_login .kpx_socialButtons .kpx_btn-soundcloud {
        background: #ff8800;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-soundcloud:hover {
        background: #c73e04
    }

    .kpx_login .kpx_socialButtons .kpx_btn-soundcloud:focus {
        background: #fff;
        color: #ff8800;
        border-color: #ff8800
    }

    .kpx_login .kpx_socialButtons .kpx_btn-github {
        background: #666666;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-github:hover {
        background: #333333
    }

    .kpx_login .kpx_socialButtons .kpx_btn-github:focus {
        background: #fff;
        color: #666666;
        border-color: #666666
    }

    .kpx_login .kpx_socialButtons .kpx_btn-steam {
        background: #878787;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-steam:hover {
        background: #292929
    }

    .kpx_login .kpx_socialButtons .kpx_btn-steam:focus {
        background: #fff;
        color: #878787;
        border-color: #878787
    }

    .kpx_login .kpx_socialButtons .kpx_btn-pinterest {
        background: #cc2127;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-pinterest:hover {
        background: #780004
    }

    .kpx_login .kpx_socialButtons .kpx_btn-pinterest:focus {
        background: #fff;
        color: #cc2127;
        border-color: #cc2127
    }

    .kpx_login .kpx_socialButtons .kpx_btn-vimeo {
        background: #1ab7ea;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-vimeo:hover {
        background: #162221
    }

    .kpx_login .kpx_socialButtons .kpx_btn-vimeo:focus {
        background: #fff;
        color: #1ab7ea;
        border-color: #1ab7ea
    }

    .kpx_login .kpx_socialButtons .kpx_btn-lastfm {
        background: #c3000d;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-lastfm:hover {
        background: #5e0208
    }

    .kpx_login .kpx_socialButtons .kpx_btn-lastfm:focus {
        background: #fff;
        color: #c3000d;
        border-color: #c3000d
    }

    .kpx_login .kpx_socialButtons .kpx_btn-yahoo {
        background: #400191;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-yahoo:hover {
        background: #230052
    }

    .kpx_login .kpx_socialButtons .kpx_btn-yahoo:focus {
        background: #fff;
        color: #400191;
        border-color: #400191
    }

    .kpx_login .kpx_socialButtons .kpx_btn-vk {
        background: #45668e;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-vk:hover {
        background: #1a3352
    }

    .kpx_login .kpx_socialButtons .kpx_btn-vk:focus {
        background: #fff;
        color: #45668e;
        border-color: #45668e
    }

    .kpx_login .kpx_socialButtons .kpx_btn-spotify {
        background: #7ab800;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-spotify:hover {
        background: #3a5700
    }

    .kpx_login .kpx_socialButtons .kpx_btn-spotify:focus {
        background: #fff;
        color: #7ab800;
        border-color: #7ab800
    }

    .kpx_login .kpx_socialButtons .kpx_btn-linkedin {
        background: #0976b4;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-linkedin:hover {
        background: #004269
    }

    .kpx_login .kpx_socialButtons .kpx_btn-linkedin:focus {
        background: #fff;
        color: #0976b4;
        border-color: #0976b4
    }

    .kpx_login .kpx_socialButtons .kpx_btn-stumbleupon {
        background: #eb4924;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-stumbleupon:hover {
        background: #943019
    }

    .kpx_login .kpx_socialButtons .kpx_btn-stumbleupon:focus {
        background: #fff;
        color: #eb4924;
        border-color: #eb4924
    }

    .kpx_login .kpx_socialButtons .kpx_btn-tumblr {
        background: #35465c;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .kpx_login .kpx_socialButtons .kpx_btn-tumblr:hover {
        background: #142030
    }

    .kpx_login .kpx_socialButtons .kpx_btn-tumblr:focus {
        background: #fff;
        color: #35465c;
        border-color: #35465c
    }


    .kpx_login .kpx_loginOr {
        position: relative;
        font-size: 1.5em;
        color: #aaa;
        margin-top: 1em;
        margin-bottom: 1em;
        padding-top: 0.5em;
        padding-bottom: 0.5em;
    }

    .kpx_login .kpx_loginOr .kpx_hrOr {
        background-color: #cdcdcd;
        height: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    .kpx_login .kpx_loginOr .kpx_spanOr {
        display: block;
        position: absolute;
        left: 50%;
        top: -0.6em;
        margin-left: -1.5em;
        background-color: white;
        width: 3em;
        text-align: center;
    }

    .kpx_login .kpx_loginForm .input-group.i {
        width: 2em;
    }

    .kpx_login .kpx_loginForm .help-block {
        color: red;
    }


    @media (min-width: 768px) {
        .kpx_login .kpx_forgotPwd {
            text-align: right;
            margin-top: 10px;
        }
    }
</style>
<div class="container">


    <div class="kpx_login">
        <h3 class="kpx_authTitle">Login or <a href="#">Sign up</a></h3>


        <div class="row kpx_row-sm-offset-3 kpx_socialButtons">



        </div><br>
        <div class="row kpx_row-sm-offset-3 kpx_socialButtons">



        </div><br>
        <div class="row kpx_row-sm-offset-3 kpx_socialButtons">



        </div><br>
        <div class="row kpx_row-sm-offset-3 kpx_socialButtons">



        </div>

        <div class="row kpx_row-sm-offset-3 kpx_loginOr">
            <div class="col-xs-12 col-sm-6">
                <hr class="kpx_hrOr">
                <span class="kpx_spanOr">or</span>
            </div>
        </div>

        <div class="row kpx_row-sm-offset-3">
            <div class="col-xs-12 col-sm-6">
                <form class="kpx_loginForm" action="?act=post_register" autocomplete="off" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
                        <input id="username" type="text" class="form-control" name="username" placeholder="Username" <?php if (isset($autofocus)) {
                                                                                                            echo 'autofocus';
                                                                                                        } ?>>
                    </div>
                    <span id="eU" style="color: red;"><?php if (isset($errorUR)) {
                                                    echo $errorUR;
                                                } ?></span>    
                    <hr />
                                                                                                    
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" <?php if (isset($autofocus)) {
                                                                                                                echo 'autofocus';
                                                                                                            } ?> id="password">
                                                                                                            
                    </div>
                    <span id="eP" style="color: red;"><?php if (isset($errorPR)) {
                                                    echo $errorPR;
                                                } ?></span>
                    <!-- <span class="tag tag-danger">Password Error!</span> | <span class="tag tag-success">Login success!</span> | <span class="tag tag-warning">Some of password must not be empty!</span> -->
                    <hr />
                    
                    <span class="tag tag-danger"><a href="?act=login">Đăng Nhập</a></span>

                    <button class="btn btn-lg btn-outline-primary btn-block" type="submit"><i class="fa fa-sign-in"></i> Đăng Ký</button>
                </form>
            </div>
        </div>
        <!-- <div class="row kpx_row-sm-offset-3 kpx_socialButtons">
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
              <i class="fa fa-facebook fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
              <i class="fa fa-twitter fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div>  
          <div class="col-xs-2 col-sm-2">
            <a href="#" class="btn btn-lg btn-block kpx_btn-google-plus" data-toggle="tooltip" data-placement="top" title="Google Plus">
              <i class="fa fa-google-plus fa-2x"></i>
              <span class="hidden-xs"></span>
            </a>
          </div> 
    </div><br> -->
        <div class="row kpx_row-sm-offset-3">
            <div class="col-xs-12 col-sm-3">
                <p></p>
                <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="remember-me">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Remember me!</span>
                </label>
                </p>

            </div>
            <div class="col-xs-12 col-sm-3">
                <p class="kpx_forgotPwd">
                    <a href="#">Forgot password?</a>
                </p>
            </div>


        </div>
    </div>


                                                <div><a href="<?= BASE_URL ?>">Quay Lại Trang Chủ</a></div>

</div>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
     const username = document.getElementById("username");
    const eU = document.getElementById("eU");

    const phone = document.getElementById("password");
    const eP = document.getElementById("eP");


    // Kiểm tra Họ và Tên
    username.addEventListener("blur", () => {
        if (username.value.trim() === "") {
            eU.style.display = "block";
            eU.innerHTML = "Bạn không được để trống trường này";
        } else if (username.value.trim().length < 5) {
            eU.style.display = "block";
            eU.innerHTML = "Tài khoản phải từ 6 ký tự";
        } 
         else {
            eU.style.display = "none";
        }
    });
    username.addEventListener("focus", () => {
        eU.style.display = "none";
    });

    password.addEventListener("blur", () => {
        if (password.value.trim() === "") {
            eP.style.display = "block";
            eP.innerHTML = "Bạn không được để trống trường này";
        } else if (Psername.valPe.trim().length < 5) {
            eP.style.display = "block";
            eP.innerHTML = "Mật khẩu phải từ 6 ký tự";
        } 
         else {
            eP.style.display = "none";
        }
    });
    password.addEventListener("focus", () => {
        eU.style.display = "none";
    });
    

</script>