<?php 

    // SESSION IS ISANG WAY NG ISANG PROGRAM PARA MA ISTORE SALAHAT NG PART NG PROGRAM NIYA YONG MGA DATA   
    If(!isset($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){
        echo "Welcome ".$_SESSION['UserLogin'];
    }else{
        echo header("Location: index.php");
    }

    include_once("connections/connection.php");

    $con = connection();

    $id = $_GET['ID'];


    $sql = "SELECT * FROM inventory_list WHERE id = '$id'";
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

    <h2><?php echo $row['company_code']; ?> 
    <?php echo $row['assigned_to']; ?> 
    <?php echo $row['location_n']; ?> 
    <?php echo $row['model_description']; ?> 
    <?php echo $row['serial_number']; ?> 
    <?php echo $row['added_at']; ?></h2>

</body>
</html>