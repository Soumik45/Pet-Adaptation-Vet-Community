<!-- this for fetching all previous data -->

<?php
include('config/constants.php');
$room = $_POST['room'];
$sql = "SELECT msg,stime,room,ip FROM msgs WHERE room = '$room' ";

$res = "";
$result = mysqli_query($conn, $sql);
$bug = 1;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $res = $res . '<div class="container">';
        if ($bug % 2 == 1) {
            $res = $res . '<span style=color:green;>'.$row['room'].'</span>';
            $res = $res . "<p style=color:green;>" . $row['msg'];
            $res = $res . '</p> <span class="time-left" style=color:green;>' . $row["stime"] . '</span> </div>';
        } else {
            $res = $res . '<span style=color:blue;>Admin</span>';
            $res = $res . "<p style=color:blue;>" . $row['msg'];
            $res = $res . '</p> <span class="time-left" style=color:blue;>' . $row["stime"] . '</span> </div>';
        }
        $bug = $bug + 1;
    }
}
echo $res;
?>