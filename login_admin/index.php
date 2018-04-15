<?php  
function my_login_style() { ?>
    <style type="text/css">
        body{
            background: url(<?php echo get_bloginfo('url'); ?>/wp-content/plugins/teachyourself/login_admin/background.jpg)    !important;
            background-size: cover !important;
        }
        #login{
            width: 500px !important;
            padding-top: 0px !important;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_bloginfo('url'); ?>/wp-content/plugins/teachyourself/login_admin/logo.png);
            padding-bottom: 30px;
            background-size: 190px;
            width: 300px;
            height: 150px;
            pointer-events: none;
   			cursor: default;
            
        }
        a {
            color: #0572ba;
        }
        a:focus,
        a:hover {
            text-decoration: underline;
        }

        #login {
            padding: 0;
        }
        .login h1{
            padding-top: 40px;
        }
        .login h2 {
            padding: 12px;
            text-transform: uppercase;
            font-size: 15px;
            text-align: center;
            color: #fff;
        }
        .login form {
            margin-top: 0;
            border: #0572ba 1px solid;
            background: rgba(255,255,255,0.8) !important;
            padding-bottom: 60px !important;
        }
        .login #nav{
            margin:0 !important;
            margin-top: -35px !important;
            float: left;
            width: 200px;
        }
        .login #backtoblog{
            margin:0 !important;
            margin-top: -35px !important;
            float: right;
            width: 200px;
            text-align: right !important;
        }
        .login label {
            color: #0572ba;
        }
        .login #login_error,
        .login .message {
            border: #0572ba 1px solid;
            margin: 2px 0;
            background: rgba(255,255,255,0.8) !important;
            
        }
        .login form .input,
        .login form input[type="checkbox"],
        .login input[type="text"] {
            color: #0572ba;
            background: rgba(255,255,255,0.6) !important;
        }
        .login #backtoblog,
        .login #nav {
            padding: 0;
            text-align: left;
            
        }
        .login #backtoblog a,
        .login #nav a {
            color: #0572ba;
            font-weight: bold;
        }
        .login .button-primary {
            background-color: #0572ba;
            border-color: #0572ba;
        }
        .login .button-primary:focus,
        .login .button-primary:hover {
            background-color: #0572ba;
            border-color: #0572ba;
        }
        .login form .input:focus, .login input[type="text"]:focus {
            border-color: #0572ba;
        }
        #login_error{
            background: #eff0f1 !important;
            color: red;
            border:1px solid #eff0f1;
        }
        #login_error a{

        }
        @media screen and (max-width:500px){
            #login{
                width: 90% !important;
            }
            #login h1 a, .login h1 a {
                padding-bottom: 30px;
                background-size: 150px;
                width: 200px;
                height: 80px;
                pointer-events: none;
                cursor: default;
                
            }
            .login #backtoblog,
            .login #nav {
                padding: 0;
                text-align: center !important;
                clear: both;
                width: 90% !important;
            }
            .login #backtoblog{
                margin-top: -50px !important;
                padding-left: 10px;
            }
            .login #nav {
                 margin-top: -25px !important;
            }
            
        }
       
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_style');



