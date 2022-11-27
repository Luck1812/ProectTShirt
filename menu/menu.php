<link href="../menu/css/styles.css" rel="stylesheet" />
<link rel="stylesheet" href="../menu/css2/style.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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
            <li><a style="visibility:hidden" :class="{ visible__object: isActiveAccount }" href="../profile/profile.php">Аккаунт</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" :class="{ modal_active : isActiveEntry }" style="overflow:hidden;">
    <div class="modal__content" style="overflow:hidden;">
      <button class="modal__close-button" @click="isActiveEntry = false"><img src="../menu/img/close3.png" width="16" alt=""></button>
      <!-- Контент модального окна -->
      <div class="modal__title">
        <h1>Вход</h1>
      </div>
      <div class="modal__content">
        <input v-model="entryEMailField" class="modal__e-mail" placeholder="E-mail" />
        <input v-model="entryPasswordField" type="password" class="modal__password" placeholder="Пароль" />
        <p href="" class="modal__registry" @click="isActiveEntry = false; isActiveRegistry = true;">Зарегистрироваться</p>
      </div>
      <div class="modal__footer">
        <button @click="entry_user();">Войти</button>
      </div>
    </div>
  </div>
  <div class="modal" style="overflow:hidden;" :class="{ modal_active : isActiveRegistry }">
    <div class="modal__content">
      <button class="modal__close-button" @click="isActiveRegistry = false"><img src="../menu/img/close3.png" width="16" alt=""></button>
      <!-- Контент модального окна -->
      <div class="modal__title">
        <h1>Регистрация</h1>
      </div>
      <div class="modal__content">
        <input class="modal__e-mail" v-model="regEMailField" placeholder="E-mail" />
        <input style="margin-bottom: 15px !important;" v-model="regPasswordField" type="password" class="modal__password" placeholder="Пароль" />
        <input type="password" class="modal__password" v-model="regPasswordFieldTwo" placeholder="Повторите пароль" />
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
    data: {
      isActiveEntry: false,
      isActiveRegistry: false,
      isActiveAccount: false,
      regEMailField: "",
      regPasswordField: "",
      regPasswordFieldTwo: "",
      entryEMailField: "",
      entryPasswordField: "",
      isEntry: "",
    },
    methods: {

      async entry_user() {
        if (this.entryEMailField != "" && this.entryPasswordField != "") {
          var response = '';
          async function flow(email, pass){
            let add = $.ajax({
            url: './mainCode.php',
            method: "get",
            dataType: 'html',
            data: {
              func_user: 'func_login_user',
              "email": email,
              "pass": pass,
            },
            success: function(data) {
                  if (data == 1) {
                    response = data;
              } else {
                alert("Неверный e-mail или пароль");
              }
            },
            error: function() {
              console.log('ERROR');
            }
          }) ;
          let result = await add;
          } 
          let result2 = await flow(this.entryEMailField, this.entryPasswordField);
           if(response == 1)
          {
            this.isActiveEntry = false;
            this.isActiveAccount = true;
            response = 0;
          }
        } else {
          alert("Пустые поля");
        }
      },
      registration_user() {
        if (this.regEMailField != "" && this.regPasswordField != "" && this.regPasswordFieldTwo != "") {
          if (this.ValidMail(this.regEMailField)) {
            if (this.regPasswordField == this.regPasswordFieldTwo) {
              this.isActiveRegistry = false;
              $.ajax({
                url: './mainCode.php',
                type: "get",
                dataType: 'html',
                data: {
                  func_user: 'func_add_user',
                  "email": this.regEMailField,
                  "pass": this.regPasswordField,
                },
                success: function(data) {
                  console.log(data.pass);
                },
                error: function() {
                  console.log('ERROR');
                }
              })
              alert("Вы успешно зарегистрировались");
              this.regEMailField = "";
              this.regPasswordField = "";
              this.regPasswordFieldTwo = "";
            } else {
              alert("Пароли не совпадают");
            }
          } else {
            alert("Неверный формат e-mail");
          }

        } else {
          alert("Пустые поля");
        }
      },
      ValidMail(email) {
        var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
        var myMail = email;
        var valid = re.test(myMail);
        return valid;
      }
    }
  })
</script>