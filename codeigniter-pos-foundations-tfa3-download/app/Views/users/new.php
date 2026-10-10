<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">USER ACCOUNTS</p>
<h1>Add user</h1>
<p class="lead">Enter the user account details below.</p>
<?php if ($validation): ?>
    <div class="error-summary"><?= $validation->listErrors() ?></div>
<?php endif; ?>
<form class="form-card" method="post" action="<?= site_url('users/create') ?>">
    <?= csrf_field() ?>
    <label for="username">Username</label>
    <input id="username" name="username" value="<?= old('username') ?>" required minlength="3" maxlength="50">
    <label for="full_name">Full name</label>
    <input id="full_name" name="full_name" value="<?= old('full_name') ?>" required maxlength="100">
    <button class="button" type="submit">Save user</button>
</form>
<?= $this->endSection() ?>
