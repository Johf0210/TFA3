<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">CUSTOMER ACCOUNTS</p>
<h1>Add customer</h1>
<p class="lead">Enter the customer details below.</p>
<?php if ($validation): ?>
    <div class="error-summary"><?= $validation->listErrors() ?></div>
<?php endif; ?>
<form class="form-card" method="post" action="<?= site_url('customers/create') ?>">
    <?= csrf_field() ?>
    <label for="full_name">Full name</label>
    <input id="full_name" name="full_name" value="<?= old('full_name') ?>" required maxlength="100">
    <label for="email">Email</label>
    <input id="email" name="email" type="email" value="<?= old('email') ?>" required maxlength="100">
    <label for="phone">Phone</label>
    <input id="phone" name="phone" value="<?= old('phone') ?>" maxlength="20">
    <button class="button" type="submit">Save customer</button>
</form>
<?= $this->endSection() ?>
