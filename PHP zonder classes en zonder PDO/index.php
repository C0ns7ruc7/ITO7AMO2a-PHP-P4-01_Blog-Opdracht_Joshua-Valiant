<?php
include_once "partials/header.php";
?>

    <div class="body">
        <div class="create-task">
            <form class="create-task__form">
                <label class="form-label titel-label">Titel:</label><br/>
                <input class="form-input titel-input" type="text" name="titel" placeholder="Titel"><br/><br/>
                <label class="form-label beschrijving-label">Omschrijving:</label><br/>
                <textarea class="form-input omschrijving-input" placeholder="Omschrijving"></textarea><br/><br/>
                <label class="form-label datum-label">Datum:</label><br/>
                <input class="form-input datum-input" type="date" name="datum" placeholder="Datum"><br/></br>
                <input class="form-button" type="submit" value="Verzenden"/>
            </form>
        </div>
    </div>

<?php
include_once "partials/header.php";
?>