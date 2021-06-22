<!-- hw2 -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <h1>User Information</h1>
        <div class="row">
            <b>First Name: </b>
            <span><?php echo $user->first_name; ?></span>
        </div>
        <div class="row">
            <b>Last Name: </b>
            <span><?php echo $user->last_name; ?></span>
        </div>
        <div class="row">
            <b>Email: </b>
            <span><?php echo $user->email; ?></span>
        </div>
        <div class="row">
            <b>Phone Number: </b>
            <span><?php echo $user->phone_number; ?></span>
        </div>
    </div>
</main>
