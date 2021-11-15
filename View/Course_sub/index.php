<?php if (empty($this->oCourses)): ?>
    <p class="bold">There is no Data.</p>
<?php else: ?>
    <table>
        <thead>
        <th>Sub Course</th>
    </thead>
    <tbody>
        <?php foreach ($this->oCourses as $oCourse): ?>
            <tr>
                <td><?= htmlspecialchars($oPost->student_firstname . ' ' . $oPost->student_lastname) ?></td>
                <td><?= htmlspecialchars($oPost->course_name) ?></td>
            </tr>

        <?php endforeach ?>
    </tbody>
    </table>
<?php endif ?>

