<?php 

    include_once("connections/connection.php");

    $con = connection();

    $sql = "SELECT * FROM inventory_list";
    $inventory = $con->query($sql) or die ($con->error);
    $row = $inventory->fetch_assoc();

// do{
    
//     echo $row['company_code']." ".$row['assigned_to']. "<br/>";

// }while($row = $inventory->fetch_assoc());
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
    <table>
        <thead>
            <tr>
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