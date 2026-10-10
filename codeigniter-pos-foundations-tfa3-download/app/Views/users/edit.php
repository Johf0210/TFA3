<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">USER ACCOUNTS</p>
<h1>Edit user</h1>
<p class="lead">Update the account and optionally replace its avatar.</p>
<?php if ($validation): ?><div class="error-summary"><?= $validation->listErrors() ?></div><?php endif; ?>
<form class="form-card" method="post" enctype="multipart/form-data" action="<?= site_url('users/' . $user['id'] . '/update') ?>">
    <?= csrf_field() ?>
    <label for="username">Username</label>
    <input id="username" name="username" value="<?= esc(old('username', $user['username'])) ?>" required minlength="3" maxlength="50">
    <label for="full_name">Full name</label>
    <input id="full_name" name="full_name" value="<?= esc(old('full_name', $user['full_name'])) ?>" required maxlength="100">
    <label for="avatar">Profile picture JPG or PNG, maximum 2 MB</label>
    <input id="avatar" name="avatar" type="file" accept="image/jpeg,image/png">
    <button class="button" type="submit">Update user</button>
</form>
<?= $this->endSection() ?>
