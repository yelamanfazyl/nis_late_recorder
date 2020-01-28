<?php
    //require "./db.php";
    require 'db.php';
    $isConnected = R::testConnection();
    if ($isConnected){
        $answer = $_GET;
        if(isset($answer['send_late'])){
            try {
                $student_id = $answer['send_late'];
                $student = R::findOne("students","id = ?",array($student_id));
                $student->late = $student->late + 1;
                $success = R::store($student);
                if($success){
                    http_response_code('200');
                    header('Location: '."index.php");
                    exit;
                } else {
                    http_response_code('500');
                }            
            } catch (exception $th) {
                echo $th;
                http_response_code('500');
            }
            
        }
        if(isset($answer['send_card'])){
            try {
                $student_id = $answer['send_card'];
                $student = R::findOne("students","id = ?",array($student_id));
                $student->no_card = $student->no_card + 1;
                $success = R::store($student);
                if($success){
                    http_response_code('200');
                    header('Location: '."index.php");
                    exit;
                } else {
                    http_response_code('500');
                }            
            } catch (exception $th) {
                echo $th;
                http_response_code('500');
            }
            
        }
        if(isset($answer['send_latecard'])){
            try {
                $student_id = $answer['send_latecard'];
                $student = R::findOne("students","id = ?",array($student_id));
                $student->no_card = $student->no_card + 1;
                $student->late = $student->late + 1;
                $success = R::store($student);
                if($success){
                    http_response_code('200');
                    header('Location: '."index.php");
                    exit;
                } else {
                    http_response_code('500');
                }
                exit;
            } catch (Throwable $th) {
                echo $th;
                http_response_code('500');
            }
            
        }
    } else {
        http_response_code('500');
    }
?>