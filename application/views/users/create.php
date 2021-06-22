
 <!-- データベースにデータを入力するには、
 保存する情報を入力するためのフォームを作成する必要がある。-->

<main role="main" class="flex-shrink-0"> 

<!-- flex-shrink:フレックスアイテムの縮み率を他のアイテムとの相対値（整数）で指定。初期値０ -->
<div class="container">
    <h1>Create New User</h1>
    <?php echo validation_errors(); ?>　
    <!-- バリデータ(バリデーションを行う機能)によって戻されたすべてのエラーメッセージを返す。 メッセージがない場合、空の文字列を返す。 -->

    <?php echo form_open('users/create'); ?>　
    <!-- このとき、usersは呼び出されるコントローラクラスを表し、createは呼び出されるメソッドを表す -->
    <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name">
    </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
        </div>
        <!-- hw1   add field Phone Number-->
        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter your phone number">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <?php echo form_close(); ?>
    </div>
</main>
