<!-- UNCOMMENT IF SESSION VARIABLES USED
<?php session_start() ?>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- fileName.php -  DESCIRPTION
      Mike Davidovich - davidovm@csp.edu
      Written:
      Revised:
                NEXT DATE
      -->
    <title>Presentation - Page 2</title>

    <!-- W3 core CSS - UPDATE LIINKS AS NEEDED -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<?php

// serverSniffer code
$whitelist = array('127.0.0.1','::1');

if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // Credentials for localhost (Using AMPPS)
    define('DBF_SERVER', 'localhost');
    define('DBF_NAME', '??');
    define('DBF_USER', 'root');
    define('DBF_PASSWORD', 'mysql');
} else {
    // credentials for BLUEHOST server
    // https://my.bluehost.com/cgi/help/575
    // IP ADDRESS 69.89.31.208
    define('DBF_SERVER', 'localhost');
    define('DBF_NAME', '???');
    define('DBF_USER', 'mikedav1_peter');
    define('DBF_PASSWORD', 'ServerSide235');
}

/* =========================================
Functions are alphabetical
========================================= */

?>

<div class="w3-bar w3-black">
    <div class="w3-dropdown-hover">
        <a href="presentation.php"><button class="w3-button w3-black">Home</button></a>
        <div class="w3-dropdown-content w3-bar-block w3-card-4">
            <a href="presentation.php" class="w3-bar-item w3-button">Page 1</a>
            <a href="presentationPage2.php" class="w3-bar-item w3-button">Page 2</a>
        </div>
    </div>
    <a href="index.php" class="w3-bar-item w3-button">User View</a>
    <a href="edit.php" class="w3-bar-item w3-button">Edit Page</a>
</div>

<div class="w3-container w3-blue">
    <h1><strong>Sassy Scrubbers: Cleaners With Attitude</strong></h1>
    <h3><strong>Real time workflow tracking solution</strong></h3>
    <h5>Presented by David's Software Solutions</h5>
    <h5>Concept and Development by Mike Davidovich</h5>
    <h5>Monday, June 5 2017</h5>
</div>

<div class="w3-container w3-light-grey">
    <article>
        <h3><strong>A Simpler Way to Communicate</strong></h3>
        <p>David's Software Solutions has brainstormed two options to help your growing business track the completion
        of cleaned houses keep notes on your clients' needs.</p>

        <h4><strong>Multiple Interfaces (Recommended)</strong></h4>
        <p>This option creates a database that is manipulated by a separate interface for each the crew lead and the
            operations manager.  While the crew lead can update items like date/time cleaned and notes, the operations manager
            and add homes to the database and modify crew assignments and schedules.<br/><br/>Since the database is shared all
            information is real time and up to date, so there's low risk for mis-communication.<br/><br/>A simple user interface
            on both end utilizes checkboxes so that a user may make multiple updates at ones.  All fields are visable for all
            users, however some may be read only for operations vice versa.<br/><br/>We believe this is the best option becuase
            creating this more robust application will not require many additional billable hours.  The extra flexibility it will
            provide your operation is worth the small, incremental cost.</p>
        <img src="graphic/multiInterface.jpg" height="200">

        <h4><strong>Operations Focused Data Tracking</strong></h4>
        <p>An alternative option for this project is to use a single, shared interface.  Both operations and crew can access this
        one portal to update jobs and add and remove clients.  Instead of using a database, data is store in a text file. This option
        does not provide the same simplicity as the previous option even though there's only one interface.  There is high risk for
        confusion and mis-communciation in this model, however the build time is considerably less that the first option.  The client
        may wish to pursue this option for financial reasons.</p>

        <h3><strong>User Interface (UI</strong></h3>
        <p>The user iterface will be very simple in Phase I of this rollout consisting of instructions for each user's view,
        a table view with appropriate controls to select edits, and controls below the table to access functions:</p>
        <h3><strong>Field Crew UI</strong></h3>
        <img src="graphic/feildUI.PNG" height="400">
        <h3><strong>Operations Manager UI</strong></h3>
        <img src="graphic/opsUI.PNG" height="400">

        <p>To demonstrate the functionality of the field crew UI which is the core functionality of this program, your technical
            staff may wish to review <a href="proofOfConcept.php" target="_blank">this proof of concept.</a></p>

    </article>
</div>

<div class="w3-container w3-black">
    <footer>Copyright 2017 David's Sofware Solutions</footer><br />
</div>

</body>
</html>