<!-- Copyright © Clemens Frei 2021. All rights reserved. -->
<html>

<body>
  <h1>Absenzenvergewaltigung</h1>
  <?php

  /* Datenbankdatei ausserhalb htdocs öffnen bzw. erzeugen */
  $db = new SQLite3("sq3.db");

  /* Tabelle mit Primärschlüssel erzeugen */
  $db->exec("CREATE TABLE TAbsenzen (AbsId INTEGER PRIMARY KEY AUTOINCREMENT, AbsDatum, AbsKlasse, SchuelerId);");
  $db->exec("CREATE TABLE TSchueler (SchuelerId INTEGER PRIMARY KEY, SchuelerName, SchuelerVorname, SchuelerKlasse);");
  $db->exec("CREATE TABLE TSpeicher (SpeichId INTEGER PRIMARY KEY, SpeichKlasse, SpeichDatum, SpeichMonat);");

  /* Verbindung zur Datenbankdatei wieder lösen */
  $sqlstr = "INSERT INTO TSchueler (SchuelerName, SchuelerVorname, SchuelerKlasse) VALUES ";
  $db->query($sqlstr . "('Thim', 'Remo', '2i')");
  $db->query($sqlstr . "('Helg', 'Remo', '2i')");
  $db->query($sqlstr . "('Hoffmann', 'Loric', '2i')");
  $db->query($sqlstr . "('Hoffman', 'Lorenz', '2i')");
  $db->query($sqlstr . "('Studer', 'Silvan', '2i')");
  $db->query($sqlstr . "('Fuchs', 'Kai', '2i')");
  $db->query($sqlstr . "('De Boo', 'Sepp', '2i')");
  $db->query($sqlstr . "('Carpeder', 'Manuel', '2i')");
  $db->query($sqlstr . "('Küng', 'Patrick', '2i')");
  $db->query($sqlstr . "('Bulavcak', 'Andrej', '1i')");
  $db->query($sqlstr . "('Useini', 'Aidan', '1i')");
  $db->query($sqlstr . "('Marti', 'Aidan', '1i')");
  $db->query($sqlstr . "('Frei', 'Clemens', '1i')");
  $db->query($sqlstr . "('Shimi', 'Eno', '1i')");
  $db->query($sqlstr . "('Phikarson', 'Sittichot', '1i')");
  $db->query($sqlstr . "('Thierbach', 'Rüdiger', '1i')");
  $db->query($sqlstr . "('Vikaharsan', 'Varun', '1i')");
  $db->query($sqlstr . "('Kanayananagam', 'Krishen', '1i')");

  $sqlstr = "INSERT INTO TSpeicher (SpeichId, SpeichKlasse, SpeichDatum, SpeichMonat) VALUES ";
  $db->query($sqlstr . "('1', '1i', '2022-01-01', 'Januar')");

  $res = $db->query("SELECT * FROM TSchueler");

  /* Abfrageergebnis ausgeben */
  while ($dsatz = $res->fetchArray(SQLITE3_ASSOC)) {
    echo $dsatz["SchuelerName"] . ", "
      . $dsatz["SchuelerVorname"] . ", "
      . $dsatz["SchuelerKlasse"] . "\n";
  }

  $db->close();

  ?>
</body>

</html>
