
<form action="" method="post">
    <p><label for="Coursename">Course Name:</label><br />
        <input type="text" name="course_name" id="firstname" value="<?= htmlspecialchars($this->oPost->firstname) ?>" required="required" />
    </p>

    <p><label for="Coursedetails">Course Details:</label><br />
        <input type="text" name="course_detail" id="lastname" value="<?= htmlspecialchars($this->oPost->lastname) ?>"required="required"/>
    </p>

    <p><input type="submit" name="add_submit" value="Add" /></p>
</form>

