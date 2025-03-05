<?php
if(isset($_POST['register'])){
$fname=$_POST['fname'];
$addres=$_POST['addres'];
$age=$_POST['age'];
$blood=$_POST['blood'];
$phone=$_POST['phone'];
if(!empty($fname) || !empty($address) || !empty($age) || !empty($blood) || !empty($phone)){
 
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="project";
    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_error()){
        die('connection Error(' .mysqli_connect_errno().')' . mysqli_connect_error());
    }
    else{
        $INSERT = "INSERT INTO registration (fname , addres ,age, blood, phone ) values (?,?,?,?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("ssiss" , $fname ,$addres ,$age,$blood,$phone);
        echo('succesfully registred');
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
    }
}
else{
    echo("All required");
    die();
}
}
?>