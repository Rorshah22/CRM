<?php include __DIR__.'/../header.php'?>
<div style="max-width: 600px; margin: 50px auto">

<h1>Вход на сайт</h1>
<?php if (!empty($error)):?>
    <p class="alert alert-danger"><?= $error?></p>
<?php endif;?>
<form action="/login" method="post">
    <div class="mb-3">
        <label class="form-label" for="username">Имя пользователя</label>
        <input class="form-control" type="text" name="username" id="username"  required value="<?= $_POST['username']?>">
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">Пароль</label>
        <input class="form-control" type="password" name="password" id="password"  required>
    </div>

    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Вход">
    </div>
</form>
</div>
<?php include __DIR__.'/../footer.php'?>
