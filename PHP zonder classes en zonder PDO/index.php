<?php
include_once "partials/header.php";
include_once "partials/DB.php";

if(isset($_POST['add'])) {
    makeTask($mysqli);
}
if(isset($_POST['edit'])) {
    $edit = editTask($mysqli);
}
if(isset($_POST['update'])) {
    $update=updateTask($mysqli);
}
if(isset($_POST['delete'])) {
    deleteTask($mysqli);
}
?>

    <div class="body">

        <?php if(isset($_POST['edit'])){
            if($edit->num_rows > 0){
                if($row = $edit->fetch_assoc()) {
                    ?>
                        <div class="create-task">
                            <h1>Taak bewerken</h1>
                            <form method="post" action="index.php" class="create-task__form">
                                <label class="form-label titel-label">Titel:</label><br/>
                                <input class="form-input titel-input" type="text" name="titel" placeholder="Titel" value="<?php echo $row['titel']; ?>"><br/><br/>
                                <label class="form-label beschrijving-label">Omschrijving:</label><br/>
                                <textarea class="form-input omschrijving-input" name="body" placeholder="Omschrijving"><?php echo $row['body']; ?></textarea><br/><br/>
                                <label class="form-label datum-label">Datum:</label><br/>
                                <input class="form-input datum-input" type="date" name="datum" placeholder="Datum" value="<?php echo $row['datum']; ?>"><br/></br>
                                <input class="task-id" name="task-id" type="hidden" value="<?php echo $row['id']; ?>">
                                <input class="form-button" name="update" type="submit" value="Verzenden"/>
                            </form>
                        </div>
                    <?php
                }
            }
        }else{ ?>
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
        <?php }?>
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
                                <form method="post" action="index.php" class="delele-task__form">
                                    <input class="task-id" name="task-id" type="hidden" value="<?php echo $row['id']; ?>">
                                    <input class="delete-task" name="edit" type="submit" value="edit" />
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