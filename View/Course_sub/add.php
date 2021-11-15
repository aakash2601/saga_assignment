
<form action="" method="post">
    <p><label for="student">Student:</label><br />
        <select id='student_id' required="required" ></select>
        <?php foreach ($this->oStudents as $oStudent): ?>
        <option value="<?php echo $oStudent->id; ?>">"<?php echo $oStudent->firstname . ' ' . $oStudent->lastname; ?>"</option>
        }
    <?php endforeach ?>
</p>

<p><label for="Course">Course:</label><br />
    <select id='course_id' required="required" ></select>
    <?php foreach ($this->oCourses as $oCourse): ?>
    <option value="<?php echo $oCourse->id; ?>">"<?php echo $oCourse->course_name; ?>"</option>
    }
<?php endforeach ?>
</p>

<p><input type="submit" name="add_submit" value="Add" /></p>
</form>

