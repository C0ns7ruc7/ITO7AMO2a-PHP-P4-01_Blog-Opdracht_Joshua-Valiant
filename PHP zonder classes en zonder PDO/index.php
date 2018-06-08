<?php
include_once "partials/header.php";

$mysqli = new mysqli("localhost", "root", "", "php_database_simple");

$getTasks = 'SELECT * FROM tasklist';

$tasks = $mysqli->query($getTasks);

if(isset($_POST['add'])) {
    $sql = "INSERT INTO tasklist (titel, body, datum)
        VALUES ('" . $_POST["titel"] . "','" . $_POST["body"] . "','" . $_POST["datum"] . "')";
    $result = mysqli_query($mysqli, $sql);
    header("Refresh:0");
}

if(isset($_POST['delete'])) {
    mysqli_query($mysqli,"DELETE FROM tasklist WHERE id='".$_POST["task-id"]."'");
    header("Refresh:0");
}
?>

    <div class="body">
        <div class="create-task">
            <h1>Taak maken</h1>
            <form method="post" action="index.php" class="create-task__form">
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
            <h1>Takenlijst:</h1>
             <?php
                if($tasks->num_rows > 0){
                    while($row = $tasks->fetch_assoc()) {
                        ?>
                            <div class="task">
                                <p>Titel: <?php echo $row['titel']; ?></p>
                                <p>Omschrijving: <?php echo $row['body']; ?></p>
                                <p>Datum: <?php echo $row['datum']; ?></p>
                                <br/>
                                <form method="post" action="index.php" class="delele-task__form">
                                    <input class="task-id" name="task-id" type="hidden" value="<?php echo $row['id']; ?>">
                                    <input class="delete-task" name="delete" type="submit" value="Verwijder" />
                                </form>
                                <hr>
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