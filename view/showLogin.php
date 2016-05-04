<?php
    $link='
        <link rel="stylesheet" href="/mysite/css/index.css">
        <script defer src="/mysite/js/admin.js"></script>';
 ?>
<?php ob_start(); ?>
<div class="container">
    <h3>Авторизация:</h3>
    <form role="_form_authorization" name="form_authorization" action="/mysite/index.php/checklogin/" method="POST" onsubmit="return validate()">
        <div class="form-group" >
          <label for="login">Логин:</label>
          <input type="text" class="form-control" id="_login" name="login" placeholder="Логин">
        </div>
        <div class="form-group">
          <label for="pass">Пароль:</label>
          <input type="text" class="form-control" id="_pass" name="pass" placeholder="Пароль">
        </div>
        <button type="reset" class="btn btn-default">Очистить</button>
        <button type="submit" name="auth" class="btn btn-default">Авторизоваться</button>
    </form>
</div>

<?php $content=ob_get_clean(); ?>

<?php include 'view/layout.php'; ?>