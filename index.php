<?php
    //require "./db.php";
    require 'db.php';
    if ($isConnected){
        echo '<div style="color:green;">Connected</div>';
    } else {
        echo '<div style="color:red;">Connection failed</div>';
    }

    function listStudents(string $surname, string $command){
        $students = R::find("students","last_name LIKE ?",array($surname));
        if ($students){
            foreach($students as $student){ 
                $grade = R::findOne("grades","id = ?",array($student['grade']));
                $shanyrak = R::findOne("shanyraks","id = ?",array($student['shanyrak']));
                echo $student['last_name'].", ".$student['first_name'].", ".$grade->grade.$grade->letter.", ".$shanyrak['shanyrak']."<form action=\"record-violation.php\" method=\"GET\"><button class=\"confirm-student\" type=\"submit\" value=\"".$student['id']."\" name = \"".$command."\">Confirm</button></form>";
            }
        } else {
            echo '<div style="color:red;">Ученик не был найден</div>';
        }
    }
    
    $data = $_POST;
    $answer = $_GET;

    if(isset($data['send_late'])){
        try {
            $sql = $data['surname'];
            if ($data['surname'] != "")
                listStudents($sql, "send_late");
        } catch (Throwable $th) {
            echo $th;
        }
    }

    if(isset($data['send_card'])){
        try {
            $sql = $data['surname'];
            if ($data['surname'] != "")
                listStudents($sql, "send_card");
        } catch (Throwable $th) {
            echo $th;
        }
    }

    if(isset($data['send_latecard'])){
        try {
            $sql = $data['surname'];
            if ($data['surname'] != "")
                listStudents($sql, "send_latecard");
        } catch (Throwable $th) {
            echo $th;
        }
    }
    $response=file_get_contents("form.html");

    echo $response;
?>

