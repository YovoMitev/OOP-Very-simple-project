<?php if(!empty($_SESSION['userId'])): ;?>
    <h1>Welcome , <?=$user->getUsername() . " from " . $user->getCity() ?></h1>
<?php else:;?>
    <?php header("Location: login.php") ?>
<?php endif; ?>

<h2>Edit User Information</h2>
<form method="post" id="editUserForm">
    Username: <input type="text" name="newUsername" value="<?= $user->getUsername() ?>"/></br>
    Password: <input type="password" name="newPassword" value="<?= $user->getPassword() ?>"/></br>
    <input type="submit" name="EditUser" value="Edit"/>
</form>

<h2>Logout:</h2>
<form method="post">
    <label for="logout user">
        <input type="submit" name="logout" value="Logout"/>
    </label>
</form>

