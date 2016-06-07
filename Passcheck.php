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
            $_SESSION['username']=$_POST['username'];
            $_SESSION['wallet value']=$data['Wallet']
            session_write_close();
            header("Location: Usersplash.php");
                 exit;
                       }      
                    else{echo('Wrong Username/Password');
                        };    
                                          }    
                catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
                }
            }
            else{echo('Please enter a password');}
            //if no password
        }        
        else{echo('Please enter a username');}
        //if no username
    }
    else{echo('please enter a username and password');}
    ?>