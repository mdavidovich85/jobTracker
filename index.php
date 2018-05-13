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
    <title>Sassy Scrubbers - Ops View</title>

    <!-- W3 core CSS - UPDATE LIINKS AS NEEDED -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

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
    <h3><strong>Operations Manager View</strong></h3>
</div>

<div class="w3-container w3-light-grey">

<?php

include 'connectToServer.php';
serverSniffer();

function displayTable() {

    $conn = new mysqli(DBF_SERVER,DBF_USER,DBF_PASSWORD,DBF_NAME);
    $sql = "SELECT
            homeID as 'Home ID',
            homeAddress as 'Home Address',
            scheduledClean as 'Scheduled Cleaning',
            scheduledCrew as 'Scheduled Crew',
            homeClean as 'Compleition Status',
            homeCleanDate as 'Compleition Date/Time',
            homeNotes as 'Notes'
            FROM jobTracking";
    $result = $conn->query($sql);
    //print_r($result);
    //print_r($result->fetch_assoc());
    echo "<form name='frmSubmit' action='$_SERVER[PHP_SELF]' method='GET'>";

    echo "<table class='w3-table w3-striped w3-bordered w3-grey'>";
        echo "<tr>";
                foreach ($result->fetch_assoc() as $key=>$value) {
                    echo "<th>" . $key . "</th>";
                }
        echo "</tr>";
    $result->data_seek(0);
    while ($row = $result->fetch_assoc()) {
        $keys = array_keys($row);
        //print_r($keys);
        $row[$keys[4]];

        if ($row[$keys[4]] == 0){
            $row[$keys[4]] = "Pending";
        }
        if ($row[$keys[4]] == 1){
            $row[$keys[4]] = "Complete";
        }
        echo "<tr>";
        foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
                //echo "$counter";
            }
        }
        echo "</tr>";

    echo "</table>";
    echo "<br/>";
    echo "<input type='hidden' name='hidSubmitFlag' id='hidSubmitFlag' value='01'/>";
    echo "<input name='btnSubmit' type='submit' value='Reset For Week' class='w3-btn w3-blue'>";
    echo "</table>";
    echo "</form>";
    echo "<br/>";
    $conn->close();
}

function updateHouse() {

    $conn = new mysqli(DBF_SERVER, DBF_USER, DBF_PASSWORD, DBF_NAME);
    date_default_timezone_set('America/Chicago');
    $keys = array_keys($_GET);
    //print_r($keys);
    //print_r($_GET['txtNotes']);
    //print_r($keys[0]);

    $sql = "UPDATE jobTracking SET
            homeClean       = 1,
            homeCleanDate   = now(),
            homeNotes       =' ". $_GET['txtNotes'] . "'
            WHERE homeID    =' ". $keys[0] . "'";
    $conn->query($sql);
    $conn->close();

}

function resetTable() {
    $conn = new mysqli(DBF_SERVER,DBF_USER,DBF_PASSWORD,DBF_NAME);
    $sql = "UPDATE jobTracking
            SET homeClean = 0,
                homeCleanDate = NULL,
                homeNotes = NULL";
    $conn->query($sql);
    $conn->close();
}
?>

<?php

echo "<h3><strong>Current Week's Progress:</strong></h3>";
echo "<ul>";
    echo "<li>Review the current week's progress as needed</li>";
    echo "<li>When all work is complete or the week has ended, click the 'Reset for Week' button.</li>";
    echo "<li style='color:red'>Make sure you print the completed workflow before resetting.</li>";
echo "</ul>";

if (array_key_exists('hidSubmitFlag', $_GET) and $_GET['btnSubmit'] == 'Mark As Clean') {
    $value = array_count_values($_GET);
    if ($value['on'] < 1) {
        echo "<p>Please select a home to update!</p>";
        displayTable();
    } elseif ($value['on'] > 1) {
        echo "<p>Please select only one home at at time!</p>";
        displayTable();
    } else {
        updateHouse();
        displayTable();
    }
} elseif (array_key_exists('hidSubmitFlag', $_GET) and $_GET['btnSubmit'] == 'Reset For Week') {
    echo "<p style='color:red'>Reset Requested: All Crew Work Complete!</p>";
    resetTable();
    displayTable();
} else {
    displayTable();
}
?>

    <div class="w3-container w3-black">
        <footer>Copyright 2017 David's Sofware Solutions</footer><br />
    </div>

</body>
</html>