<?php 
    $data = $_POST;
    if(isset($data['yeah'])){
        var_dump($data);
    }  
?>
<!DOCTYPE html>
<html>
<head>
<script>
        var test = 15;

        document.getElementByID("test").value = test;
    </script>
    <style>
        #test{
            display:none;
        }
    </style>
</head>
<body>
    <form action="test.php" method="POST">
        <input id="test" name="test" visibility="hidden"></input>
        <button type="submit" name="yeah">submit</button>
    </form>
</body>
</html>