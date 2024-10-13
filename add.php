<?php 

    include_once("connections/connection.php");
    $con = connection();

    if(isset($_POST['submit'])) {

        $company_code = $_POST['company_code'];
        $assigned_to = $_POST['assigned_to'];
        $location_n = $_POST['location_n'];
        $model_description = $_POST['model_description'];
        $serial_number = $_POST['serial_number'];

        $sql = "INSERT INTO inventory_list (company_code, assigned_to, location_n, model_description, serial_number) 
        VALUES ('$company_code', '$assigned_to', '$location_n', '$model_description', '$serial_number')";
        $con->query($sql) or die ($con->error);

        echo header("location: index.php");
    }

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
    
    <form action="" method="post">

        <label>Company Code</label>
        <input type="text" name="company_code" id="company_code">

        <label>Assigned To</label>
        <input type="text" name="assigned_to" id="assigned_to">

        <label for="location_n"></label>
        <select name="location_n" id="location_n">
            <option value="#">Select Department</option>
            <option value="Corporate">Corporate</option>
            <option value="Marketing">Marketing</option>
            <option value="Accounting">Accounting</option>
        </select>
        
        <label>Model Description</label>
        <input type="text" name="model_description" id="model_description">

        <label>Serial Number</label>
        <input type="text" name="serial_number" id="serial_number">

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>