
<?php

echo "<h1>Dades de la comanda</h1>";

echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Camp</th><th>Valor</th></tr>";

// Recórrer totes les dades del formulari
foreach ($_POST as $camp => $valor) {

    // Si és un array (checkboxes), convertir-lo en text
    if (is_array($valor)) {
        $valor = implode(", ", $valor);
    }

    // Evitar que s'interpreti HTML introduït per l'usuari
    $camp = htmlspecialchars($camp);
    $valor = htmlspecialchars($valor);

    echo "<tr>";
    echo "<td>$camp</td>";
    echo "<td>$valor</td>";
    echo "</tr>";
}

// Mostrar el nom del fitxer adjunt
if (isset($_FILES["fitxer"]) &&
    $_FILES["fitxer"]["error"] == UPLOAD_ERR_OK) {

    $nomFitxer = htmlspecialchars($_FILES["fitxer"]["name"]);

    echo "<tr>";
    echo "<td>Fitxer adjunt</td>";
    echo "<td>$nomFitxer</td>";
    echo "</tr>";
}

echo "</table>";

echo "<p><a href='index.html'>Tornar al formulari</a></p>";

?>
