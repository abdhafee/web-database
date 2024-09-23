<?php
$conn = mysqli_connect("localhost", "root", "", "cpu_db");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$serial_number = '';
$row = [];

// Fetch current data for the serial number if update request is made
if (isset($_POST['update'])) {
    $serial_number = mysqli_real_escape_string($conn, $_POST['serial_number']);

    // Fetch current data for the serial number
    $sql = "SELECT * FROM component_data WHERE Serial_number='$serial_number'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        die("Record not found.");
    }
}

// Check if delete request is made
if (isset($_POST['delete'])) {
    $serial_number = mysqli_real_escape_string($conn, $_POST['serial_number']);

    // Prepare delete SQL query
    $sql = "DELETE FROM component_data WHERE Serial_number='$serial_number'";

    if (mysqli_query($conn, $sql)) {
        header('Location: display.php'); // Redirect after successful deletion
        exit;
    } else {
        die("Error deleting record: " . mysqli_error($conn));
    }
}

// Check if form is submitted to update
if (isset($_POST['submit_details'])) {
    $s_number = mysqli_real_escape_string($conn, $_POST['s_number']);
    $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $ram_rom = mysqli_real_escape_string($conn, $_POST['ram_rom']);
    $processor = mysqli_real_escape_string($conn, $_POST['processor']);
    $gen = mysqli_real_escape_string($conn, $_POST['gen']);
    $ssd = mysqli_real_escape_string($conn, $_POST['ssd']);
    $hd = mysqli_real_escape_string($conn, $_POST['hd']);
    $nic = mysqli_real_escape_string($conn, $_POST['nic']);
    $pc_model = mysqli_real_escape_string($conn, $_POST['pc_model']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $o_s = mysqli_real_escape_string($conn, $_POST['o_s']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $graphic_card = mysqli_real_escape_string($conn, $_POST['graphic_card']);
    $ip_address = mysqli_real_escape_string($conn, $_POST['ip_address']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $virus_gard = mysqli_real_escape_string($conn, $_POST['virus_gard']);
    $a_date = mysqli_real_escape_string($conn, $_POST['a_date']);
    $e_date = mysqli_real_escape_string($conn, $_POST['e_date']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);

    // Prepare update SQL query
    $sql = "UPDATE component_data 
            SET User_name='$p_name', Ram_Rom='$ram_rom', Processor='$processor', 
                Generation='$gen', SSD='$ssd', Hard_disk='$hd', NIC_card='$nic', 
                PC_model='$pc_model', Country='$country', Operating_system='$o_s', 
                Manufacture_year='$year', Grapihic_card='$graphic_card', 
                IP_address='$ip_address', Section='$section', Virus_guard='$virus_gard', 
                VG_Active_date='$a_date', VG_Expire_date='$e_date', Virus_guard_model='$model' 
            WHERE Serial_number='$s_number'";

    if (mysqli_query($conn, $sql)) {
        header('Location: display.php');
        exit;
    } else {
        die("Error updating record: " . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update CPU Component Details</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="services">
        <div class="form">
            <h1>CPU COMPONENT DETAILS</h1>
            <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="serial_number" value="<?php echo isset($row['Serial_number']) ? htmlspecialchars($row['Serial_number']) : ''; ?>">

                <label>Username:</label>
                <input type="text" name="p_name" placeholder="Enter the User name" value="<?php echo isset($row['User_name']) ? htmlspecialchars($row['User_name']) : ''; ?>"><br>

                <label>Serial Number:</label>
                <input type="text" name="s_number" placeholder="Enter the Serial Number" value="<?php echo isset($row['Serial_number']) ? htmlspecialchars($row['Serial_number']) : ''; ?>" readonly><br>

                <label>RAM/ROM:</label>
                <input type="text" name="ram_rom" placeholder="Enter the RAM/ROM type" value="<?php echo isset($row['Ram_Rom']) ? htmlspecialchars($row['Ram_Rom']) : ''; ?>"><br>

                <label>Processor:</label>
                <input type="text" name="processor" placeholder="Enter the processor type" value="<?php echo isset($row['Processor']) ? htmlspecialchars($row['Processor']) : ''; ?>"><br>

                <label>Generation:</label>
                <input type="text" name="gen" placeholder="Enter the Generation" value="<?php echo isset($row['Generation']) ? htmlspecialchars($row['Generation']) : ''; ?>"><br>

                <label>SSD:</label>
                <input type="text" name="ssd" placeholder="Enter the SSD" value="<?php echo isset($row['SSD']) ? htmlspecialchars($row['SSD']) : ''; ?>"><br>

                <label>Hard Disk:</label>
                <input type="text" name="hd" placeholder="Enter the capacity of Hard disk" value="<?php echo isset($row['Hard_disk']) ? htmlspecialchars($row['Hard_disk']) : ''; ?>"><br>

                <label>NIC Card:</label>
                <input type="text" name="nic" placeholder="Enter the NIC Card number" value="<?php echo isset($row['NIC_card']) ? htmlspecialchars($row['NIC_card']) : ''; ?>"><br>

                <label>PC Model:</label>
                <input type="text" name="pc_model" placeholder="Enter the Model of PC" value="<?php echo isset($row['PC_model']) ? htmlspecialchars($row['PC_model']) : ''; ?>"><br>

                <label>Country:</label>
                <input type="text" name="country" placeholder="Enter the Country" value="<?php echo isset($row['Country']) ? htmlspecialchars($row['Country']) : ''; ?>"><br>

                <label>Operating System:</label>
                <input type="text" name="o_s" placeholder="Enter the OS type" value="<?php echo isset($row['Operating_system']) ? htmlspecialchars($row['Operating_system']) : ''; ?>"><br>

                <label>Manufacture Year:</label>
                <input type="text" name="year" placeholder="Enter the Manufacture year" value="<?php echo isset($row['Manufacture_year']) ? htmlspecialchars($row['Manufacture_year']) : ''; ?>"><br>

                <label>Graphic Card:</label>
                <input type="text" name="graphic_card" placeholder="Enter Yes/No" value="<?php echo isset($row['Grapihic_card']) ? htmlspecialchars($row['Grapihic_card']) : ''; ?>"><br>

                <label>IP Address:</label>
                <input type="text" name="ip_address" placeholder="Enter the IP Address" value="<?php echo isset($row['IP_address']) ? htmlspecialchars($row['IP_address']) : ''; ?>"><br>

                <label>Section:</label>
                <input type="text" name="section" placeholder="Enter the Section" value="<?php echo isset($row['Section']) ? htmlspecialchars($row['Section']) : ''; ?>"><br>

                <label>Virus Guard:</label>
                <input type="text" name="virus_gard" placeholder="Enter Yes/No" value="<?php echo isset($row['Virus_guard']) ? htmlspecialchars($row['Virus_guard']) : ''; ?>"><br>

                <label>Active Date:</label>
                <input type="text" name="a_date" placeholder="Enter the Active Date" value="<?php echo isset($row['VG_Active_date']) ? htmlspecialchars($row['VG_Active_date']) : ''; ?>"><br>

                <label>Expire Date:</label>
                <input type="text" name="e_date" placeholder="Enter the Expire Date" value="<?php echo isset($row['VG_Expire_date']) ? htmlspecialchars($row['VG_Expire_date']) : ''; ?>"><br>

                <label>Virus Guard Model:</label>
                <input type="text" name="model" placeholder="Enter the Model of Virus Guard" value="<?php echo isset($row['Virus_guard_model']) ? htmlspecialchars($row['Virus_guard_model']) : ''; ?>"><br>                 

                <button type="submit" name="submit_details">Update</button>
                <button type="submit" name="delete" style="background-color: red; color: white;" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>

            </form>
        </div>
    </div>
</body>
</html>