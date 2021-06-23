<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1>Update User</h1>
        <!-- バリデータによって戻されたすべてのエラーメッセージを返します。
         メッセージがない場合、空の文字列を返します -->
        <?php echo validation_errors();   ?>

        <!-- <button class="btn btn-outline-primary btn-sm"><a href="<?php //echo site_url("views/users/update.php?id=2"); ?>">update</a></button> -->
        <?php echo form_open('users/update/' . $user->id); ?>
            <div class="form-group">
                <label for="name">First Name</label>
                <!-- 現在のユーザーデータをフォームに表示することができます。 -->
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>">
            </div>
            <!-- hw1 -->
            <!-- ユーザー作成用フォームに電話番号を追加 -->

            <div class="form-group">
                <label for="phone_number">Phone number</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $user->phone_number; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <?php echo form_close(); ?>
    </div>
</main>
