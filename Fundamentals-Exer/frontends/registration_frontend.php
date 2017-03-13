<?php /** @var  $city Data\City  */ ?>
<h1>Registration</h1>
<form method="post"></br>
    Username: <input type="text" name="username"/></br>
    Password: <input type="password" name="password"/></br>
    Confirm: <input type="password" name="confirm"/></br>
    Town: <select name="city_id">
                <?php foreach ($data->getCityes() as $city):;?>
                <option value="<?= $city->getId()?>"><?= $city->getName()?></option>
                <?php endforeach; ?>
            </select>
    <input type="submit" value="Registration" name="reg"/>
</form>