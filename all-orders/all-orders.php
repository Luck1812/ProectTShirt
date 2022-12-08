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
    <div id="app_orders">

        <div class="container">
            <div class="orders">
                <div class="orders-table" style="padding-top:30px; ">
                    <div class="container-orders">
                        <table class="tb-order">
                            <thead>
                                <tr>
                                    <th class="th-order" style="cursor:pointer;" @click="sortOrders();">{{NumberSort}}</th>
                                    <th class="th-order">Наименование товара</th>
                                    <th class="th-order">Дата</th>
                                    <th class="th-order">Статус</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="order" style="height:10px;" v-for="order in createOrders">
                                    <td @click="openMoreInformation" :id="order.Number-1" class="td-order">{{order.Number}}</td>
                                    <td @click="openMoreInformation" :id="order.Number-1" class="td-order">{{order.NameImage}}</td>
                                    <td @click="openMoreInformation" :id="order.Number-1" class="td-order">{{order.Date}}</td>
                                    <td class="td-order" v-if="RoleID == 1">
                                        <select @change="changeStatus($event);" :id="order.NumberElectronicReceipt" style="width: 150px; font-size:20px; background-color:antiquewhite">
                                            <option v-for="status in createStatus" :value="status.StatusID" :selected="status.StatusID == order.StatusID"> {{status.StatusName}}</option>
                                        </select>
                                    </td>
                                    <td v-else="RoleID ==" @click="openMoreInformation" :id="order.Number-1" class="td-order">{{order.NameStatus}}</td>
                                </tr>
                                <tr style="height:auto"></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="modal" :class="{ modal_active : isActiveInformationWindow }" style="overflow:hidden;">
                <div class="modal__content__information">
                    <button class="modal__close-button" @click="isActiveInformationWindow = false;"><img src="./img/close3.png" width="16" alt=""></button>
                    <!-- Контент модального окна -->
                    <div class="modal__title">
                        <h1>Заказ №</h1>
                    </div>
                    <div class="modal__content__information">
                        <div>
                            <img src="./img/logoINF.png" width="100px" height="80px">
                        </div>
                        <div>
                            <p style="font-size:18px; margin:0px; margin-bottom: 10px;">Интернет-магазин «T-shirt»</p>
                            <p style="font-size:18px; margin:0px; margin-bottom: 20px;">Товарный чек № {{NumberElectronicReceipt}}</p>
                        </div>
                        <div style="text-align:start; padding-left:15px;">
                            <p style="margin:0px; margin-bottom: 7px;">ИНН: 500100098623</p>
                            <p style=" margin:0px; margin-bottom: 7px;">Дата оформления заказа: {{DateOrder}} г.</p>
                            <p style=" margin:0px;">Индекс: {{PostalCode}}</p>
                        </div>
                        <div style="margin-top:20px; padding-left:15px;padding-right:10px;">
                            <table class="information-table-orders">
                                <thead>
                                    <tr>
                                        <th colspan="5" style="margin:0 auto; padding-bottom:10px; font-size:20px">СОСТАВ ЗАКАЗА</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Артикул
                                        </th>
                                        <th>
                                            Товар
                                        </th>
                                        <th>
                                            Цена
                                        </th>
                                        <th>
                                            Кол-во
                                        </th>
                                        <th>
                                            Стоимость
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ArticleTShirt}}</td>
                                        <td>{{NameProduct}}</td>
                                        <td>{{CostProduct}}</td>
                                        <td>{{CountProduct}}</td>
                                        <td>{{CostProduct * CountProduct}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ArticleSketch}}</td>
                                        <td>Эскиз "{{NameSketch}}"</td>
                                        <td>500</td>
                                        <td>1</td>
                                        <td>500</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="text-align:end; padding-right:15px; padding-top:40px;">
                                <p style=" margin:0px; margin-bottom: 7px; font-size:22px;">Итого {{TotalCost}} ₽</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal__footer">
                        <button @click="saveInWord();" style="border-radius:10px;">Сохранить как Word</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php include('../footer/footer.php'); ?>
    <style>
        .modal__content__information {
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

        .information-table-orders {
            border-collapse: collapse;
            min-width: 500px;
        }
    </style>
</body>
<script type="text/javascript">
    var app = new Vue({
        el: '#app_orders',
        data: {
            mainArrayOrder: "",
            arrayStatus: "",
            isActiveInformationWindow: false,
            NumberElectronicReceipt: "",
            DateOrder: "",
            PostalCode: "",
            ArticleTShirt: "",
            ArticleSketch: "",
            NameProduct: "",
            NumberSort: "№ ↓",
            NameSketch: "",
            CostProduct: "",
            RoleID: "",
            selectStatus: "",
            CountProduct: "",
            TotalCost: "",
            isSort: false,
        },

        created() {
            this.startOrders();
        },
        methods: {
            changeStatus(event) {
                let add = $.ajax({
                    url: '../mainCode.php',
                    dataType: 'html',
                    method: 'get',
                    data: {
                        func_user: 'changeStatus',
                        'NumberElectronicReceipt': event.target.id,
                        'StatusID': event.target.value,
                    },
                    success: function(data) {
                        alert("Изменение статуса");
                    },
                    error: function() {
                        console.log('ERROR');
                    }
                });
            },
            sortOrders() {
                if (this.isSort) {
                    this.NumberSort = "№ ↓";
                    this.mainArrayOrders.sort(function(a, b) {
                        return parseFloat(a.Number) - parseFloat(b.Number);
                    });
                } else {
                    this.NumberSort = "№ ↑";
                    this.mainArrayOrders.sort(function(a, b) {
                        return parseFloat(b.Number) - parseFloat(a.Number);
                    });
                }
                this.isSort = !this.isSort;

            },
            async saveInWord() {
                async function flow(NumberElectronicReceipt, DateOrder, PostalCode, ArticleTShirt, NameProduct, CostProduct,
                    CountProduct, ArticleSketch, NameSketch, TotalCost) {
                    let add = $.ajax({
                        url: '../mainCode.php',
                        dataType: 'html',
                        method: 'get',
                        data: {
                            func_user: 'create_word',
                            'NumberElectronicReceipt': NumberElectronicReceipt,
                            'DateOrder': DateOrder,
                            'PostalCode': PostalCode,
                            'ArticleTShirt': ArticleTShirt,
                            'NameProduct': NameProduct,
                            'CostProduct': CostProduct,
                            'CountProduct': CountProduct,
                            'ArticleSketch': ArticleSketch,
                            'NameSketch': NameSketch,
                            'TotalCost': TotalCost
                        },
                        success: function(data) {

                        },
                        error: function() {
                            console.log('ERROR');
                        }
                    });
                    let result = await add;
                }
                let result2 = await flow(this.NumberElectronicReceipt, this.DateOrder, this.PostalCode, this.ArticleTShirt,
                    this.NameProduct, this.CostProduct, this.CountProduct, this.ArticleSketch, this.NameSketch, this.TotalCost);
                window.location.href = "../chequeOrder.docx";
            },
            openMoreInformation: function(event) {
                this.isActiveInformationWindow = true;
                this.NumberElectronicReceipt = this.mainArrayOrders[event.currentTarget.id]['NumberElectronicReceipt'];
                this.DateOrder = this.mainArrayOrders[event.currentTarget.id]['Date'];
                this.PostalCode = this.mainArrayOrders[event.currentTarget.id]['PostalCode'];
                this.ArticleTShirt = this.mainArrayOrders[event.currentTarget.id]['TopClothesID'];
                this.NameProduct = this.mainArrayOrders[event.currentTarget.id]['NameImage'];
                this.CostProduct = this.mainArrayOrders[event.currentTarget.id]['Cost'];
                this.ArticleSketch = this.mainArrayOrders[event.currentTarget.id]['ArticleSketch'];
                this.CountProduct = 1;
                this.NameSketch = this.mainArrayOrders[event.currentTarget.id]['NameSketch'];
                this.TotalCost = Number(this.CostProduct) + 500;
            },
            startOrders() {
                <?php
                $userID = $_COOKIE['userID'];
                if ($userID != "" || null) {
                    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
                    $result = $connection->query("SELECT `ID` FROM `user` WHERE `RegistrationUserID` = '$userID'"); // запрос на выборку
                    while ($row = $result->fetch_assoc()) {
                        $result2 = $connection->query("SELECT `sketch_image`.`ID` as `ArticleSketch`,`RoleID`, `NumberElectronicReceipt`,`Date`,`top_clothes`.`Name`, `UserID`,`PostalCode`,`TopClothesID`,`SizeID`,`NameStatus`,`SketchImageID`,`top_clothes`.`Cost`,`StatusID`, `category_image`.`Name` as `NameSketch` FROM `electronic_receipt`,`top_clothes`, `status`, `user`, `category_image`, `sketch_image` WHERE `electronic_receipt`.`SketchImageID` = `sketch_image`.`ID` AND `sketch_image`.`CategoryImageID` = `category_image`.`ID` AND `top_clothes`.`ID` = `electronic_receipt`.`TopClothesID` AND `user`.`ID` = `electronic_receipt`.`UserID` AND `status`.`ID` = `electronic_receipt`.`StatusID`;"); // запрос на выборку
                    }
                    $array3 = array();
                    $count = 1;
                    while ($row = $result2->fetch_assoc()) {
                        $array_test['NumberElectronicReceipt'] = $row['NumberElectronicReceipt'];
                        $array_test['Number'] = $count;
                        $array_test['Date'] = $row['Date'];
                        $array_test['NameImage'] = $row['Name'];
                        $array_test['NameSketch'] = $row['NameSketch'];
                        $array_test['UserID'] = $row['UserID'];
                        $array_test['PostalCode'] = $row['PostalCode'];
                        $array_test['TopClothesID'] = $row['TopClothesID'];
                        $array_test['SizeID'] = $row['SizeID'];
                        $array_test['ArticleSketch'] = $row['ArticleSketch'];
                        $array_test['NameStatus'] = $row['NameStatus'];
                        $array_test['SketchImageID'] = $row['SketchImageID'];
                        $array_test['Cost'] = $row['Cost'];
                        $array_test['RoleID'] = $row['RoleID'];
                        $array_test['StatusID'] = $row['StatusID'];
                        array_push($array3, $array_test);
                        $count += 1;
                    }
                    mysqli_close($connection);
                }
                ?>
                this.mainArrayOrders = '<?php echo json_encode($array3); ?>';
                this.mainArrayOrders = $.parseJSON(this.mainArrayOrders);
                this.RoleID = this.getCookie('roleID');
                <?php
                $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
                $result = $connection->query("SELECT * FROM `status`");
                $array3 = array();
                while ($row = $result->fetch_assoc()) {
                    $array_test['StatusID'] = $row['ID'];
                    $array_test['StatusName'] = $row['NameStatus'];
                    array_push($array3, $array_test);
                }
                mysqli_close($connection);
                ?>
                this.arrayStatus = '<?php echo json_encode($array3); ?>';
                this.arrayStatus = $.parseJSON(this.arrayStatus);
            },
            getCookie(name) {
                var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            },
        },
        computed: {
            createOrders() {
                return this.mainArrayOrders;
            },
            createStatus() {
                return this.arrayStatus;
            }
        }
    })
</script>

</html>