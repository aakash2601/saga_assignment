<p><button type="button" onclick="window.location = '<?= ROOT_URL ?>?p=course&amp;a=add'" class="bold">Add Your First Blog Post!</button></p>
<?php if (empty($this->oPosts)): ?>
    <p class="bold">There is no Course.</p>
<?php else: ?>
    <table>
        <thead>
        <th>Course</th>
    </thead>
    <tbody>
        <?php foreach ($this->oPosts as $oPost): ?>
        <h5><a href="<?= ROOT_URL ?>?p=course&amp;a=update&amp;id=<?= $oPost->id ?>">Edit</a></h5>
        <tr><td><?= htmlspecialchars($oPost->course_name) ?></td></tr>

        <p><a href="<?= ROOT_URL ?>?p=course&amp;a=delete&amp;id=<?= $oPost->id ?>">Delete</a></p>
    <?php endforeach ?>
    </tbody>
    </table>
<?php endif ?>

