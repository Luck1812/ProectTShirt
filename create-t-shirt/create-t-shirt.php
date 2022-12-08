<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="./css/styles.css" rel="stylesheet" />
</head>

<body class="test">
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
  <div id="app_create-t-shirt">
    <div id="container">
      <div class="main_form">
        <div class="t-shirt_layout">
          <div class="left-arrow" style="margin-top: 200px; height: 70px">
            <button style="border: none; cursor:pointer; background-color: whitesmoke; height:fit-content" @click="backSketch();"><img class="left-arrow-img" src="./pictures/left-arrow.png"></img></button>
          </div>
          <div class="t-shirt" style="max-height:650px;">
            <img class="t-shirt-img" :src="mainTShirt"></img>
            <img class="selected_sketch_for_clothes" :src="selectMainImage"></img>
          </div>
          <div class="rigt-arrow" style="margin-top: 200px; height: 70px">
            <button style="border: none; cursor:pointer; background-color: whitesmoke;" @click="nextSketch();"><img class="right-arrow-img" src="./pictures/right-arrow.png"></img></button>
          </div>
        </div>
        <div class="sketch-category">
          <?php
          $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
          $result = $connection->query('SELECT * FROM `category_image`;'); // запрос на выборку
          $row = $result->fetch_all(MYSQLI_ASSOC);
          $count = 0;
          while ($count != count($row)) // получаем все строки в цикле по одной
          {
            echo "<div id=" . $row[$count]['ID'] . " class='list_item' @click='createSketchCatalog'>";
            echo $row[$count]['Name'];
            echo '</div>';
            $count += 1;
          }
          mysqli_close($connection);
          ?>
        </div>
      </div>

      <div class="secondary_layout">
        <div class="first_choice">
          <div class="select_sketch">
            <img :src="backImage" class="back_sketch" width="150" height="150">
            <img :src="selectImage" class="selection_sketch" style="margin-left: 20px; margin-right: 20px;" width="200" height="200">
            <img :src="nextImage" class="next_sketch" width="150" height="150">
          </div>
          <div class="button_create_t-shirt">
            <a @click="completionDate();">{{ allCost }}₽ Купить</a>
          </div>
        </div>

        <div class="select_parametrs">
          <div class="choise_size">
            <div class="size">
              <div class="size_clothes">Размер</div>
              <div class="selected_size">{{ currentDesignation }}</div>
            </div>
            <div class="list_size">
              <?php
              $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
              $result = $connection->query('SELECT `Designation` FROM `size`;'); // запрос на выборку
              while ($row = $result->fetch_assoc()) // получаем все строки в цикле по одной
              {
                echo " <div @click='changeDesignation' id=" . $row['Designation'] . ">";
                echo $row['Designation'];
                echo '</div>';
              }
              mysqli_close($connection);
              ?>

            </div>
          </div>
        </div>
      </div>
      <div>
      </div>


    </div>
  </div>
  <?php include('../footer/footer.php'); ?>
