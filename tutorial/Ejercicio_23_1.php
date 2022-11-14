<?php
    include 'library\conn.php';
    /*$servername = "localhost";
    $username = "root";
    $password = "";*/
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $nombres = array("juan", "jose", "Eduardo", "Enrique", "Pedro", "Francisco", "Aurora", "luis",
    "Alberto","Liliana");
    $apellidos = array("Estrada", "Medina", "Rodriguez", "Torres", "Melendez", "Gomez", "Guerrero",
    "Aguilar", "Alonso", "Perez");
    $correos = array("juan@example.com", "jose@example.com", "eduardo@example.com", "enrique@example.com",
    "pedro@example.com", "francisco@example.com", "augora@example.com", "luis@example.com", "alberto@example.com"
    , "liliana@example.com");
    
    for($i =0;$i<10;$i++){
        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('".$nombres[$i]."', '".$apellidos[$i]."','".$correos[$i]."')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>