<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="./styles_main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fasthand&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('./menu/menu.php'); ?>
    <div id="app_index" style="font-size:40px;">
        <div id="app_content">
            <section id="hero">
                <div id="hero-container">
                    <h4>Создай свой тренд!</h4>
                    <h2>Новые идеи для твоей вещи</h2>
                    <h1>Именно твой продукт</h1>
                    <p>Узнай больше и закажи свою вещь</p>
                    <button @click="goOverNextPage();">Создать заказ</button>
                </div>
            </section>
            <div id="container">
                <div id="modalWin" class="modal">
                    <div class="modal-window">
                        <button class="btn-close" data-easy-toggle="#modalWin" data-easy-class="show">X</button>
                    </div>
                    <div class="overlay">
                    </div>
                </div>



                <section id="feature" class="section-p1">
                    <div class="fe-box">
                        <img src="./images/f1.png" alt>
                        <h6>Бесплатная доставка</h6>
                    </div>
                    <div class="fe-box">
                        <img src="./images/f2.png" alt>
                        <h6>Быстро</h6>
                    </div>
                    <div class="fe-box">
                        <img src="./images/f3.png" alt>
                        <h6>Экономия</h6>
                    </div>
                    <div class="fe-box">
                        <img src="./images/f4.png" alt>
                        <h6>Новинки</h6>
                    </div>
                    <div class="fe-box">
                        <img src="./images/f5.png" alt>
                        <h6>Качество</h6>
                    </div>
                    <div class="fe-box">
                        <img src="./images/f6.png" alt>
                        <h6>Поддержка 24/7</h6>
                    </div>

                </section>

                <section id="product1" class="section-p1">
                    <h2>Наши новинки</h2>
                    <p>Новая коллекция эскизов для твоей футболки</p>
                    <div class="pro-container">
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk1.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk2.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk3.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk4.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk5.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk6.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk7.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk8.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk9.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk10.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk11.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./products/esk12.jpg" alt="">
                            <div class="des">
                                <span>Крутая нашивка</span>
                                <h5> Аниме </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                    </div>
                </section>

                <section id="product1" class="section-p1">
                    <h2>Выбери на чем будет твой рисунок</h2>
                    <p>Коллекция качественных вещей</p>
                    <div class="pro-container">
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl1.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl2.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl3.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl4.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl5.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl6.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl7.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl8.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>p
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl9.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl10.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl3.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                        <div class="pro" @click="goOverNextPage();">
                            <img src="./clothes/cl4.jpg" alt="">
                            <div class="des">
                                <span>Футболка</span>
                                <h5> Хлопок 100% </h5>
                            </div>
                            <a href="./choice-t-shirt/choice-t-shirt.php"><i class="fal fa-shopping-cart cart"></i></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include('./footer/footer.php'); ?>
    <script src="script.js"></script>
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
</body>
<script type="text/javascript">
    var app = new Vue({
        el: '#app_index',
        methods: {
            goOverNextPage() {
                window.location.href = './choice-t-shirt/choice-t-shirt.php';
            }
        },
    })
</script>

</html>