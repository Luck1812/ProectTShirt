<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" />
    <title>Профиль</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        ::-webkit-scrollbar {
            width: 14px;
            height: 14px;
        }

        ::-webkit-scrollbar-thumb {
            background: #f3c693;
            border-radius: 0.819847px;
        }
    </style>
    <?php include('../menu/menu.php'); ?>
    <div id="app_profile">
        <div class="container">
            <div class="profile">
                <div class="profile-table">
                    <table class="table-p">
                        <tbody style="text-align: center;">
                            <tr>
                                <td style="text-align: center;" rowspan="2" colspan="2" style="background-color: aqua"><img src="./pictures/icon_profile.png" width="150" height="150" /></td>
                                <td class="no-border" colspan="2" />
                                <td><input v-model="name" placeholder="Имя"></td>
                                <td><input v-model="surname" placeholder="Фамилия"></td>
                                <td><input v-model="patronymic" placeholder="Отчество"></td>
                            </tr>
                            <tr>
                                <td class="no-border" colspan="2" />
                                <td><input v-model="seriesPassport" onkeypress='validate(event)' maxlength="4" placeholder="Серия паспорта"></td>
                                <td><input v-model="numberPassport" onkeypress='validate(event)' maxlength="6" placeholder="Номер паспорта"></td>
                            </tr>
                            <tr>
                                <td class="no-border" colspan="2" rowspan="2" style="width: 150px; height:150px" />
                                <td class="no-border" colspan="2" />
                                <td><input v-model="numberPhone" maxlength="11" type="text" onkeypress='validate(event)' placeholder="Телефон"></td>
                                <td><input v-model="postalCode" maxlength="6" onkeypress='validate(event)' placeholder="Почтовый индекс"></td>
                            </tr>
                            <tr>
                                <td class="no-border" colspan="2" />
                                <td style="display:none;" :class="{ visibleObject : roleID == 1 }"><button  @click="addWindowCatalog();">Добавить каталог</button></td>
        
                            </tr>
                            <tr>
                                <td class="no-border" colspan="4" />
                                <td style="display:none;" :class="{ visibleObject : roleID == 1 }"><button  @click="addWindowCatalogImage();">Добавить изображение </button></td>
                            </tr>
                            <tr>
                                <td style="height:200px" class="no-border" colspan="6" />
                                <td style="text-align: left;"><button @click="saveNewData();" style="margin-right:10px">Сохранить</button><button @click="exitAccount();">Выйти</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal" :class="{ modal_active : isActiveWindowCatalog }" style="overflow:hidden;">
                <div class="modal__content__catalog">
                    <button class="modal__close-button" @click="isActiveWindowCatalog = false;"><img src="./pictures/close3.png" width="16" alt=""></button>
                    <!-- Контент модального окна -->
                    <div class="modal__title">
                        <h1>Добавление каталога</h1>
                    </div>

                    <div class="modal__content__catalog">
                        <div style=" margin: 0 auto; flex-direction:column; display:flex">
                            <input style="font-size:20px; text-align:center" placeholder="Название каталога" v-model="nameCatalog">
                            <input style=" margin:0 auto;margin-top:20px;" type="file" id="img-file">
                        </div>
                    </div>
                    <div class="modal__footer">
                        <div>
                            <button @click="createCatalog();">Создать</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal" :class="{ modal_active : isActiveWindowCatalogImage }" style="overflow:hidden;">
                <div class="modal__content__catalog">
                    <button class="modal__close-button" @click="isActiveWindowCatalogImage = false;"><img src="./pictures/close3.png" width="16" alt=""></button>
                    <!-- Контент модального окна -->
                    <div class="modal__title">
                        <h1>Добавление изображения</h1>
                    </div>

                    <div class="modal__content__catalog">
                        <div style=" margin: 0 auto; flex-direction:column; display:flex">
                            <select style="font-size:22px;" v-model="catalogID">
                                <option v-for="catalog in createCatalogFromArray" :value="catalog.ID">{{catalog.Name}}</option>
                            </select>
                            <input style=" margin:0 auto;margin-top:20px;" type="file" id="img-file-sketch">
                        </div>
                    </div>
                    <div class="modal__footer">
                        <div>
                            <button @click="addSketch();">Создать</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .modal__content__catalog {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 550px;

            overflow: hidden;
            text-align: center;
            background: #f9f9f9;
            border-end-start-radius: 30px;
            border-end-end-radius: 30px;
            position: relative;
        }

        .visibleObject {
            display: block !important;
        }
    </style>
    <?php include('../footer/footer.php'); ?>
</body>
<script>
    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
