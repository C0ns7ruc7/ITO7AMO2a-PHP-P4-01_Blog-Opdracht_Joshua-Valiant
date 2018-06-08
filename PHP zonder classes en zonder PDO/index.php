<?php
include_once "partials/header.php";

$mysqli = new mysqli("localhost", "root", "", "php_database_simple");

$getTasks = 'SELECT * FROM tasklist';

$tasks = $mysqli->query($getTasks);

if(isset($_POST['add'])){
    $sql = "INSERT INTO tasklist (titel, body, datum)
        VALUES ('".$_POST["titel"]."','".$_POST["body"]."','".$_POST["datum"]."')";
    $result = mysqli_query($mysqli,$sql);
}
?>

    <div class="body">
        <div class="create-task">
            <h1>Taak maken</h1>
            <form method="post" class="create-task__form">
                <label class="form-label titel-label">Titel:</label><br/>
                <input class="form-input titel-input" type="text" name="titel" placeholder="Titel"><br/><br/>
                <label class="form-label beschrijving-label">Omschrijving:</label><br/>
                <textarea class="form-input omschrijving-input" name="body" placeholder="Omschrijving"></textarea><br/><br/>
                <label class="form-label datum-label">Datum:</label><br/>
                <input class="form-input datum-input" type="date" name="datum" placeholder="Datum"><br/></br>
                <input class="form-button" name="add" type="submit" value="Verzenden"/>
            </form>
        </div>
        <div class="tasks">
             <?php
                if($tasks->num_rows > 0){
                    ?>
                        <h1>Takenlijst:</h1>
                    <?php
                    while($row = $tasks->fetch_assoc()) {
                        ?>
                            <div class="task">
                                <p>Titel: <?php echo $row['titel']; ?></p>
                                <p>Omschrijving: <?php echo $row['body']; ?></p>
                                <p>Datum: <?php echo $row['datum']; ?></p>
                            </div>
                        <?php
                    }
                } else {
                    echo 'Er zijn nog geen taken gemaakt';
                }
             ?>
        </div>
    </div>

<?php
include_once "partials/header.php";
?>