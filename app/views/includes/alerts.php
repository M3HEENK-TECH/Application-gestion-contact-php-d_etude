<?php foreach (get_session_flash() as $key => $flash) :  ?>
    <div class="col-lg-12">
        <div class="alert alert-<?= $key ?>"><?= $flash ?></div>
    </div>
<?php endforeach; ?>

<?php foreach(get_session_errors() as $key => $errors) : ?>
    <div class="col-lg-12">
        <?php foreach ($errors as $error): ?>
            <p class="text-danger"><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>
<?php destroy_session_errors(); ?>
<?php destroy_session_flashes(); ?>