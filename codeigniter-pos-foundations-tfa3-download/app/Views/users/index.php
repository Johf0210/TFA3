<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<p class="eyebrow">USER ACCOUNTS</p>
<h1>User Accounts</h1>
<p class="lead">User records retrieved from the database.</p>
<p><a class="button" href="<?= site_url('users/new') ?>">Add user</a></p>
<?php if (session('success')): ?><p class="success-message"><?= esc(session('success')) ?></p><?php endif; ?>
<div class="table-wrap">
    <table>
        <thead><tr><th>Avatar</th><th>Username</th><th>Full name</th><th>Created</th><th>Action</th></tr></thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><img class="avatar" src="<?= base_url('uploads/' . ($user['avatar'] ?: 'avatar-placeholder.svg')) ?>" alt="Avatar for <?= esc($user['full_name']) ?>"></td>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>
                <td><a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
