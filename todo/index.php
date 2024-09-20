<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="item1">
            <!--header here!-->
            <h1>To-do List Web</h1>
            <p>By: Ike Renson Landong</p>


        </div>
        <div class="item2">
            <h3>List a new task</h3>
            <form action="" method="post">
                <input type="text" placeholder="e.g. Do Homework" name="task_name"><br>
                <input type="submit" name="submit" value="Add">
            </form>


        </div>
        <div class="item3">
            <div class="sub1"><h2>To-Do:</h2></div>
            <div class="sub2">
            <?php 
               include "conn.php";
                  $sql = "SELECT * FROM task";
                  $result = mysqli_query($conn, $sql);

                  if($result){
                    if($result->num_rows > 0)
                    while($row = $result -> fetch_assoc()){
                        echo "<h4>" . $row["task_name"] . "</h4>";
                        echo "<br>";
                     }
                  } else {
                    echo "Error fetching tasks: " . mysqli_error($conn);
                  }
                ?>
                
            </div>

        </div>
    </div>
</body>
</html>

<?php
include "conn.php";

if(isset($_POST["submit"])){
    $task_name = $_POST["task_name"];


    if(empty($task_name)){
        echo "Please fill in the task name";
    }else{
        $sql = "INSERT INTO task (task_name) VALUES ('$task_name')";

        $result = mysqli_query($conn,$sql);
        if($result){
           header("location:index.php");
        }else{
            echo "Error adding task";
        }

    }  

}

?>