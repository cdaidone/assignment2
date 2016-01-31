<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title> DDS Sales Tracker Form </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"> </script>
    <script src="js/enter.js"></script>
</head>

<body>
<div id="container">

<h1>Enter New Student</h1>

<p class="middle"><a href="inventory_update.php">View All Sales</a></p>

<div id="sales">

<form id="salesform" method="post" autocomplete="off">
<!-- autocomplete="off" ensures form will be empty if user clicks
     the browser's Back button -->
    <label for="name">Student Name </label>
	<input type="text" name="name" id="name" maxlength="25" required>

    <label for="school">School </label>
    <select name="school" id="school" required>
      <option value=""></option>
      <option value="boca">Boca Raton Christian School</option>
      <option value="spanish">Spanish River Christian School</option>
      <option value="paul">St. Paul Lutheran School</option>
      <option value="abundent">Abundent Life Lutheran School</option>
      <option value="evert">Evert Tennis Academy</option>
      <option value="harid">Harid Conservatory</option>
    </select>

    <label for="grade">Grade </label>
	<input type="text" name="grade" id="grade" maxlength="20" required>

    <label for="plan">Plan</label>
    <select name="plan" id="plan" required>
        <option value=""></option>
        <option value="prepaid">Pre-Paid</option>
        <option value="ticket">Lunch Tickets</option>
    </select>

    <label for="quantity">Quantity</label>
      <input type="number" name="quantity" id="quantity" maxlength="10" required>


    <label for="price">Price </label>
	   <input type="number" name="price" id="price" max="9999.99" step="0.01" required value="<?php echo $price ?>">
    <!-- step="0.01" (above) allows decimal to be entered -->

	<input type="submit" id="submit" value="Submit">
</form>

</div>

<div id="response">
    <p class="announce">Form submitted</p>
    <p class="middle"><a href="enter_new_record.php">Return to the form</a></p>
</div>

</div> <!-- close container -->
</body>
</html>
