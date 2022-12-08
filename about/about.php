<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../styles_main.css">
    <title>Мы</title>
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');

        .section {
            width: 100%;
            min-height: 100vh;
        }

        #app_about {
            font-family: 'Lobster', cursive !important;
        }

        .container {
            width: 80%;
            display: block;
            margin: auto;
            padding-top: 100px;
        }

        .content-section {
            float: left;
            width: 55%;
        }

        .image-section {
            float: right;
            width: 40%;
        }

        .image-section img {
            width: 100%;
            height: auto;
        }

        .content-section .title {
            text-transform: uppercase;
            font-size: 28px;
        }

        .content-section .content h3 {
            margin-top: 20px;
            color: #5d5d5d;
            font-size: 21px;
        }

        .content-section .content p {
            margin-top: 10px;
            font-family: sans-serif;
            font-size: 18px;
            line-height: 1.5;
        }

        .content-section .social i {
            color: #a52a2a;
            font-size: 30px;
            padding: 0px 10px;
        }

        .content-section .social i:hover {
            color: #3d3d3d;
        }

        @media screen and (max-width: 768px) {
            .container {
                width: 80%;
                display: block;
                margin: auto;
                padding-top: 50px;
            }

            .content-section {
                float: none;
                width: 100%;
                display: block;
                margin: auto;
            }

            .image-section {
                float: none;
                width: 100%;

            }

            .image-section img {
                width: 100%;
                height: auto;
                display: block;
                margin: auto;
            }

            .content-section .title {
                text-align: center;
                font-size: 19px;
            }

            .content-section .social {
                text-align: center;
            }

        }
    </style>
    <?php include('../menu/menu.php'); ?>
    <div id="app_about">


        <div id="container">
            <section id="page-header" class="about-header">

                </head>

                <body>
                    <div class="section">
                        <div class="container">
                            <div class="content-section">
                                <div class="title">
                                    <h1>T-shirt</h1>
                                </div>
                                <div class="content">
                                    <p>Магазин ориентируется на более молодых людей и всегда готов угодить интересам и запросам этой аудитории</p>
                                    <p>
                                        Наши клиенты – это молодые люди, которые любят приключения, отлично разбираются в новых трендах,
                                        любят музыку,
                                        активно пользуются социальными сетями и новыми технологиями.</p>
                                </div>
                            </div>
                            <div class="image-section">
                                <img src="../about/img_ab/img.jpeg">
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="container">

                            <div class="content-section">
                                <div class="title">
                                    <h1>Популярные вопросы</h1>
                                </div>
                                <div class="content">
                                    <h3></h3>
                                    <p>Как совершить покупку? наши эскизы всегда следуют трендам и каждый месяц пополняются и самое важное,что для них действует одна и та же цена. Зарегестрируйтесь и укажите данные, дабы совершить заказ. Мы обещаем вам понравится наш товар! </p>
                                    <p>Какова цена наших эскизов? Любой эскиз независимо от категории по одной скромной цене в 500 рублей. Еще одна причина выбрать нас!</p>
                                    <p>Есть ли гарантия? Гарантия есть на 2 месяца. Для этого напишите к нам на почту,указанный на страничке "Контакты" и отправьте свой электронный чек.Мы обязательно с вами свяжемся, ведь вы важны для нас!</p>
                                </div>
                            </div>
                            <div class="image-section">
                                <img src="../about/img_ab/esk12.jpg">
                            </div>
                        </div>
                    </div>

            </section>
        </div>

    </div>

    <?php include('../footer/footer.php'); ?>
    <script src="../script.js"></script>
</body>

</html>