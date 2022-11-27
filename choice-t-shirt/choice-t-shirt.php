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
    <div id="app" >
        <?php include('../menu/menu.php'); ?>
        <div class="container">
            <div id="auxiliary-menu">
                <div class="select-filter">
                    <select class="form-select" aria-label="Default select example">
                        <option disabled selected>Фильтрация</option>
                        <option value="1">Мужская одежда</option>
                        <option value="2">Женская одежда</option>
                      </select>
                      <button class="cancel-button" ></button>
                </div>
                <div class="sort-box" style="line-height: 30px; font-size: 24px;">
                    <span>Стоимость</span>
                    <button class="sort-button" ></button>    
                </div>
            </div>
            <div class="container-for-list">
                <div id="list-item">
                    <div id="img-top-clothes">
                        <img src="./pictures/fyt-m.png" alt="t-shirt" >
                    </div>
                    <div class="name-image">
                        Мужская футболка
                    </div>
                    <div class="description-image">
                        <p>
                            Мужская футболка, с короткими рукавами и укороченным воротником
                        </p>
                    </div>
                    <div class="btn-select-clothes">
                        <a>
                            1500 ₽
                        </a>
                    </div>
                </div>
                <div id="list-item">
                    <div id="img-top-clothes">
                        <img src="./pictures/fyt-m.png" alt="t-shirt" >
                    </div>
                    <div class="name-image">
                        Мужская футболка
                    </div>
                    <div class="description-image">
                        <p>
                            Мужская футболка, с короткими рукавами и укороченным воротником 
                        </p>
                    </div>
                    <div class="btn-select-clothes">
                        <a>
                            1500 ₽
                        </a>
                    </div>
                </div>
                <div id="list-item">
                    <div id="img-top-clothes">
                        <img src="./pictures/fyt-m.png" alt="t-shirt" >
                    </div>
                    <div class="name-image">
                        Мужская футболка
                    </div>
                    <div class="description-image">
                        <p>
                            Мужская футболка, с короткими рукавами и укороченным воротником
                        </p>
                    </div>
                    <div class="btn-select-clothes">
                        <a>
                            1500 ₽
                        </a>
                    </div>
                </div>
            </div>
         
        </div>
        <?php include('../footer/footer.php'); ?>
    </div>
</body>
</html>