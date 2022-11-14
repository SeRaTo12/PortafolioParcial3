<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "myDB1";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }       
        $nombre=$_POST["nombre"];
        $email=$_POST["email"];
        $edad=$_POST["edad"];
        $a=0;
        $b=0;
        $c=0;
        $d=0;
        $e=0;
        
        for($i=1;$i<26;$i++){
            $valor = $_POST["q".$i];
            switch($valor){
                case 'a':
                    $a++;
                    break;
                case 'b':
                    $b++;
                    break;
                case 'c':
                    $c++;
                    break;
                case 'd':
                    $d++;
                    break;
                case 'e':
                    $e++;
                    break;
            }
        }
        echo "Resultados: <br>";
        echo "A: ".$a."<br>";
        echo "B: ".$b."<br>";
        echo "C: ".$c."<br>";
        echo "D: ".$d."<br>";
        echo "E: ".$e."<br>";
        if($a>$b && $a>$c && $a>$d && $a>$e){
            echo "<h3>Mayoría en A: </h3>";
            echo "<p>Tus actividades van encaminadas hacia los aspectos administrativos, económicos y de organización. Tu interés es generar riquezas mediante planeación de procedimientos, así como encaminar el logro de objetivos del algún grupo de personas. </p>";
            echo "<h3>Carreras relacionadas:</h3>";
            echo "<p> Contaduría Pública, Economía, Administración de Empresas, Mercadotecnia, Comercio Internacional, Ciencias Políticas, Derecho, Relaciones Industriales, Turismo.</p>";
            $respuesta = "A";
           
        }
        if($b>$a && $b>$c && $b>$d && $b>$e){
            echo "<h3>Mayoría de B: </h3>";
            echo "<p>Ser analítico es parte de tu esencia, el diseño y construcción de mecanismos para satisfacer necesidades es parte de tu interés ya que facilitarías la vida diaria. El manejo de materiales para crear algo original y que mejore los avances científicos. </p>";
            echo "<h3>Carreras relacionadas:</h3>";
            echo "<p> Ingeniería civil, Ingeniero Arquitecto, Ingeniería Industrial y de Sistemas, Ingeniería en Computación.</p>";
            $respuesta = "B";
            //$pdf->Cell(40, 10, 'Perfil: Analitico');
        }
        if($c>$b && $c>$a && $c>$d && $c>$e){
            echo "<h3>Mayoría de C: </h3>";
            echo "<p>El bienestar y la mejora de calidad de vida de otros es una de tus motivaciones para que las mismas puedan lograr una salud física y mental, la convivencia con la gente te permite conocer su comportamiento para llegar a un objetivo determinado. </p>";
            echo "<h3>Carreras relacionadas:</h3>";
            echo "<p>Enfermería, Pedagogía, Nutrición, Trabajo Social, Psicología, Sociología, Educación. </p>";
            $respuesta = "C";
            //$pdf->Cell(40, 10, 'Perfil: Salud Humana');
        }
        if($d>$b && $d>$c && $d>$a && $d>$e){
            echo "<h3>Mayoría de D: </h3>";
            echo "<p>Tu desarrollo se logrará cuando interactúes con seres vivos y organismos. Te interesa conocer cómo es el funcionamiento de diversas sustancias, si es necesario, buscar su equilibrio y restablecer el funcionamiento previo a una alteración. La modificación y preservación de componentes orgánicos y naturales son también parte de tu interés. </p>";
            echo "<h3>Carreras relacionadas:</h3>";
            echo "<p> Biología, Química, Ecología, Medicina, Veterinaria, Biotecnología, Ciencias Naturales.</p>";
            $respuesta = "D";
            //$pdf->Cell(40, 10, 'Perfil: Biología');
        }
        if($e>$b && $e>$c && $e>$d && $e>$a){
            echo "<h3>Mayoría de E: </h3>";
            echo "<p>Te apasiona todo aquello que se encuentra relacionado con el arte, la música, lo bello y lo estético. Es de suma importancia tu sensibilidad y tu imaginación. Para comunicar tus ideas y emociones utilizas tu creatividad de manera visual o auditiva pero siempre son atractivas. </p>";
            echo "<h3>Carreras relacionadas:</h3>";
            echo "<p>Diseño Ambiental, Arquitectura, Ciencias y técnicas de la Comunicación, Artes, Comunicación Gráfica.</p>";
            $respuesta = "E";
            //$pdf->Cell(40, 10, 'Perfil: Artistico');
        }

        
        $sql = "INSERT INTO preferencias(nombre, edad, email, respuesta) VALUES ('".$nombre."', '".$edad."','".$email."', '".$respuesta."')";
        if ($conn->query($sql) === TRUE) {
            echo "<br><br>New record created successfully<br>";
           
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        require('../fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40, 10, 'Perfil: Administrativo');
        /*$pdf->Cell(30,12,'Tus actividades van encaminadas hacia los aspectos administrativos, económicos y de organización. TU interés es generar riquezas mediante planeación de procedimientos, así como encaminar el logro de objetivos de algún grupo de personas');
        $pdf->Cell(30,14,'Carreras relacionadas: ');
        $pdf->Cell(30,16,'Contaduría Pública, Economía, Administración de Empresas, Mercadotecnia, Comercio Internacional, Ciencias Políticas, Derecho, Relaciones Industriales, Turismo.');*/
        $pdf->Output();
        $conn
    ?>
</body>
</html>