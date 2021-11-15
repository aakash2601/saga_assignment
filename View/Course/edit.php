
<?php if (empty($this->oPost)): ?>
    <p class="error">Post Data Not Found!</p>
<?php else: ?>

    <form action="" method="post">

        <p><label for="Coursename">Course Name:</label><br />
            <input type="text" name="course_name" id="course_name" value="<?= htmlspecialchars($this->oPost->firstname) ?>" required="required" />
            <input type="hidden" name="id" id="id" value="<?= htmlspecialchars($this->oPost->id) ?>" required="required" />
        </p>

        <p><label for="Coursedetails">Course Details:</label><br />
            <input type="text" name="course_detail" id="course_details" value="<?= htmlspecialchars($this->oPost->lastname) ?>"required="required"/>
        </p>
        <p><input type="submit" name="edit_submit" value="Update" /></p>
    </form>
<?php endif ?>

