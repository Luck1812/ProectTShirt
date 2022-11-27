<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" />
    <title>Профиль</title>
</head>
<body>
    <div id="app">
        <?php include('../menu/menu.php'); ?>
        <div class="container">
            <div class="profile">
                <div class="profile-table">
                    <table class="table-p" >
                        <tbody style="text-align: center;">
                            <tr>
                                <td style="text-align: center;" rowspan="2" colspan="2" style="background-color: aqua"><img src="./pictures/icon_profile.png" width="150" height="150"/></td>
                                <td class="no-border" colspan="2"/>
                                <td ><input placeholder="Имя"></td>
                                <td><input placeholder="Фамилия"></td>
                                <td><input placeholder="Отчество"></td>
                            </tr>
                            <tr>
                                <td class="no-border" colspan="2"/>
                                <td><input placeholder="Серия паспорта"></td>
                                <td><input placeholder="Номер паспорта"></td>
                            </tr>
                            <tr>
                                <td class="no-border" colspan="2" rowspan="2" style="width: 150px; height:150px"/>
                                <td class="no-border" colspan="2"/>
                                <td><input placeholder="Телефон"></td>
                                <td><input placeholder="Почтовый индекс"></td>
                            </tr>
                            <tr>
                                <td class="no-border" colspan="2"/>
                                <td><input placeholder="E-mail"></td>
                                <td><button>Сменить пароль</button></td>
                            </tr>
                            <tr>
                                <td style="height:200px" class="no-border" colspan="6"/>
                                <td style="text-align: left;"><button style="margin-right: 10px;">Сохранить</button><button>Отменить</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include('../footer/footer.php'); ?>
    </div>
</body>
</html>