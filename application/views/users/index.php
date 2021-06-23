<main role="main" class="flex-shrink-0">
  <div class="container">
        <h1>List of User</h1>
        <?php $this->load->helper('form'); ?>
        <?php echo form_open('users/delete_multi'); ?>
        <table class="table table-striped table-hover">
      <!-- <tbody> に .table-striped を適用すると, 行の色を交互に変えることができます
      テーブルの行が <tbody> 内でホバー状態になるように .table-hover を追加できます。 -->

            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                    <th scope="row"><input type="checkbox" name="ids[]" value="<?php echo $user['id']; ?>" /></th>
                    <th scope="row"><?php echo $user["id"]; ?></th>
                    <td><?php echo $user["first_name"]; ?></td>
                    <td><?php echo $user["last_name"]; ?></td>
                    <td>

                        <button class="btn btn-primary btn-sm"><a href="<?php echo site_url("users/view/$user[id]"); ?>">View</a></button>
                        <button class="btn btn-outline-primary btn-sm onclick"><a href="<?php echo site_url("users/update/$user[id]"); ?>">Edit</a></button>
                        
                        <!-- deleteボタンを押したら確認メッセージ -->
                        <button class="btn btn-sm"><a onclick="return confirm('Are you sure to delete this user?')" href="<?php echo site_url("users/delete/$user[id]"); ?>">Delete</a></button>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all the selected users at once?')" >delete</button></a>
    <?php echo form_close(); ?>

  </div>
</main>
