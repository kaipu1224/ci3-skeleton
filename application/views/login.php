<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/basis.min.css"> 
    <style>
        .errors {
            color:red;
        }
    </style>
</head>
<body>
    <div class="_c-container">
        <?php echo form_open('login/login_validation'); ?>
            <ul><?php echo validation_errors('<li class="errors">','</li>'); ?></ul>
            <?php if($auth_failed):?><span style="color:red;">ユーザIDまたはパスワードが違います。</span><?php endif;?>
            <h4>ログイン画面</h4>
            <hr>
            <div class="_c-row _c-row--middle">
                <div class="_c-row__col--1-3" style="text-align:right">ユーザID：</div>
                <div class="_c-row__col--1-3"><?php echo form_input('userid', $this->input->post('userid')); ?></div>
            </div>
            <div class="_c-row _c-row--middle">
                <div class="_c-row__col--1-3" style="text-align:right">パスワード：</div>
                <div class="_c-row__col--1-3"><?php echo form_password('password'); ?></div>
            </div>
            <br/>
            <div class="_c-row _c-row--middle">
                <div class="_c-row__col--1-3"></div>
                <div class="_c-row__col--1-3">
                    <input type="submit" name="login_submit" value="ログイン" class="_c-btn">
                </div>
            </div>
        <?php echo form_close();?>
    </div>
</body>
</html>