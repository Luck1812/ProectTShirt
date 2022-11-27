<link href="../menu/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="../menu/css2/style.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<div id="app_menu">
    <div id="header">
        <div id="container-header">
            <div id="header-content">
                <a style="padding-left: 20px;" href="../index.php"><img src="../menu/pictures/logo.png" class="logo" alt=""></a>
                <div id="navbar-main">
                    <ul id="navbar">
                        <li><a class="active" href="../index.php">Новинки</a></li>
                        <li><a href="../choice-t-shirt/choice-t-shirt.php">Заказ</a></li>
                        <li><a href="../about/about.php">О нас</a></li>
                        <li><a href="../contact/contact.php">Контакты</a></li>
                        <li><a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Мои заказы</a></li>
                        <a href="#" id="close"><i></i></a>
                        <li><a href="#" @click="isActiveEntry = true">Вход</a></li>
                        <li><a href="../profile/profile.php">Аккаунт</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  <div class="modal" :class="{ modal_active : isActiveEntry }"  style="overflow:hidden;">
      <div class="modal__content" style="overflow:hidden;">
        <button class="modal__close-button" @click="isActiveEntry = false"><img src="../menu/img/close3.png" width="16" alt=""></button>
        <!-- Контент модального окна -->
        <div  class="modal__title">
          <h1>Вход</h1>
        </div>
        <div class="modal__content">
          <input class="modal__e-mail" placeholder="E-mail"/>
          <input type="password" class="modal__password" placeholder="Пароль"/>
          <p href="" class="modal__registry" @click="isActiveEntry = false; isActiveRegistry = true;">Зарегистрироваться</p>
        </div>
        <div class="modal__footer">
          <button>Войти</button>
        </div>
      </div>
  </div>
  <div class="modal" :class="{ modal_active : isActiveRegistry }">
    <div class="modal__content" style="overflow:hidden;">
      <button  class="modal__close-button" @click="isActiveRegistry = false"><img  src="../menu/img/close3.png" width="16" alt=""></button>
      <!-- Контент модального окна -->
      <div class="modal__title">
        <h1>Регистрация</h1>
      </div>
      <div class="modal__content">
        <input class="modal__e-mail" placeholder="E-mail"/>
        <input style="margin-bottom: 15px !important;" type="password" class="modal__password" placeholder="Пароль"/>
        <input type="password" class="modal__password" placeholder="Повторите пароль"/>
        <p href="" class="modal__registry" @click="isActiveEntry = true; isActiveRegistry = false;">Вход</p>
      </div>
      <div class="modal__footer">
        <button @click="registration_user();">Зарегистрироваться</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  var app = new Vue({
    el: '#app_menu',
    data:{
      isActiveEntry:false,
      isActiveRegistry: false,
      eMailField: ""
    },
    methods:{
      registration_user(){
        <?php 
          $connection = mysqli_connect('localhost','root','','tshirt');
          $sql = "SELECT * FROM registration_user";
          $massive = mysqli_query($connection, $sql); 
          $data = mysqli_fetch_assoc($massive);
          foreach($data as $key => $value){
            echo "<script>console.log('Debug Objects2: " . $value . "' );</script>";
          }
          mysqli_close($connection);
          ?>
      }
    }
  })
  </script>