<?php
session_start();
    if (!empty($_POST['truesubmit']) ){
        if(!empty($_POST['username'])){
            if (!empty($_POST['password'])){
                try{require("connect.php");
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt=$conn->prepare( "Select * FROM `Users` WHERE `Username`=:name AND  `Password`=:pass");
                    $stmt->bindParam(":name",$_POST['username']);
                    $stmt->bindParam(":pass",$_POST['password']);
                    $stmt->execute();
                    $data=$stmt->fetch(PDO::FETCH_ASSOC);                    
           if (!empty($data)){
               //echo ('god knows why');
            if ($data['UserID']<=999){
                $_SESSION['adminloggedin']=13484;
                session_write_close();
                header("Location: adminsplash2.php");
                exit();
            }
            else{
                $_SESSION['username']=$_POST['username'];
                $_SESSION['walletvalue']=$data['Wallet'];
                $_SESSION['userid']=$data['UserID'];
                session_write_close();
                header("Location: usersplash2.php");
            }
            }
                    else{
                        header("Location: login2.php");
                    }    
                                          }   
                           catch(PDOException $e) {
     echo "Error: " . $e->getMessage();               } 
            }
            else{
           header("Location: login2.php");
            }
            }                    //if no password

        else{
        header("Location: login2.php");
        }
        }        //if no username

    else{
        header("Location: login2.php");
    }
    ?>
