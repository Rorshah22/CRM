<?php include __DIR__.'/../header.php'; ?>

<h1>Оставьте заявку</h1>
    <?php if (!empty($error)):?>
    <p class="alert alert-danger"><?= $error?></p>
    <?php endif;?>
<form action="/request" method="post">
    <div class="mb-3">
    <label class="form-label" for="name">Имя</label>
    <input class="form-control" type="text" name="name" id="name"  required value="<?= $_POST['name']?>">
    </div>
    <div class="mb-3">
    <label class="form-label" for="lastName">Фамилия</label>
    <input class="form-control" type="text" name="lastName" id="lastName"  required value="<?= $_POST['lastName']?>">
    </div>
    <div class="mb-3">
    <label class="form-label" for="phone">Телефон</label>
    <input class="form-control" type="tel" name="phone" id="phone" required value="<?= $_POST['phone']?>">
    </div>
    <div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email"  required value="<?= $_POST['email']?>">
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Отправить">
    </div>
</form>

<?php include __DIR__.'/../footer.php'; ?>
