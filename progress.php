<?php
    $connexion=new mysqli("localhost","root","","gestionrendezvous");
    if($connexion->connect_error){
        die("Connection Failed!".$connexion->connect_error);
    }
    
    $result = array('error'=>false);
    $action = '';
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }

    if($action == 'read'){
        $sql = $connexion->query("select * from user");
        $user = array();
        while($row = $sql->fetch_assoc()){
            array_push($user,$row);
        }
        $result['user']=$user;
    }
    if($action == 'create'){

        $nom =$_POST['nom'];
        $prenom =$_POST['prenom'];
        $age =$_POST['age'];
        $email =$_POST['email'];
        $telephone =$_POST['telephone'];
        $reference =$_POST['reference'];
        $password =$_POST['password'];

        $sql = $connexion->query("INSERT INTO `user`(`nom`, `prenom`, `age`, `email`, `telephone`, `reference`, `password`) VALUES ('$nom','$prenom',$age,'$email',$telephone,'$reference','$password')");
        
        if($sql){
            $result['message']="User added Successfully!";
        }else{
            $result['error'] = true;
            $result['message']= "Failed to add user!"; 
        }
    }
    if($action == 'update'){

        $id=$_POST['id'];
        $nom =$_POST['nom'];
        $prenom =$_POST['prenom'];
        $age =$_POST['age'];
        $email =$_POST['email'];
        $telephone =$_POST['telephone'];
        $reference =$_POST['reference'];
        $password =$_POST['password'];

        $sql = $connexion->query("UPDATE `user` SET `nom`='$nom',`prenom`='$prenom',`age`=$age,`email`='$email',`telephone`=$telephone,`reference`='$reference',`password`='$password' WHERE id=$id");
        
        if($sql){
            $result['message']="User updated Successfully!";
        }else{
            $result['error'] = true;
            $result['message']= "Failed to update user!"; 
        }
    }
    if($action == 'delete'){

        $id=$_POST['id'];

        $sql = $connexion->query("delete from user where id=$id");
        
        if($sql){
            $result['message']="User deleted Successfully!";
        }else{
            $result['error'] = true;
            $result['message']= "Failed to delete user!"; 
        }
    }

    echo json_encode($result);
?>