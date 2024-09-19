<?php
$server_name="localhost:3306";
$username="root";
$password="";
$database_name="cpu_db";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());
}

if(isset($_POST['submit_details'])){

// Set parameters and execute the statement
$s_number = $_POST['s_number'];
$p_name = $_POST['p_name'];
$ram_rom = $_POST['ram_rom'];
$processor = $_POST['processor'];
$gen = $_POST['gen'];
$ssd = $_POST['ssd'];
$hd = $_POST['hd'];
$nic = $_POST['nic'];
$pc_model = $_POST['pc_model'];
$country = $_POST['country'];
$o_s = $_POST['o_s'];
$year = $_POST['year'];
$graphic_card = $_POST['graphic_card'];
$ip_address = $_POST['ip_address'];
$section = $_POST['section'];
$virus_gard = $_POST['virus_gard'];
$a_date = $_POST['a_date'];
$e_date = $_POST['e_date'];
$model = $_POST['model'];


        $sql_query="INSERT INTO component_data (Serial_number,User_name,Ram_Rom,Processor,Generation,SSD,Hard_disk,NIC_card,PC_model,Country,Operating_system,Manufacture_year,Grapihic_card,IP_address,Section,Virus_guard,VG_Active_date,VG_Expire_date,Virus_guard_model) 
            VALUES ('$s_number','$p_name','$ram_rom','$processor','$gen','$ssd','$hd','$nic','$pc_model','$country','$o_s','$year','$graphic_card','$ip_address','$section','$virus_gard','$a_date','$e_date','$model')";

    
        if(mysqli_query($conn, $sql_query))
        {
            echo "Added Successfully";
        }
    
        else
        {
            echo "Not Added Successfully!" . $sql . "" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>