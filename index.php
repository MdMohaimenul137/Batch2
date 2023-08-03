<?php
require './database/connect.php';

$todos = $conn->quary("SELECT * FROM todos WHERE checked=0 ORDER BY id  DESC");

if (isset($_post['title'])){
    $title = $_POST['title'];
    if(!empty($title)){
        $stmt =$conn->prepare("INSERT INTO todos(title,date_time)VALUE(?, NOW())");
        header("Location:index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list</title>
    <style>
        body{
            background:white;
            padding:2px;
            margin: 10px;
        }
        ul.navbar{
            list.style-type:none;
            margin:0;
            padding:0;
            overflow:hidden;
        }
    </style>
</head>
<body>
    <ul class="navbar">

    <li><a href="index.php">Home</a> </li>
    <li><a href="auth\login.php">Login</a></li>
    <a href="auth\register.php">Registration</a>

    </ul>

    <div class="main-section">
        <div class="add-section">
            <form action="app/add.php" method="POST" autocomplete="off">
                <?php if(isset($_GET['mess']&& $_GET['mess']== 'error')){?>
                <input type="text" name="title" style="border-color: #ff6666"
                placeholder="This field is required"/>
                <button type="submit">Add &nbsp; <span>&#43;</span></button>
                <?php}?>
            </form>

        </div>
        <?php $todos=$conn->query("SELECT * FROM todos WHERE checked=0 ORDER BY id DESC");?>
        <div class="show-todo-section">
             <!-- show todo    -->
             <?php if ($todos->rowCount()<=0){?>
                <div class="todo-item">
                    <div class="empty">
                        <img src="img/f.png" alt="imgage" width="100%">
                        <img src="img/Ellipsis.gif" alt="gif" width="80px">

                    </div>

                </div>
                <?php } else {?>
                    <table id="todo-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Data Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($todos = $todos->fetch(PDO::FETCH_ASSOC)){?>
                            <tr>
                                <td><?php echo $todo['title']?></td>
                                <td><?php date('Y-md h:i A', strtotime($todo['date_time']));?></td>
                                <td>
                                    <span id="<?php echo $todo['id'];?>" class="remove-to-do">
                                    x
                                    </span>
                                </td>
                            </tr>
                            <?php}?>
                        </tbody>

                    </table>

                    <?php } ?>
            

        </div>

    </div>
</body>
</html>