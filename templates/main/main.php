<?php include __DIR__.'/../header.php'; ?>
<div style="max-width: 600px; margin: 50px auto">
<h1>Оставьте заявку</h1>
<form action="/request" method="post">
    <div class="mb-3">
    <label class="form-label" for="name">Имя</label>
    <input class="form-control" type="text" name="name" id="name"  required>
    </div>
    <div class="mb-3">
    <label class="form-label" for="lastName">Фамилия</label>
    <input class="form-control" type="text" name="lastName" id="lastName"  required>
    </div>
    <div class="mb-3">
    <label class="form-label" for="phone">Телефон</label>
    <input class="form-control" type="tel" name="phone" id="phone" required>
    </div>
    <div class="mb-3">
    <label class="form-label" for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email"  required>
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Отправить">
    </div>
</form>
</div>
<?php include __DIR__.'/../footer.php'; ?>
