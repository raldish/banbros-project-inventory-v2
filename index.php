<?php 

    // SESSION IS ISANG WAY NG ISANG PROGRAM PARA MA ISTORE SALAHAT NG PART NG PROGRAM NIYA YONG MGA DATA   
    If(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['UserLogin'])){
        echo "Welcome ".$_SESSION['UserLogin'];
    }else{
        echo "Welcome Guest";
    }

    include_once("connections/connection.php");

    $con = connection();

    $sql = "SELECT * FROM inventory_list ORDER BY id DESC";
    $inventory = $con->query($sql) or die ($con->error);
    $row = $inventory->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Banbros Inventory System</h1>
    <br>
    <br>
    <?php if(isset($_SESSION['UserLogin'])){ ?>
    <a href="logout.php">Logout</a>
    <?php }else{ ?>

        <a href="login.php">Login</a>
    <?php } ?>
    <a href="add.php">Add New</a>
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Company Code</th>
                <th>Assgined to</th>
                <th>Location</th>
                <th>Model Description</th>
                <th>Serial Number</th>
                <th>Added at</th>
            </tr>
        </thead>
        <tbody>
        <?php do { ?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id']; ?>">view</a></td>
                <td><?php echo $row['company_code'] ;?></td>
                <td><?php echo $row['assigned_to'] ;?></td>
                <td><?php echo $row['location_n'] ;?></td>
                <td><?php echo $row['model_description'] ;?></td>
                <td><?php echo $row['serial_number'] ;?></td>
                <td><?php echo $row['added_at'] ;?></td>
                <td></td>
            </tr>
        <?php }while($row = $inventory->fetch_assoc()) ?>
        </tbody>
    </table>


</body>
</html>