<html>

<head>
    <title>Absenzenverwaltung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 10%;
        }

        .form-select {
            margin-left: auto;
            margin-right: auto;
            width: 10%;
            margin-bottom: 20px;
            margin-top: 50px;
        }
    </style>
    <div class="center">
        <h1>Absenzenverwaltung Klassen Auswahl</h1>

        <form action="" method="post">
            <select class="form-select" name="class">
                <option value="1i">1i</option>
                <option value="2i">2i</option>
            </select>
            <button class="btn btn-primary" name="submit">Weiter</button>
        </form>
    </div>
    <?php


    $db = new SQLite3("sq3.db");

    $class = $_POST['class'];
    echo $class;


    $db->query("UPDATE TSpeicher SET SpeichKlasse = '$class' WHERE SpeichId = 1;");
    if (isset($_POST["submit"])) {
        header("Location: Absenzen.php");
    }

    ?>

</body>

</html>