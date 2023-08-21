<?php 
    
    require_once('include/init.php');
    if(session_status()== PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_GET['deleteid']))
    { 
         $id = $_GET['deleteid'];
        
         $result = delete_trainee($id);

         if($result === true)
         {
             
            $message = "Record successfully deleted";
            echo "<script type='text/javascript'>alert('$message');
            window.location.href='traineeinfo.php';</script>";
         }
         else
         {
             $errors= $result;
             $message = "Record fail to be deleted!\n".$errors; 
             $message = "Record successfully saved";
             echo "<script type='text/javascript'>alert('$message');
             window.location.href='javascript:history.back(0)';</script>";
         }
    }
    
?>