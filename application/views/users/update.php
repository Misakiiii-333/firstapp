<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1>Update User</h1>
        <!-- バリデータによって戻されたすべてのエラーメッセージを返します。
         メッセージがない場合、空の文字列を返します -->
        <?php echo validation_errors(); 
        
        
        //update.phpにてURLに記載されたidを受け取る。
        $user_id = isset($_GET['id']) ? $_GET['id'] : null;
        //取得したidを基に、userの情報をsqlで取得するためのSQLを用意
        $sql_query = "SELECT * FROM users WHERE id = $user_id";
        //DBに接続
        $connection = new mysqli("localhost:8111","root","","ci_firstapp");
        // $connection = new mysqli("first_name", "last_name", "email","phone_number");
        //SQLを実行し、結果をresult内に格納する
        $result= $connection->query($sql_query)->fetch_array();
        $connection->close();
    　　
        $result = $result->fetch_array();


        echo form_open('users/update'.$user['id']);
        
        ?>

        <!-- <button class="btn btn-outline-primary btn-sm"><a href="<?php //echo site_url("views/users/update.php?id=2"); ?>">update</a></button> -->

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
