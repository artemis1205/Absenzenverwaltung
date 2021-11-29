<html>

<head>
    <title>Absenzenverwaltung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <?php


    $db = new SQLite3("sq3.db");
    echo $_GET["name"];



    ?>
</head>

<body>




    <div class="header">
        <h1 class="title">Absenzverwaltung</h1>
        <form action="index.php">
            <button class="back">Zurück</button>
        </form>
    </div>



    <form action="Absenzen.php" method="post">

        <select name="month">
            <option value="">Wähle einen Monat aus</option>
            <option value="Januar">Januar</option>
            <option value="Februar">Februar</option>
            <option value="März">März</option>
            <option value="April">April</option>
            <option value="Mai">Mai</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Dezember">Dezember</option>
        </select>

        <button class="speich">Speichern</button>

        <?php

        $date = $_POST['daten'];

        if (!empty($date)) {
            $db->query("UPDATE TSpeicher SET SpeichDatum = '$date' WHERE SpeichId = '1';");
        }



        $month = $_POST['month'];

        if (!empty($month)) {

            $db->query("UPDATE TSpeicher SET SpeichMonat = '$month' WHERE SpeichId = '1';");
        }

        $monat = $db->query("SELECT * FROM TSpeicher  WHERE SpeichId='1';");
        $monat2 = $monat->fetchArray(SQLITE3_ASSOC);
        $monaat = $monat2['SpeichMonat'];


        ?>
        <h2 class="month"><?php echo $monaat; ?></h2>
        <div class="slide">

            <div class="daten">
                <?php

                $begin;
                $end;
                if ($monaat == "Januar") {
                    $begin = new DateTime("2022-01-01");
                    $end   = new DateTime("2022-01-31");
                }

                if ($monaat == "Februar") {
                    $begin = new DateTime("2022-02-01");
                    $end   = new DateTime("2022-02-28");
                }

                if ($monaat == "März") {
                    $begin = new DateTime("2022-03-01");
                    $end   = new DateTime("2022-03-31");
                }

                if ($monaat == "April") {
                    $begin = new DateTime("2022-04-01");
                    $end   = new DateTime("2022-04-30");
                }

                if ($monaat == "Mai") {
                    $begin = new DateTime("2022-05-01");
                    $end   = new DateTime("2022-05-31");
                }

                if ($monaat == "Juni") {
                    $begin = new DateTime("2022-06-01");
                    $end   = new DateTime("2022-06-30");
                }

                if ($monaat == "Juli") {
                    $begin = new DateTime("2022-07-01");
                    $end   = new DateTime("2022-07-31");
                }
                if ($monaat == "August") {
                    $begin = new DateTime("2022-08-01");
                    $end   = new DateTime("2022-08-31");
                }
                if ($monaat == "September") {
                    $begin = new DateTime("2022-09-01");
                    $end   = new DateTime("2022-09-30");
                }
                if ($monaat == "Oktober") {
                    $begin = new DateTime("2022-10-01");
                    $end   = new DateTime("2022-10-31");
                }
                if ($monaat == "November") {
                    $begin = new DateTime("2022-11-01");
                    $end   = new DateTime("2022-11-30");
                }
                if ($monaat == "Dezember") {
                    $begin = new DateTime("2022-12-01");
                    $end   = new DateTime("2022-12-31");
                }
                $datumm2 = $monat2['SpeichDatum'];


                for ($i = $begin; $i <= $end; $i->modify('+1 day')) {
                    if ($i->format("Y-m-d") == $datumm2) {
                        $backg = "black";
                    } else {
                        $backg = "whitesmoke";
                    }

                    if ($i->format("Y-m-d") == $datumm2) {
                        $col = "white";
                    } else {
                        $col = "black";
                    }
                    echo "<div class=slide id=demo>" . "<button  id='buttonDemo' style='background-color:" . $backg . "; color:" . $col . ";' class=date name='daten' value=" . $i->format("Y-m-d") . ">" . $i->format("d") . "</button>"  . "</div>";
                }


                ?>
            </div>




        </div>





        <?php


        ?>

        <style>
            .back {
                border-style: none;
                border-radius: 10px;
                padding: 10px;

            }

            .back:hover {
                background-color: gray;
                color: white;
                border-style: none;
                border-radius: 10px;
                padding: 10px;

            }

            .speich {
                border-style: none;
                border-radius: 10px;
                padding: 10px;

            }

            .submit {
                border-style: none;
                border-radius: 10px;
                padding: 10px;

            }

            .submit:hover {
                background-color: gray;
                color: white;
                border-style: none;
                border-radius: 10px;
                padding: 10px;

            }

            .speich:hover {
                background-color: gray;
                color: white;
                border-style: none;
                border-radius: 10px;
                padding: 10px;

            }

            .student {
                padding: 30px;
                width: 130px;
                border-radius: 10px;
                text-align: center;
                justify-content: center;
                margin-right: 100px;
                margin-bottom: 50px;
                flex-wrap: wrap;
                display: flex;
                background-color: whitesmoke;


            }

            .Schueler {
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                justify-content: center;
                display: flex;

                flex-wrap: wrap;
            }

            .absent {
                color: red;
                font-weight: bold;
            }

            .anwesend {
                color: green;
                font-weight: bold;
            }
        </style>
        <div class="Schueler">
            <?php

            if (isset($_POST['rückgängig'])) {
                foreach ($_POST['name'] as $check) {





                    $datumm = $monat2['SpeichDatum'];


                    $klasse = $monat2['SpeichKlasse'];

                    $db->query("DELETE FROM TAbsenzen WHERE AbsDatum = '$datumm' AND AbsKlasse = '$klasse' AND SchuelerId='$check'");
                }
            }
            if (isset($_POST['submit'])) {

                foreach ($_POST['name'] as $check) {



                    $datumm = $monat2['SpeichDatum'];


                    $klasse = $monat2['SpeichKlasse'];

                    $if = $db->querySingle("SELECT count(*) FROM TAbsenzen WHERE AbsDatum = '$datumm' AND AbsKlasse = '$klasse' AND SchuelerId='$check'");

                    if ($if == 0) {
                        $sqlstr = "INSERT INTO TAbsenzen (AbsDatum, AbsKlasse, SchuelerId) VALUES ";
                        $db->query($sqlstr . "('$datumm', '$klasse', '$check')");
                    }
                }
            }


            ?>


            <?php



            $res = $db->query("SELECT * FROM TSchueler u, TSpeicher p WHERE u.SchuelerKlasse = p.SpeichKlasse");

            while ($row = $res->fetchArray(SQLITE3_ASSOC)) {

                $count = $db->querySingle("SELECT count(*) FROM TAbsenzen a, TSpeicher s WHERE a.AbsDatum = s.SpeichDatum AND a.SchuelerId = '$row[SchuelerId]'");
                if ($count == 1) {
                    $absent = "Absent";
                    $anwesend = "";
                } else {
                    $absent = "";
                    $anwesend = "Anwesend";
                }

                echo "<div class=student>" . "<input type=checkbox name='name[]'  value=" . $row['SchuelerId'] . ">" . "<p>" . $row['SchuelerVorname'] . ' ' . $row['SchuelerName'] . "</p>" . "<p class=absent>" . $absent . "</p>" . "<p class=anwesend>" . $anwesend . "</p>" . "</div>";
            }


            ?>
        </div>
        <input class="submit" type="submit" name="submit" value="Absent">
        <input class="submit" type="submit" name="rückgängig" value="Rückgängig">



    </form>








</body>

</html>