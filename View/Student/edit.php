
<?php if (empty($this->oPost)): ?>
    <p class="error">Post Data Not Found!</p>
<?php else: ?>

    <form action="" method="post">
        
    <p><label for="Firstname">First Name:</label><br />
        <input type="text" name="firstname" id="firstname" value="<?=htmlspecialchars($this->oPost->firstname)?>" required="required" />
    </p>

    <p><label for="lastname">Last Name:</label><br />
        <input type="text" name="lastname" id="lastname" value="<?=htmlspecialchars($this->oPost->lastname)?>"required="required"/>
    </p>
    
    <p><label for="dob">DOB:</label><br />
        <input type="date" name="dob" id="dob" value="<?=htmlspecialchars($this->oPost->dob)?>"required="required" />
    </p>

    <p><label for="contact_no">Contact No:</label><br />
        <input type="text" name="contact_no" id="contact_no"  value="<?=htmlspecialchars($this->oPost->contact_no)?>" required="required"/>
    </p>
    <p><input type="submit" name="edit_submit" value="Update" /></p>
    </form>
<?php endif ?>

