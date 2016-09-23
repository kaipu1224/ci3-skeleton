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
            <div class="_c-row _c-row--center">
                <div class="_c-row__col--1-3">
                    <table>
                        <tbody>
                            <tr>
                                <th>ユーザID：</th>
                                <td><input type="text" name="userid" id="userid" value="<?php echo $this->input->post("userid");?>"/></td>
                            </tr>
                            <tr>
                                <th>パスワード：</th>
                                <td><input type="password" name="password" /></td>
                            </tr>
                            <tr>
                                <td colspan=2 style="text-align:center;">
                                    <input type="submit" name="login_submit" value="ログイン" class="_c-btn">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php echo form_close();?>
    </div>
    <script>
        document.querySelector("#userid").focus();
    </script>
</body>
</html>