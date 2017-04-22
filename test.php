<!DOCTYPE html>
<html>
    <head>
        <title>Web Applicatie J. Swaelen</title>
        <link rel="icon" type="image/png" href="img/favicon.ico" />
        <link href="https://fonts.googleapis.com/css?family=Bangers|Oxygen" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/pure/0.6.0/pure-min.css">
        <style>
            html{
                font-family: "Oxygen";
            }
            table{
                margin: auto;
                width: 100%;
            }
            form{
                margin: 1em auto;
                text-align: center;
            }
            th, h1{
                font-family: "Bangers";
                color: rgba(144, 204, 144, 1);
                font-size: 50px;
                letter-spacing: 2px;
            }
            th{
                color: #444;
                font-size: 1.2em !important;
            }
            h1{
                text-align: center;
                text-shadow: 2px 2px #000;
            }
            a{
                border: solid 0.05em #999;
                border-radius: 25px;
                background-color: #CCC;
                cursor: default;
                text-decoration: none;
                color: #000;
                padding: 0.2em 0.5em;
            }
            .center > a{
                display: table;
                margin: 1em auto;
                max-width: 40%;
                max-height: 40%;
                min-width: 30%;
                min-height: 30%;
                width: auto;
                height: auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Geef hieronder je naam in</h1>
            <form method="post" action="">
                <input type="text" name="naamLeerling" />
                <input type="submit" name="submit" value="Verifieer via naam!" />
                <br>
            </form>
            <div class="center">
                <a href="test.php?maandag=true">Maandag</a>
                <a href="test.php?dinsdag=true">Dinsdag</a>
                <a href="test.php?woensdag=true">Woensdag</a>
                <a href="test.php?donderdag=true">Donderdag</a>
                <a href="test.php?vrijdag=true">Vrijdag</a>
            </div>
        </div>

        <?php
            /* Hier wordt gecontroleerd of de ingegeven naam in
            de tabel met leerlingen staat */
            
            if (isset($_POST['naamLeerling'])) {
                controleerNaamLeerling();
            }

            function controleerNaamLeerling() {
                $naamLeerling = $_POST['naamLeerling'];
                echo '<h1>Ingegeven naam is: '.$naamLeerling.'</h1>';

                $link = mysqli_connect("localhost", "uurrooster", "uurrooster123", "Uurrooster-Web-App");
                $check = $link->query("SELECT KlasNaam, LeerlingNaam FROM Leerling WHERE LeerlingNaam LIKE '%{$naamLeerling}%'");
                
                if($check->num_rows == 0) {
                    echo "<h1>Naam niet gevonden</h1>";
                } else {
                    echo "<h1>Naam gevonden</h1>";
                }

                $query2 = "SELECT KlasNaam, LeerlingNaam FROM Leerling WHERE LeerlingNaam LIKE '%{$naamLeerling}%'";
                $resultaat = mysqli_query($link, $query2);
                $row2 = mysqli_fetch_row($result);

                if(strpos($row2[0], '6ITN') !==false) {
                    echo '<h1>Deze leerling zit in 6ITN</h1>';
                } else {
                    echo '<h1>Deze leerling zit in 5ITN</h1>';
                }
            }

            /* Hier worden de uurroosters afgeprint */

            if (isset($_GET['maandag'])) {
                geefUurroosterMaandag6ITN();
            }
            if (isset($_GET['dinsdag'])) {
                geefUurroosterDinsdag6ITN();
            }
            if (isset($_GET['woensdag'])) {
                geefUurroosterWoensdag6ITN();
            }
            if (isset($_GET['donderdag'])) {
                geefUurroosterDonderdag6ITN();
            }
            if (isset($_GET['vrijdag'])) {
                geefUurroosterVrijdag6ITN();
            }

            function geefUurroosterMaandag6ITN() {
                $link = mysqli_connect("localhost", "uurrooster", "uurrooster123", "Uurrooster-Web-App");

                $query = "SELECT VakID, Leerkracht, VakNaam FROM Vakken";

                if ($result = mysqli_query($link, $query)) {
                    echo "<table class='pure-table'>";
                    echo "<tr><th>Uur</th><th>Vak</th><th>Leerkracht</th></tr>";

                    mysqli_data_seek($result, 0);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 8.25u-9.15u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 0);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 9.15u-10.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";
                    
                    mysqli_data_seek($result, 1);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 10.15u-11.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 2);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 11.05u-11.55u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 3);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 12.45u-13.35u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 4);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 13.35-14.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 5);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 14.35-15.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    /* free result set*/
                    mysqli_free_result($result);
                }

                $link->close();
            }
            function geefUurroosterDinsdag6ITN() {
                $link = mysqli_connect("localhost", "uurrooster", "uurrooster123", "Uurrooster-Web-App");

                $query = "SELECT VakID, Leerkracht, VakNaam FROM Vakken";

                if ($result = mysqli_query($link, $query)) {
                    echo "<table class='pure-table'>";
                    echo "<tr><th>Uur</th><th>Vak</th><th>Leerkracht</th></tr>";

                    mysqli_data_seek($result, 6);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 8.25u-9.15u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 6);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 9.15u-10.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";
                    
                    mysqli_data_seek($result, 7);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 10.15u-11.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 5);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 11.05u-11.55u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 8);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 12.45u-13.35u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 9);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 13.35-14.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 10);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 14.35-15.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 10);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 15.25-16.15u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    /* free result set*/
                    mysqli_free_result($result);
                }

                $link->close();
            }
            function geefUurroosterWoensdag6ITN() {
                $link = mysqli_connect("localhost", "uurrooster", "uurrooster123", "Uurrooster-Web-App");

                $query = "SELECT VakID, Leerkracht, VakNaam FROM Vakken";

                if ($result = mysqli_query($link, $query)) {
                    echo "<table class='pure-table'>";
                    echo "<tr><th>Uur</th><th>Vak</th><th>Leerkracht</th></tr>";

                    mysqli_data_seek($result, 8);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 8.25u-9.15u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 4);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 9.15u-10.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";
                    
                    mysqli_data_seek($result, 8);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 10.15u-11.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 12);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 11.05u-11.55u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    /* free result set*/
                    mysqli_free_result($result);
                }

                $link->close();
            }
            function geefUurroosterDonderdag6ITN() {
                $link = mysqli_connect("localhost", "uurrooster", "uurrooster123", "Uurrooster-Web-App");

                $query = "SELECT VakID, Leerkracht, VakNaam FROM Vakken";

                if ($result = mysqli_query($link, $query)) {
                    echo "<table class='pure-table'>";
                    echo "<tr><th>Uur</th><th>Vak</th><th>Leerkracht</th></tr>";

                    mysqli_data_seek($result, 5);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 8.25u-9.15u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 4);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 9.15u-10.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";
                    
                    mysqli_data_seek($result, 7);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 10.15u-11.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 13);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 11.05u-11.55u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 14);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 12.45u-13.35u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 14);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 13.35-14.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 0);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 14.35-15.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 0);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 15.25-16.15u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    /* free result set*/
                    mysqli_free_result($result);
                }

                $link->close();
            }
            function geefUurroosterVrijdag6ITN() {
                $link = mysqli_connect("localhost", "uurrooster", "uurrooster123", "Uurrooster-Web-App");

                $query = "SELECT VakID, Leerkracht, VakNaam FROM Vakken";

                if ($result = mysqli_query($link, $query)) {
                    echo "<table class='pure-table'>";
                    echo "<tr><th>Uur</th><th>Vak</th><th>Leerkracht</th></tr>";

                    mysqli_data_seek($result, 6);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 8.25u-9.15u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 6);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 9.15u-10.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";
                    
                    mysqli_data_seek($result, 7);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 10.15u-11.05u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 4);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 11.05u-11.55u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 13);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 12.45u-13.35u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 8);
                    $row = mysqli_fetch_row($result);
                    echo "<tr><td> 13.35-14.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    mysqli_data_seek($result, 9);
                    $row = mysqli_fetch_row($result);
                    echo "<tr class='pure-table-odd'><td> 14.35-15.25u </td><td>";
                    print_r($row[2]);
                    echo "</td><td>";
                    print_r($row[1]);
                    echo "</td></tr>";

                    /* free result set*/
                    mysqli_free_result($result);
                }

                $link->close();
            }
        ?>

    </body>
</html>