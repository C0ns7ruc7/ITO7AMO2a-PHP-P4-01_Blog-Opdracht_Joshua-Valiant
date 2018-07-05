<?php
/**
 * Created by PhpStorm.
 * User: Vabese
 * Date: 5-7-2018
 * Time: 9:12
 */
?>
<form method="post" action="partials/DB.php" class="create-task__form">
    <label class="form-label username-label">Gebruiker's naam:</label><br/>
    <input class="form-input username-input" type="text" name="username" placeholder="username"><br/></br>
    <label class="form-label password-label">wachtwoord:</label><br/>
    <input class="form-input password-input" type="password" name="password" placeholder="password"><br/></br>
    <input class="form-button" name="login" type="submit" value="Verzenden"/>
</form>
