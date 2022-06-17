<?php

//index.php

include 'database_connection.php';

$query = "
SELECT * FROM tbl_sample 
ORDER BY id DESC
";

$result = $connect->query($query);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="library/bootstrap-5/bootstrap.min.css" rel="stylesheet" />
    <script src="library/bootstrap-5/bootstrap.bundle.min.js"></script>
    <script src="library/moment.js"></script>
    <link rel="stylesheet" href="library/dark-editable/dark-editable.css" />
    <link rel="icon" type="image/png" sizes="16x16" href="./library/favicon.png">
    <script src="library/dark-editable/dark-editable.js"></script>

    <title>Edición de Tabla en Línea</title>
</head>

<body>

    <div class="container">
        <h1 class="mt-5 mb-5 text-center text-primary">Edición de Tabla en Línea en PHP y MySQL</h1>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                        </tr>
                        <?php
                        foreach ($result as $row) {
                            echo '
                                <tr>
                                    <td><a href="#" class="first_name" id="first_name_' . $row["id"] . '" data-type="text" data-pk = "' . $row["id"] . '" data-url="process.php" data-name="first_name">' . $row["first_name"] . '</a></td>
                                    <td><a href="#" class="last_name" id="last_name_' . $row["id"] . '" data-type="text" data-pk="' . $row["id"] . '" data-url="process.php" data-name="last_name">' . $row["last_name"] . '</a></td>
                                    <td><a href="#" class="gender" id="gender_' . $row["id"] . '" data-type="select" data-pk="' . $row["id"] . '" data-url="process.php" data-name="gender">' . $row["gender"] . '</a></td>
                                </tr>
                                ';
                        }
                        ?>
                    </table>
                </div>
                <div class="card-header">
                    <h3 style="color:#f77c1c; text-align:center;" ;>Para más desarrollos ingresa en <a href="https://www.configuroweb.com/46-aplicaciones-gratuitas-en-php-python-y-javascript/#Aplicaciones-gratuitas-en-PHP,-Python-y-Javascript" ; target="_blank" style="text-decoration:none">ConfiguroWeb</a></h3>
                </div>
            </div>

        </div>
        <br />
        <br />
    </div>
</body>

</html>

<script>
    //For First Name Table Column Data

    const first_name = document.getElementsByClassName('first_name');

    for (var count = 0; count < first_name.length; count++) {
        const first_name_data = document.getElementById(first_name[count].getAttribute('id'));

        const first_name_popover = new DarkEditable(first_name_data);
    }


    //For Last Name Table Column Data

    const last_name = document.getElementsByClassName('last_name');

    for (var count = 0; count < last_name.length; count++) {
        const last_name_data = document.getElementById(last_name[count].getAttribute('id'));

        const last_name_popover = new DarkEditable(last_name_data);
    }


    //For Gender Table column Data

    const gender = document.getElementsByClassName('gender');

    for (var count = 0; count < gender.length; count++) {
        const gender_data = document.getElementById(gender[count].getAttribute("id"));

        const gender_popover = new DarkEditable(gender_data, {
            source: [{
                    value: 'Masculino',
                    text: 'Masculino'
                },
                {
                    value: 'Femenino',
                    text: 'Femenino'
                }
            ]
        });
    }
</script>