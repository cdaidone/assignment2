<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> DDS Sales Tracker - Update </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="js/update.js"></script>
</head>

<body>
<div id="container">

<h1>DDS Sales Tracker: Update Existing Record</h1>
<!-- this page opens if you selected edit or delete
     in socks_edit.php and submitted the form
     and this page chooses which form to show you
-->

<div id="inner_content">

<?php
// erase any HTML tags and then escape all quotes
function sanitizeMySQL($conn, $var) {
    $var = strip_tags($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
}

// check if _choice_ was sent here via POST ...
if ( isset($_POST['choice']) ) {
    $choice = $_POST['choice'];

    // OPTION 1 - delete
    // check if delete record was selected ...
    if ($choice == "delete") {
        // sanitize the id
        $id = sanitizeMySQL($conn, $_POST['id']);
?>
<!-- start plain HTML -->

        <form id="salesdelete" class="smallform" method="post"  action="inventory_update.php" autocomplete="off">
            <p>Are you sure you want to DELETE this record?</p>

            <p><label>
            <input type="radio" name="destroy" id="yes" value="yes"> Yes, delete this record</label></p>

            <p><label>
            <input type="radio" name="destroy" id="no" value="no"> No, do not delete it</label></p>

            <!-- pass _id_ value to the next script -->
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

            <input type="submit" id="submit" value="Submit">
        </form>

<?php
    // end of the ($choice == "delete") code

    // OPTION 2 - update
    // check if update record was selected ...
    } else if ($choice == "update") {
        // create PHP variables from the hidden form values
        $id = sanitizeMySQL($conn, $_POST['id']);
        // these are simply written into the form on THIS page, below
        // and so I did not sanitize them
        $name = $_POST['name'];
        $school = $_POST['school'];
        $grade = $_POST['grade'];
        $plan = $_POST['plan'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
?>
        <!-- switch from PHP to HTML
             show entire form with the PHP values filled in ...
             note: the select options employ abbreviated PHP if-statements
             which are nec. to insert "selected" in the option tag
             -->

        <p class="middle">Make changes in one or more fields. Then
        click the Update Record button.</p>

        <div id="sales">

        <form id="salesupdate" method="post" action="inventory_update.php" autocomplete="off">
            <!-- retain id to be passed to JS file -->
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <label for="name">Name </label>
            <input type="text" name="name" id="name" maxlength="25" required value="<?php echo stripslashes($name) ?>">
            <!-- previously any single quote was escaped with a backslash
                 we use stripslashes() to get rid of the slashes -->

            <label for="school">School </label>
            <select name="school" id="school" required>
            <!-- each option requires this test to see if value matches:
                 if value of $style == (some value), then write "selected"
                 into the option tag - only one will be selected
                 -->
                 <option value="" <?php echo $school == "" ? " selected" : ""; ?>></option>
                 <option value="boca" <?php echo $school == "boca" ? " selected" : ""; ?>>Boca Raton Christian School</option>
                 <option value="spanish" <?php echo $school == "spanish" ? " selected" : ""; ?>>Spanish River Christian School</option>
                 <option value="paul" <?php echo $school == "paul" ? " selected" : ""; ?>>St. Paul Lutheran School</option>
                 <option value="abundent" <?php echo $school == "abundent" ? " selected" : ""; ?>>Abundent Life Lutheran School</option>
                 <option value="evert" <?php echo $school == "evert" ? " selected" : ""; ?>>Evert Tennis Academy</option>
                 <option value="harid" <?php echo $school == "harid" ? " selected" : ""; ?>>Harid Conservatory</option>
             </select>

             <label for="grade">Grade </label>
             <input type="text" name="grade" id="grade" maxlength="5" required value="<?php echo $grade ?>">

             <label for="plan">Plan </label>
             <input type="text" name="plan" id="plan" maxlength="20" required value="<?php echo $plan ?>">

             <label for="quantity">Quantity </label>
             <input type="number" name="quantity" id="quantity" max="10" required value="<?php echo $quantity ?>">

             <label for="price">Price </label>
             <input type="number" name="price" id="price" max="9999.99" step="0.01" required value="<?php echo $price ?>">
             <!-- step="0.01" (above) allows decimal to be entered -->

         	<input type="submit" id="submit" value="Update Record">
         </form>
     </div> <!-- close the socks div -->

<?php
    } // end of if ($choice = "update")
} else {
    // if _choice_ was NOT sent here via POST, write a message with HTML
    // break out of PHP to write HTML next ...
?>

    <p class='announce'>No record was selected!</p>


<?php
// return to PHP just to close the if-statement
} // end of if-else isset($_POST['choice'])
?>
</div> <!-- close inner_content -->

<!-- below will print no matter what -->

<p class="middle"><a href="inventory_update.php">View All Sales</a></p>

<p class="middle"><a href="enter_new_record.php">Add a New Sale</a></p>

</div> <!-- close container -->
</body>
</html>
