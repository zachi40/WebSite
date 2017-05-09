<?php
include_once 'dbconfig.php';

$sql="SELECT * FROM web";
$result_set=mysql_query($sql);
while($row=mysql_fetch_array($result_set)){
    ?>
    <h1>Username: <?php echo $row['UserName'] ?></h1>
    <br />
    <h1>Fname:<?php echo $row['FName'] ?></h1>
    <br />
    <h1>LName:<?php echo $row['LName'] ?></h1>
    <br />
    <h1>EMail:<?php echo $row['EMail'] ?></h1>
    <br />
    <h1>Password:<?php echo $row['Password'] ?></h1>
    <br />
    <img src="../Web/assets/profile/default/<?php echo $row['Pic_Profile'] ?>">

    <?php
}
?>