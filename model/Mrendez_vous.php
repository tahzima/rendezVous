<?php
include_once __DIR__.'/../database/DB.php';

    class Mrendez_vous{
        function getSelect($ref){

            // $user = $_SESSION['user'][0]['reference'];

            $sql="SELECT * FROM `rendez-vous` WHERE `reference`= '$ref'";
//            die($sql);
            $query=DB::connect()->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        function save($date,$typeConsultation,$horaire,$reference){

            $sql='INSERT INTO `rendez-vous`(`date`, `typeConsultation`, `horaire`, `reference`) VALUES ("'.$date.'","'.$typeConsultation.'","'.$horaire.'", "'.$reference.'")';
            
            $query=DB::connect()->query($sql);
        }

        function edit($id){
   
            $sql="select * from `rendez-vous` where id=$id";

            $query=DB::connect()->query($sql);
            return $query->fetchAll();
        }

        function update($date,$horaire,$typeConsultation,$id){
           
            $sql="UPDATE `rendez-vous` SET date='$date',typeConsultation='$typeConsultation',horaire='$horaire' WHERE id = $id";
            // die($sql);
            $query=DB::connect()->query($sql);
        }

        function delete($id){

            $sql="delete from `rendez-vous` where id=$id";
            $query=DB::connect()->query($sql);
        }

        function horaire($date){
            $sql="SELECT  `horaire` FROM `rendez-vous` WHERE `date`= '$date'";

            $query=DB::connect()->query($sql);
            return $query->fetchAll();
            
        }
    }



?>