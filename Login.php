<!DOCTYPE HTML>
<html>
<body>
<form method ="post" action= "Passcheck.php">    
<input type ="text" name="username" value="">
<input type="text" name="password" value="">
<input type="submit" name="truesubmit" value="Log In">
</form> 
<!--   <?php
// if (!empty($_POST['truesubmit']) ){
//   if(!empty($_POST['username'])){
//     if (!empty($_POST['password'])){

//       try{require("connect.php");
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//       $stmt=$conn->prepare( "Select * FROM `Users` WHERE `Username`=:name AND  `Password`=:pass");
//       $stmt->bindParam(":name",$_POST['username']);
//     $stmt->bindParam(":pass",$_POST['password']);
//   $stmt->execute();
// $data=$stmt->fetch(PDO::FETCH_ASSOC);                    
//if (!empty($data)){
//       header("Location: usersplash.php");
//  exit;
//      }      
// else{echo('Wrong Username/Password');
//   };    
//                   }    
//    catch(PDOException $e) {
//     echo "Error: " . $e->getMessage();
//            }
//       }
//        else{echo('Please enter a password');}
//if no password
//    }        
//      else{echo('Please enter a username');}
//if no username
//    }
//  else{echo('please enter a username and password');}
//    ?> --> 
</body>
</html>