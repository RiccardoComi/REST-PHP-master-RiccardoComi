<?php
//LISTAESERCENTI - GET

    function visualizzaEsercenti($r){?>
    <?php $nomesito = "Lista Esercenti"; require __DIR__ . '/parcials/header.php'; ?>
    <style>
        table {
            width:80%;
            margin-left: auto;
            margin-right: auto;
        }
        table, th, td {
            border: 1px solid #596aa7;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        table tr:nth-child(even) {
            background-color: #dceedf;
        }
        table tr:nth-child(odd) {
            background-color: rgba(99, 155, 152, 0.55);
        }
        table th {
            background-color: rgba(43, 41, 181, 0.76);
            color: white;
        }
    </style>
    <body>
    <h1 style="text-align: center">ESERCENTI</h1>

    <table>
        <tr><th>ID</th><th>NOME</th><th>E-MAIL</th></tr>
        <?php while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
            echo "<tr><td>" . $row['id_amministratore'] . "</td><td>" . $row['nome'] . "</td><td>" . $row['email'] . "</td></tr>";
        }?>
    </table>
    </body>
    </html>
<?php  }?>
