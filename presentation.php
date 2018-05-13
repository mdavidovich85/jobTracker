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
    <title>Presentation - Page 1</title>

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
        <img src="graphic/legoCleaner.jpg" class="w3-circle" alt="Lego man cleaning." style="float: right;height: 250px;padding: 10px">
        <h3><strong>Your Business</strong></h3>
        <p>Sassy Scrubbers is known for their quirks and sass when interacting with clients making the home cleaning
        experience not just for the wealthy and upper class.  Your unique business model of providing cleaning crews
        to clean <strong><em>with</em></strong> and not just <strong><em>for</em></strong> your clients has allowed a new generation of home and apartment
        owners to enjoy a cleaning service at a price they can afford.</p>

        <p><em>But when a business grows so does the complexity.</em></p>

        <h3><strong>Our Solution</strong></h3>
        <p>David's Software Solutions is here to help you devlope a workflow tracking solutions so you can keep up to date,
            daily records of your cleaning crews' workflow.</p>

        <p><strong>To start, we need to understand some basic questions:</strong></p>

        <ul>
            <li>How many cleaning crews and homes do you have currently?</li>
            <li>Who needs access to update cleaning assigments both in the feild and in the home office?</li>
            <li>Home to be cleaned, cleaning status, time and date of cleaning, crew assigned: what other
            information does your workflow tracking system need to keep track of?</li>
            <li>What items in your solution are read only and which ones need to be updated?</li>
            <li>Are there other features you'd like this application to have in the future?</li>
            <li>Will the app be accessed in the feild on a mobile device?</li>
        </ul>
    </article>
    <article>
        <img src="graphic/legoHome.jpg" class="w3-circle" alt="Lego house." style="float: right;height: 250px;padding: 10px">
        <p><strong>After briefly meeting, we've summarized you responses:</strong></p>

        <ul>
            <li>There are 12 cleaning crews in the field that clean 8-10 houses each day.  Each crew is made of 3 cleaners.</li>
            <li>Both the crew lead in the feild and the operations manager in the office need to be able to view, access and
            update the data.</li>
            <li>Data to track includes:</li>
                <ul>
                <li>Home</li>
                <li>Scheduled Cleaning</li>
                <li>Time/Day of Cleaning Complete</li>
                <li>Completion Status</li>
                <li>Cleaning Notes</li>
                </ul>
            <li>Time/Day of Cleaning, Completion Status and Cleaning Notes all need to be updated by feild crew.  Other
            feilds need to be updated by operations manager.  The operations manager should be able to clear the workflow for
            the next week.</li>
            <li>In the future, requests for clearning supplies, vehical maintance and lead tracking should be included.</li>
            <li>The app will be accessed in the field on mobile devices (smartphones) and in the office on a standard
            computer monitor.</li>
        </ul>

        <p><strong>Sample database layout:</strong></p>
        <table class="w3-table w3-striped w3-bordered w3-grey">
            <tr>
                <th>homeID</th>
                <th>homeAddress</th>
                <th>scheduledClean</th>
                <th>scheduledCrew</th>
                <th>homeClean</th>
                <th>homeCleanDate</th>
                <th>homeNotes</th>
            </tr>
            <tr>
                <th>Home ID</th>
                <th>Home Address</th>
                <th>Cleaning Scheduled</th>
                <th>Cleaning Crew</th>
                <th>Compleition Status</th>
                <th>Compleition Time/Date</th>
                <th>Notes</th>
            </tr>
            <tr>
                <th>Int (PK)</th>
                <th>VARCHAR(50)</th>
                <th>DATE</th>
                <th>VARCHAR(20)</th>
                <th>Boolean</th>
                <th>DATETIME</th>
                <th>VARCHAR(500)</th>
            </tr>
            <tr>
                <td>1</td>
                <td>1234 Upton Ave.</td>
                <td>Monday</td>
                <td>Crew 1</td>
                <td>0</td>
                <td>NULL</td>
                <td>NULL</td>
            </tr>
            <tr>
                <td>2</td>
                <td>5555 Nicollet Mall Apt 3</td>
                <td>Monday</td>
                <td>Crew 2</td>
                <td>0</td>
                <td>NULL</td>
                <td>NULL</td>
            </tr>
            <tr>
                <td>3</td>
                <td>900 Sunny Side Egg Drive</td>
                <td>Monday</td>
                <td>Crew 1</td>
                <td>1</td>
                <td>5/1/2017 8:00</td>
                <td>Too much pet hair.</td>
            </tr>
            <tr>
                <td>4</td>
                <td>9021 Valley Girl Ave.</td>
                <td>Monday</td>
                <td>Crew 2</td>
                <td>1</td>
                <td>5/2/2017 15:00</td>
                <td>Late night.</td>
            </tr>
        </table>
    </article><br />

    <h3><strong><a href="presentationPage2.php" style="color:dodgerblue">Continue Presentation . . . .</a></strong></h3><br />

</div>

<div class="w3-container w3-black">
    <footer>Copyright 2017 David's Sofware Solutions</footer><br />
</div>

</body>
</html>