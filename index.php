<!DOCTYPE html>
<html>
    <head>
        <title>Web Applicatie J. Swaelen</title>
        <link rel="icon" type="image/png" href="img/favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Bangers|Oxygen" rel="stylesheet">
        <style>
            html{
                font-family: "Oxygen";
            }
            table{
                margin: auto;
                width: 100%;
            }
            th{
                font-family: "Bangers";
                color: rgba(144, 204, 144, 1);
                font-size: 50px;
                text-shadow: 2px 2px #000;
                letter-spacing: 2px;
            }
        </style>
    </head>
    <body>

        <?php
            include 'db_credentials.php';

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            // set the PDO error mode to exception

            $sql = "SELECT VakID, Leerkracht, VakNaam
                FROM Vakken;
            )";

            $result = $conn->query($sql);

            echo "<table>";
            echo "<tr><th>Vak-ID</th><th>Leerkracht</th><th>Naam vak</th></tr>";

            for($i=0; $i<$result->rowCount(); $i++) {
                $row = $result->fetch(PDO::FETCH_ASSOC);
                echo "<tr>";
                // VUL AAN zodat alle inhouden en tijdstippen worden getoond
                echo "<td>";
                print_r($row["VakID"]);
                echo "</td>";
                echo "<td>";
                print_r($row["Leerkracht"]);
                echo "</td>";
                echo "<td>";
                print_r($row["VakNaam"]);
                echo "</td>";
                echo "</tr>";
            }
        ?>

    </body>
</html>