</body>
<script type="text/javascript">
  var app = new Vue({
    el: '#app_create-t-shirt',
    data: {
      arraySketch: [{
        'Image': './pictures/default.jpg'
      }],
      arrayMainTShirt: [{
        'Image': './pictures/t-shirt.png'
      }],
      oneSketch: "",
      twoSketch: "",
      threeSketch: "",
      currentPage: 1,
      currentPageBack: 0,
      currentPageNext: 2,
      allCost: 0,
      currentDesignation: "XS",

      name: "",
      surname: "",
      patronymic: "",
      seriesPassport: "",
      numberPassport: "",
      numberPhone: "",
      postalCode: "",
      userID: "",
    },
    created() {
      this.startCatalog();
      this.createMainTShirt();
    },
    methods: {
      async completionDate() {
        <?php
        $userID = $_COOKIE["userID"];
        ?>
        this.userID = '<?php echo $userID; ?>';
        if (this.userID != "") {
          let response;
          async function flow(userID, currentDesignation, TShirtID, sketchID) {
            let add = $.ajax({
              url: '../mainCode.php',
              dataType: 'html',
              method: 'get',
              data: {
                func_user: 'create_order',
                "userID": userID,
                "currentDesignation": currentDesignation,
                "TShirtID": TShirtID,
                "sketchID": sketchID
              },
              success: function(data) {
                response = data;
              },
              error: function() {
                console.log('ERROR');
              }
            });
            let result = await add;
          }
          if (this.arraySketch.length == 1) {
            let result2 = await flow(this.userID, this.currentDesignation, localStorage.getItem('clothesID'), this.arraySketch[this.currentPage - 1]['ID']);
          } else{
            let result2 = await flow(this.userID, this.currentDesignation, localStorage.getItem('clothesID'), this.arraySketch[this.currentPage]['ID']);
          }
          if (response == "true") {
            alert("Вы успешно создали заказ");
            window.location.href = '../index.php';
          } else {
            alert("Сначала нужно заполнить данные в профиле");
          }


        } else {
          alert("Вы не вошли в аккаунт");
        }

      },
      changeDesignation: async function(event) {
        this.currentDesignation = event.target.id;
      },
      createSketchCatalog: async function(event) {
        let response;
        async function flow(catalogID) {
          let add = $.ajax({
            url: '../mainCode.php',
            dataType: 'html',
            method: 'get',
            data: {
              func_user: 'create_catalog',
              "catalogID": catalogID,
            },
            success: function(data) {
              response = $.parseJSON(data);
            },
            error: function() {
              console.log('ERROR');
            }
          });
          let result = await add;
        }
        let result2 = await flow(event.target.id);
        this.arraySketch = response;
        this.currentPage = 1;
        this.currentPageBack = 0;
        this.currentPageNext = 2;
      },

      async startCatalog() {
        let response;
        async function flow(catalogID) {
          let add = $.ajax({
            url: '../mainCode.php',
            dataType: 'html',
            method: 'get',
            data: {
              func_user: 'create_catalog',
              "catalogID": catalogID,
            },
            success: function(data) {
              response = $.parseJSON(data);
            },
            error: function() {
              console.log('ERROR');
            }
          });
          let result = await add;
        }
        let result2 = await flow("1");
        this.arraySketch = response;
      },
      async createMainTShirt() {
        let response;
        async function flow(TShirtID) {
          let add = $.ajax({
            url: '../mainCode.php',
            dataType: 'html',
            method: 'get',
            data: {
              func_user: 'create_mainTShirt',
              "TShirtID": TShirtID,
            },
            success: function(data) {
              response = $.parseJSON(data);
            },
            error: function() {
              console.log('ERROR');
            }
          });
          let result = await add;
        }
        let result2 = await flow(localStorage.getItem('clothesID'));
        this.arrayMainTShirt = response;
        this.allCost = Number(this.arrayMainTShirt[0]['Cost']) + 500;
      },
      getCookie(name) {
        var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
        return matches ? decodeURIComponent(matches[1]) : undefined;
      },
      switchBackSketch(page) {
        switch (page) {
          case 0: {
            page = this.arraySketch.length - 1;
            break;
          }
          default: {
            page -= 1;
          }
        }
        return page;
      },
      switchNextSketch(page) {
        switch (page) {
          case this.arraySketch.length - 1: {
            page = 0;
            break;
          }
          default: {
            page += 1;
          }
        }
        return page;
      },
      backSketch() {
        if (this.arraySketch.length != 1) {
          this.currentPageBack = this.switchBackSketch(this.currentPageBack);
          this.currentPage = this.switchBackSketch(this.currentPage);
          this.currentPageNext = this.switchBackSketch(this.currentPageNext);
        }
      },
      nextSketch() {
        if (this.arraySketch.length != 1) {
          this.currentPageBack = this.switchNextSketch(this.currentPageBack);
          this.currentPage = this.switchNextSketch(this.currentPage);
          this.currentPageNext = this.switchNextSketch(this.currentPageNext);
        }

      },
    },
    computed: {
      backImage() {
        if (this.arraySketch.length == 2) {
          return "data:image/png;base64," + this.arraySketch[this.currentPageBack]['Image'] + "";
        } else if (this.arraySketch.length == 1) {
          return './pictures/default.jpg';
        }
        return "data:image/png;base64," + this.arraySketch[this.currentPageBack]['Image'] + "";
      },
      selectImage() {
        if (this.arraySketch.length == 1) {
          return "data:image/png;base64," + this.arraySketch[this.currentPage - 1]['Image'] + "";
        }
        return "data:image/png;base64," + this.arraySketch[this.currentPage]['Image'] + "";
      },
      nextImage() {
        if (this.arraySketch.length <= 2) {
          return './pictures/default.jpg';
        }
        return "data:image/png;base64," + this.arraySketch[this.currentPageNext]['Image'] + "";
      },
      selectMainImage() {
        if (this.arraySketch.length == 1) {
          return "data:image/png;base64," + this.arraySketch[this.currentPage - 1]['Image'] + "";
        }
        return "data:image/png;base64," + this.arraySketch[this.currentPage]['Image'] + "";
      },
      mainTShirt() {
        return "data:image/png;base64," + this.arrayMainTShirt[0]['Image'] + "";
      }
    }
  })
</script>

</html>