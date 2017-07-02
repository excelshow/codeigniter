<!DOCTYPE html>
<?php $this->load->helper('url');?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>登录页面</title>
        <link rel="stylesheet" href="<?=base_url('/assets/css/style.default.css')?>" type="text/css" />
        <script type="text/javascript" src="<?=base_url('/assets/js/plugins/jquery-1.7.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('/assets/js/plugins/jquery-ui-1.8.16.custom.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('/assets/js/plugins/jquery.cookie.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('/assets/js/plugins/jquery.uniform.min.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('/assets/js/custom/general.js')?>"></script>
        <script type="text/javascript" src="<?=base_url('/assets/js/custom/index.js')?>"></script>
    </head>

    <body class="loginpage">
    <div class="loginbox">
        <div class="loginboxinner">

            <div class="logo">
                <h1 class="logo">小程序商城<span>后台管理</span></h1>
                <span class="slogan">thinkmoon</span>
            </div><!--logo-->

            <br clear="all" /><br />

            <div class="nousername">
                <div class="loginmsg">密码不正确.</div>
            </div><!--nousername-->

            <div class="nopassword">
                <div class="loginmsg">密码不正确.</div>
                <div class="loginf">
                    <div class="thumb"><img alt="" src="<?=base_url('/assets/images/thumbs/avatar1.png')?>" /></div>
                    <div class="userlogged">
                        <h4></h4>
                        <a href="index.html">Not <span></span>?</a>
                    </div>
                </div><!--loginf-->
            </div><!--nopassword-->
            <?php echo form_open('Login/check_admin'); ?>
                <div class="username">
                    <div class="usernameinner">
                        <input type="text" name="username" id="username" />
                    </div>
                </div>

                <div class="password">
                    <div class="passwordinner">
                        <input type="password" name="password" id="password" />
                    </div>
                </div>

                <button>登录</button>

                <div class="keep"><input type="checkbox" /> 记住密码</div>

            </form>

        </div><!--loginboxinner-->
    </div><!--loginbox-->


    </body>
    </html>