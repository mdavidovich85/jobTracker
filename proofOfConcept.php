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
    <title>INSERT TITLE</title>

    <!-- W3 core CSS - UPDATE LIINKS AS NEEDED -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

<?php

include 'connectToServer.php';
serverSniffer();

print_r($_GET);

?>

<form name="frmSubmit" action='<?php echo htmlentities($_SERVER['PHP_SELF']); ?>' method="GET">
    <?php
    //using multiple forms in this example as to not create sessions because a database
    //will end up storing all of this information

    // Warnings will display if date and time zone are not set
    date_default_timezone_set('America/Chicago');

    $homeArray = array(
        array('433 Upton Ave S', 'Pending', 'Pending', 'Pending'),
        array('533 Hamm Ave S', 'Complete', date("Y-m-d H:i:s"), 'Ran out of bleach.'),
        array('833 Yoland St W', 'Pending', 'Pending', 'Pending'));

    // Display the data
    print_r($homeArray);"</br>";
    $counter = 0;
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Select</th>";
    echo "<th>Home Address</th>";
    echo "<th>Compleition Status</th>";
    echo "<th>Compleition Time/Date</th>";
    echo "<th>Notes</th>";
    echo "</tr>";
    foreach ($homeArray as $key=>$value) {
        echo "<tr>";
        // Insert a checkbox here to allow only one selection
        echo "<td><input type='checkbox' name='$counter'></td>";
        echo "<td>" . $value[0] . "</td>";
        echo "<td>" . $value[1] . "</td>";
        echo "<td>" . $value[2] . "</td>";
        echo "<td>" . $value[3] . "</td>";
        echo "</tr>";
        //echo "$counter";
        $counter++;
    }
    echo "</table>";

    echo "<input type='text' name='txtNotes' placeholder='Enter notes here'>";
    echo "<button type='submit'>Mark As Cleaned</button>";
echo "</form>";

    print_r($_GET);"</br>";

    //debug check to see what the array key/value pair is for checkboxes
    if (in_array("on", $_GET)){
        echo "Checkboxes on!";"</br>";
    }

    //first check to see if more than one checkbox is checked
    // we only want to update one home at at time
    // THis will turn into the main function for the crew UI
    $value = array_count_values($_GET);
    if ($value['on'] < 2) {
        "</br>";
        // Looks at every key/value pair in the $_GET array, if value of one of the pairs is on
        // uses that key to update that row of data - this may be different or easier when
        // using an actual database with primiary keys
        foreach ($_GET as $key => $value) {
            print_r($key);
            "</br>";
            if ($value == "on") {
                $homeArray[$key][1] = 'Complete';
                $homeArray[$key][2] = date('Y-m-d H:i:s');
                $homeArray[$key][3] = $_GET[txtNotes];
            }
        }
    } else {
        echo "Please select only one home at at time!";
    }

    //Display the updated data with the updated array
    print_r($homeArray);"</br>";
    $counter = 0;
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Select</th>";
    echo "<th>Home Address</th>";
    echo "<th>Compleition Status</th>";
    echo "<th>Compleition Time/Date</th>";
    echo "<th>Notes</th>";
    echo "</tr>";
    foreach ($homeArray as $key=>$value) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='$counter'></td>";
        echo "<td>" . $value[0] . "</td>";
        echo "<td>" . $value[1] . "</td>";
        echo "<td>" . $value[2] . "</td>";
        echo "<td>" . $value[3] . "</td>";
        echo "</tr>";
        //echo "$counter";
        $counter++;
    }
    echo "</table>";
?>
</body>
</html>