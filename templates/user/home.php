<?php include __DIR__ . '/../header.php'
/**
 * @var $requests \Core\Models\Client[]
 * @var $client \Core\Models\Client
 */
?>
<h1>Здравствуйте <?= $user->getUsername() ?></h1>
<p>Дата последнего входа <span class="fw-bold"> <?= $user->getLoginDate() ?> </span></p>


<!--                            <p>Комментарий: --><?php //= $client->getComment() ?><!--</p>-->

<section style="background-color: #eee;">
    <?php foreach ($requests as $client): ?>


        <div class="container my-2 py-1">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-start align-items-center">
                                <p class="fw-bold  mb-4">Заявка №<?= $client->getId() ?></p>

                            </div>
                            <div>
                                <p>Имя: <span class="mb-1"> <?= $client->getName() ?></span></p>
                                <p> Фамилия: <?= $client->getLastName() ?></p>
                                <p class="mt-3 mb-2 ">Телефон: <?= $client->getPhone() ?></p>
                                <p class="mt-3 mb-2 ">Email: <?= $client->getEmail() ?></p>
                            </div>
                            <p>Комментарии:</p>
                            <?php $comments = explode('|',$client->getComment());
                            foreach ($comments as $comment):?>
                            <?php if (!empty($comment)):?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex flex-start">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <span class="text-dark ms-2"><?=$comment?> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif;?>
                            <?php endforeach;?>

                        </div>

                        <form action="comment_add" class="card-footer py-3 border-0"
                              style="background-color: #f8f9fa;"  method="post">
                            <div class="d-flex flex-start w-100">
                                <div class="form-outline w-100">
                                     <textarea class="form-control" id="textAreaExample" rows="4"
                                               style="background: #fff;" name="comment"></textarea>
                                    <label class="form-label" for="textAreaExample">Написать комментарий</label>
                                </div>
                                <input type="hidden" name="id_comment" value="<?= $client->getId();?>">
                            </div>
                            <div class="float-end mt-2 pt-1">
                                <input type="submit" class="btn btn-primary btn-sm" value="Добавить комментарий">
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    <?php endforeach; ?>
</section>
<?php include __DIR__ . '/../footer.php' ?>
