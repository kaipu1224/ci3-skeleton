<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        .errors {
            color:red;
        }
    </style>
</head>
<body>
    <div id="container">
        <h3>ログイン</h3>
        <?php echo form_open('login/login_validation'); ?>
            <?php if($auth_failed):?><span style="color:red;">ユーザIDまたはパスワードが違います。</span><?php endif;?>
            <ul><?php echo validation_errors('<li class="errors">','</li>'); ?></ul>
            <p>UserID: <?php echo form_input('userid', $this->input->post('userid')); ?></p>
            <p>Password:<?php echo form_password('password'); ?></p>
            <p><?php echo form_submit('login_submit', 'Login');?></p>
        <?php echo form_close();?>
    </div>
</body>
</html>