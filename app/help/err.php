<?php if (is_countable($err) && count($err) > 0): ?>
    <ul>
        <?php foreach ($err as $error): ?>
            <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
