<?php
session_start();
?>
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
<div class="first_div">
    <h2>TO DO LIST</h2>
    
        <p class="task">Add Your Tasks</p>
<?php
    $list_array = [];
  
    if(isset($_POST['add'])){
		$list_array['done-task'] = $_POST['add-task'];
       
    
     if(empty($_COOKIE['to-do']) && !isset($_COOKIE['to-do'])){
           $new_array[] = $list_array;

            $s_array = serialize($new_array);
            $cookies_encode = base64_encode($s_array);
            
            setcookie('to-do',$cookies_encode,time()+3600,'/');
            header("Location: index.php");
        }
        else{
            
            $cookies_decode = base64_decode($_COOKIE['to-do']);
            $un_array = unserialize($cookies_decode);

            $un_array[] = $list_array;
            
            $s_array = serialize($un_array);
            $cookies_encode = base64_encode($s_array);

            setcookie('to-do',$cookies_encode,time()+3600,'/');
            header("Location: index.php");
        }
		
      }
        
    

?>   
   
    
    <form method="post">
        <label>Task</label>
        <input type="text" name="add-task">
        <button type="submit" class="button" name="add"><i class="fas fa-plus-circle" style="margin-right:5px;"></i>ADD TASK</button>
      
    </form>
  

<?php
    if(isset($_COOKIE['to-do'])){
        
        $cookies_decode = base64_decode($_COOKIE['to-do']);
        $un_array = unserialize($cookies_decode);
        ?>
        <div>
        <?php
        foreach ($un_array as $key => $value) {
            ?>
            <p style="color:blue; padding:10px;">
            <?php
            foreach ($value as $value2) {
                echo $value2;
			  ?>
                 
                <a class="btn" href="edit.php?task=<?php echo $key; ?>"><i class="fas fa-edit"></i></a>
                <a class="btn" href="delete.php?task=<?php echo $key; ?>"><i class="fas fa-trash-alt"></i></a>
            
        <?php
              break; 
            }
		?>
		</p>
        <?php
        }
        ?>
        </div>
      <?php
        }
?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</body>
</html>