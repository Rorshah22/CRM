<?php include __DIR__.'/../header.php'; ?>
<div style="max-width: 600px; margin: 50px auto">
<h1>Оставьте заявку</h1>
<form action="/request" method="post">
    <div class="mb-3">
    <label class="form-label" for="name">Имя</label>
    <input class="form-control" type="text" name="name" id="name">
    </div>
    <div class="mb-3">
    <label class="form-label" for="last-name">Фамилия</label>
    <input class="form-control" type="text" name="last-name" id="last-name">
    </div>
    <div class="mb-3">
    <label class="form-label" for="phone">Телефон</label>
    <input class="form-control" type="tel" name="phone" id="phone">
    </div>
    <div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email">
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Отправить">
    </div>
</form>
</div>
<?php include __DIR__.'/../footer.php'; ?>
