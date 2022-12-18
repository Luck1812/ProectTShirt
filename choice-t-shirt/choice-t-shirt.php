<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/styles.css" rel="stylesheet" />
    <title>Выбор одежды</title>
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
    <div id="app_choice-t-shirt">
        <div class="container">
            <div id="auxiliary-menu">
                <div class="select-filter">
                    <select class="form-select" aria-label="Default select example" v-model="selected" @change="filterArray();">
                        <option disabled value="">Фильтрация</option>
                        <option value="1">Мужская одежда</option>
                        <option value="2">Женская одежда</option>
                    </select>
                    <button class="cancel-button" @click="removeFilterArray();"></button>
                </div>
                <div class="sort-box" style="line-height: 30px; font-size: 24px;">
                    <span>Стоимость</span>
                    <button class="sort-button" @click="sortTShirt();"><img :src="sortArrow" width="25px" height="25px" /></button>
                </div>
            </div>
            <div style="display:flex; flex-direction: row;">
                <div style="padding-top:20px;">
                    <div @click="allCategory();" class="btn-category">Верхняя одежда</div>
                    <div @click="filterCategory" :id="catalog.id" v-for="catalog in createCategoryCatalog" class="btn-category">{{catalog.name}}</div>
                </div>
                <div class="container-for-list">
                    <div id="list-item" v-for="tshirt in createCatalog">
                        <div id="img-top-clothes">
                            <img :src="tshirt.image" />
                        </div>
                        <div id="name-image" style="font-size:30px;text-align: center;">
                            {{tshirt.name}}
                        </div>
                        <div class="description-image">
                            <p style="font-size:18px;">
                                {{tshirt.description}}
                            </p>
                            <p style="font-size:18px;">
                                Материал: {{tshirt.nameMaterial}}
                            </p>
                            <p style="font-size:18px;">
                                Цвет: {{tshirt.nameColor}}
                            </p>
                        </div>
                        <div class="btn-select-clothes">
                            <a @click='createCookieTShirt' style='text-decoration: none; color:black;' :id='tshirt.id' href='../create-t-shirt/create-t-shirt.php'>
                                {{tshirt.cost}} ₽
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer/footer.php'); ?>
</body>

<script type="text/javascript">
    var app = new Vue({
        el: '#app_choice-t-shirt',
        data: {
            arrowSrc: "./pictures/arrow-up.png",
            isSort: true,
            selected: "",
            reserveArrayCatalog: [{
                'ID': '1'
            }],
            mainArrayCatalog: [{
                'ID': '1'
            }],
            mainArrayCategory: [{
                'ID': '1'
            }],
        },
        created() {
            this.startCatalog();
        },
        methods: {
            removeFilterArray() {
                this.selected = "";
                this.filterArray();
            },
            filterArray() {
                switch (this.selected) {
                    case "": {
                        this.mainArrayCatalog = this.reserveArrayCatalog;
                        break;
                    }
                    case "1": {
                        function filterByID(item) {
                            if (item.genderID === "1") {
                                return true
                            }
                            return false;
                        }
                        this.mainArrayCatalog = this.reserveArrayCatalog.filter(filterByID);
                        break;
                    }
                    case "2": {
                        function filterByID(item) {
                            if (item.genderID === "2") {
                                return true
                            }
                            return false;
                        }
                        this.mainArrayCatalog = this.reserveArrayCatalog.filter(filterByID);
                        break;
                    }

                }
                if (!this.isSort) {
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(a.cost) - parseFloat(b.cost);
                    });
                } else {
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(b.cost) - parseFloat(a.cost);
                    });
                }
            },
            startCatalog() {
                <?php
                $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
                $result = $connection->query('SELECT `top_clothes`.`ID`, `category_clothes`.`ID` AS `CategoryClothesID`, `top_clothes`.`Name` AS `Name`,`ImageID`,`Image`,`top_clothes`.`Description`,`Cost`,`NameColor`, `NameMaterial`, `GenderID` FROM `top_clothes`, `category_clothes`, `top_clothes_image`,`color`, `material` WHERE `category_clothes`.`ID` = `top_clothes`.`CategoryID` AND `top_clothes_image`.`ID` = `top_clothes`.`ImageID` AND `top_clothes`.`MaterialID` = `material`.`ID` AND `top_clothes`.`ColorID` = `color`.`ID` ORDER BY `top_clothes`.`Cost` DESC;'); // запрос на выборку
                $array3 = array();
                while ($row = $result->fetch_assoc()) {
                    $array_test['id'] = $row['ID'];
                    $array_test['image'] = "data:image/png;base64," . base64_encode($row['Image']);
                    $array_test['cost'] = $row['Cost'];
                    $array_test['description'] = $row['Description'];
                    $array_test['nameMaterial'] = $row['NameMaterial'];
                    $array_test['imageID'] = $row['ImageID'];
                    $array_test['name'] = $row['Name'];
                    $array_test['categoryClothesID'] = $row['CategoryClothesID'];
                    $array_test['genderID'] = $row['GenderID'];
                    $array_test['nameColor'] = $row['NameColor'];
                    array_push($array3, $array_test);
                }
                mysqli_close($connection);
                ?>
                this.mainArrayCatalog = '<?php echo json_encode($array3); ?>';
                this.mainArrayCatalog = $.parseJSON(this.mainArrayCatalog);
                this.reserveArrayCatalog = this.mainArrayCatalog;
                <?php
                $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
                $result = $connection->query('SELECT `ID`,`Name` FROM `category_clothes` '); // запрос на выборку
                $array3 = array();
                while ($row = $result->fetch_assoc()) {
                    $array_test['id'] = $row['ID'];
                    $array_test['name'] = $row['Name'];
                    array_push($array3, $array_test);
                }
                mysqli_close($connection);
                ?>
                this.mainArrayCategory = '<?php echo json_encode($array3); ?>';
                this.mainArrayCategory = $.parseJSON(this.mainArrayCategory);
            },
            allCategory() {
                this.mainArrayCatalog = this.reserveArrayCatalog;
                if (!this.isSort) {
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(a.cost) - parseFloat(b.cost);
                    });
                } else {
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(b.cost) - parseFloat(a.cost);
                    });
                }
            },
            createCookieTShirt: function(event) {
                localStorage.setItem('clothesID', event.target.id);
            },
            filterCategory: function(event) {
                function filterByID(item) {
                    if (item.categoryClothesID === event.target.id) {
                        return true
                    }
                    return false;
                }
                this.mainArrayCatalog = this.reserveArrayCatalog.filter(filterByID);
                if (!this.isSort) {
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(a.cost) - parseFloat(b.cost);
                    });
                } else {
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(b.cost) - parseFloat(a.cost);
                    });
                }
            },
            sortTShirt() {
                if (this.isSort) {
                    this.arrowSrc = "./pictures/arrow-down.png";
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(a.cost) - parseFloat(b.cost);
                    });
                } else {
                    this.arrowSrc = "./pictures/arrow-up.png";
                    this.mainArrayCatalog.sort(function(a, b) {
                        return parseFloat(b.cost) - parseFloat(a.cost);
                    });
                }
                this.isSort = !this.isSort;

            },

        },
        computed: {
            sortArrow() {
                return this.arrowSrc;
            },
            createCatalog() {
                return this.mainArrayCatalog;
            },
            createCategoryCatalog() {
                return this.mainArrayCategory;
            }
        }
    })
</script>

</html>