<script type="text/javascript">
    var app = new Vue({
        el: '#app_profile',
        data: {
            name: "",
            surname: "",
            patronymic: "",
            seriesPassport: "",
            numberPassport: "",
            numberPhone: "",
            postalCode: "",
            nameCatalog: "",
            roleID: "",
            catalogID: 1,
            arrayCategoryImage: "",
            isActiveWindowCatalog: false,
            isActiveWindowCatalogImage: false,
        },
        created() {
            this.completionDate();
        },
        methods: {
            addWindowCatalogImage() {
                this.isActiveWindowCatalogImage = true;
            },
            addWindowCatalog() {
                this.isActiveWindowCatalog = true;
            },
            addSketch() {
                if ($("#img-file-sketch")[0].files[0] != undefined) {
                    var nameFile = $("#img-file-sketch")[0].files[0].name;
                    if (nameFile.toLowerCase().indexOf('.png') >= 3 || nameFile.toLowerCase().indexOf('.jpg') >= 3) {
                        var formData = new FormData();
                        formData.append('file-sketch', $("#img-file-sketch")[0].files[0]);
                        formData.append('sketch', this.catalogID);
                        $.ajax({
                            url: '../mainCode.php',
                            type: "POST",
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'html',
                            data: formData,
                            success: function(data) {
                                console.log(data);
                            }
                        });
                        this.isActiveWindowCatalogImage = false;
                        alert("Вы добавили изображение");
                    } else {
                        alert("Неккоректный файл");
                    }

                } else {
                    alert("Вы не выбрали файл");
                }
            },
            async createCatalog() {
                if (this.nameCatalog != "" || null) {
                    if ($("#img-file")[0].files[0] != undefined) {
                        var nameFile = $("#img-file")[0].files[0].name;
                        if (nameFile.toLowerCase().indexOf('.png') >= 3 || nameFile.toLowerCase().indexOf('.jpg') >= 3) {
                            var formData = new FormData();

                            formData.append('file', $("#img-file")[0].files[0]);
                            var createCatalog = await $.ajax({
                                type: "POST",
                                url: '../mainCode.php',
                                data: {
                                    func_user: 'createCatalog',
                                    nameCatalog: this.nameCatalog,
                                },
                                dataType: 'html',
                                success: function(data) {
                                    console.log("1");
                                }
                            });

                            $.ajax({
                                type: "POST",
                                url: '../mainCode.php',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: formData,
                                dataType: 'html',
                                success: function(data) {
                                    console.log(data);
                                }
                            });
                            this.isActiveWindowCatalog = false;
                            alert("Вы создали новый каталог");
                        } else {
                            alert("Неккоректный файл");
                        }

                    } else {
                        alert("Вы не выбрали файл");
                    }
                } else {
                    alert("Вы не заполнили поле");
                }
            },
            exitAccount() {
                let add = $.ajax({
                    url: '../mainCode.php',
                    method: "get",
                    dataType: 'html',
                    data: {
                        func_user: 'clear_cookie',
                    },
                    success: function(data) {
                        console.log('yspex');
                    },
                    error: function() {
                        console.log('ERROR');
                    }
                });
                window.location.href = '../index.php';
            },
            completionDate() {
                <?php
                $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
                $result = $connection->query("SELECT * FROM `category_image`"); // запрос на выборку
                $array3 = array();
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $array_test['ID'] = $row['ID'];
                    $array_test['Name'] = $row['Name'];
                    array_push($array3, $array_test);
                }
                mysqli_close($connection);
                ?>
                this.arrayCategoryImage = '<?php echo json_encode($array3); ?>';
                this.arrayCategoryImage = $.parseJSON(this.arrayCategoryImage);
                console.log(this.arrayCategoryImage);
                <?php
                $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
                $userID = $_COOKIE["userID"];
                $sql = "SELECT * FROM `user` WHERE `RegistrationUserID` = '$userID'";
                $massive = mysqli_query($connection, $sql);
                $row = mysqli_fetch_array($massive, MYSQLI_NUM);
                $seriesPassport = $row[1];
                $numberPassport = $row[2];
                $name = $row[4];
                $surname = $row[5];
                $patronymic = $row[6];
                $numberPhone = $row[7];
                $postalCode = $row[8];
                $roleID = $row[9];
                mysqli_close($connection);
                ?>
                this.name = '<?php echo $name; ?>';
                this.surname = '<?php echo $surname; ?>';
                this.patronymic = '<?php echo $patronymic; ?>';
                this.seriesPassport = '<?php echo $seriesPassport; ?>';
                this.numberPassport = '<?php echo $numberPassport; ?>';
                this.numberPhone = '<?php echo $numberPhone; ?>';
                this.postalCode = '<?php echo $postalCode; ?>';
                this.roleID = '<?php echo $roleID; ?>';
            },
            async saveNewData() {
                if (this.seriesPassport.length == 4 || this.seriesPassport.length == 0) {
                    if (this.numberPassport.length == 6 || this.numberPassport.length == 0) {
                        if (this.numberPhone.length == 11 || this.numberPhone.length == 0) {
                            if (this.postalCode.length == 6 || this.postalCode.length == 0) {
                                async function flow(name, surname, patronymic, seriesPassport, numberPassport, numberPhone, postalCode, userID) {
                                    let add = $.ajax({
                                        url: '../mainCode.php',
                                        method: "get",
                                        dataType: 'html',
                                        data: {
                                            func_user: 'change_data',
                                            "name": name,
                                            "surname": surname,
                                            "patronymic": patronymic,
                                            "seriesPassport": seriesPassport,
                                            "numberPassport": numberPassport,
                                            "numberPhone": numberPhone,
                                            "postalCode": postalCode,
                                            "userID": userID
                                        },
                                        success: function(data) {

                                        },
                                        error: function() {
                                            console.log('ERROR');
                                        }
                                    });
                                    let result = await add;
                                }
                                let result2 = await flow(this.name, this.surname, this.patronymic, this.seriesPassport, this.numberPassport, this.numberPhone, this.postalCode, this.getCookie('userID'));
                                alert("Успешно изменили данные");
                            } else {
                                alert("Неккоректный индекс почты");
                            }
                        } else {
                            alert("Неккоректный номер телефона");
                        }
                    } else {
                        alert("Неверно ввели номер паспорта");
                    }
                } else {
                    alert("Неверно ввели серию паспорта");
                }
            },
            ValidMail(email) {
                var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
                var myMail = email;
                var valid = re.test(myMail);
                return valid;
            },
            getCookie(name) {
                var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }
        },
        computed: {
            createCatalogFromArray() {
                return this.arrayCategoryImage;
            }
        }
    })
</script>

</html>