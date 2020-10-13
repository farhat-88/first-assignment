<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
  
    $list_array2 = [];
    if(isset($_COOKIE['to-do'])){
        $cookies_decode = base64_decode($_COOKIE['to-do']);
        $un_array = unserialize($cookies_decode);
        $get_task = $_GET['task'];

        foreach ($un_array[$get_task] as $value3) {
            $list_array2[] = $value3;
            
        }
    }
?>

    <form method="post" class="first_div">
        <label>Task</label>
        <input type="text" name="task" value="<?php echo $list_array2[0]; ?>">
        <button type="submit" class="button" name="update"><i class="fas fa-save" style="margin-right:5px;"></i>SAVE</button>
     </form>

<?php
    if(isset($_POST['update'])){
        $cookies_decode = base64_decode($_COOKIE['to-do']);
        $un_array = unserialize($cookies_decode);

        $list_array2[0] = $_POST['task'];

        $un_array[$get_task] = $list_array2;

        $s_array = serialize($un_array);
        $cookies_encode = base64_encode($s_array);

        setcookie('to-do',$cookies_encode,time()+3600,'/');
        header("Location: index.php");
    }
   
?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</body>
</html>