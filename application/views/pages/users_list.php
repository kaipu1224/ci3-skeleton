<?php echo form_open('users_list/do_post'); ?>
<div class="_c-row">
    <div class="_c-row__col">
        <h4><?php echo $title;?></h4>
    </div>
</div>
<hr>
<div class="_c-row">
    <div class="_c-row__col">
        <?php if(count($errors) > 0) { ?>
        <ul>
        <?php foreach($errors as $error){?>
            <li style="color:red;"><?=$error?></li>
        <?php } ?>
        </ul>
        <?php } ?>
        <table>
            <tbody>
                <tr>
                    <th>ユーザ名：</th>
                    <td><input type="text" name="name" value="<?php echo $this->input->post("name");?>"/></td>
                </tr>
            </tbody>
        </table>
        <input type="submit" class="c-btn" name="search" value="検索"></input>
        <input type="submit" class="c-btn" name="clear" value="クリア"></input>
        <?php if(count($results) > 0) : ?>
        <hr>
        <table class="search-result">
            <caption>
                検索結果：<?=count($results)?>件
            </caption>
            <details>
                <summary>下記条件での検索結果です。</summary>
                <p>ユーザ名(曖昧検索)：<?=$this->input->post("name")?></p>
            </details>
            <colgroup align="center">
                <col width="30"></col>
                <col width="120"></col>
                <col width=""></col>
                <col width="60"></col>
                <col width="60"></col>
            </colgroup>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>名前</th>
                    <th>権限</th>
                    <th>状態</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                foreach($results as $row) { 
                ?>
                <tr>
                    <td class="numeric"><?=$index ?></td>
                    <td><?=$row->id ?></td>
                    <td><?=$row->name ?></td>
                    <td><?=$row->permission ?></td>
                    <td><?=$row->is_valid ?></td>
                </tr>
                <?php
                    $index++;
                }
                ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <?php endif; ?>
    </div>
</div>

<?php echo form_close();?>