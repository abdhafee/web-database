<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISPLAY DETAILS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <!--Navbar-->
    <nav class="navbar">
        <h1>MWS & EID</h1>  
    </nav>

    <!--Header-->
    <div style="background-image: url(.//developing.webp);" class="bgimg"></div>
    
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">SECTIONS</a></li>
        <li><a href="#">CONTACT DETAILS</a></li>
    </ul>

    <!-- Display Data -->
    <div class="search-box">
        <form class="serial-no-search" method="POST">
            <input type="text" id="search" name="search" placeholder="Search by Serial Number" value="<?php echo isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>">
            <select name="section" class="section">
                <option value="">Select Section</option>
                <option value="Government Audit" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Government Audit') ? 'selected' : ''; ?>>Government Audit</option>
                <option value="Engineering" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Engineering') ? 'selected' : ''; ?>>Engineering</option>
                <option value="India Housing" <?php echo (isset($_POST['section']) && $_POST['section'] == 'India Housing') ? 'selected' : ''; ?>>India Housing</option>
                <option value="STMF (Admin)" <?php echo (isset($_POST['section']) && $_POST['section'] == 'STMF (Admin)') ? 'selected' : ''; ?>>STMF (Admin)</option>
                <option value="Planning" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Planning') ? 'selected' : ''; ?>>Planning</option>
                <option value="Internal Audit" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Internal Audit') ? 'selected' : ''; ?>>Internal Audit</option>
                <option value="Admin" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="HR" <?php echo (isset($_POST['section']) && $_POST['section'] == 'HR') ? 'selected' : ''; ?>>HR</option>
                <option value="IT" <?php echo (isset($_POST['section']) && $_POST['section'] == 'IT') ? 'selected' : ''; ?>>IT</option>
                <option value="Admin (Transport)" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Admin (Transport)') ? 'selected' : ''; ?>>Admin (Transport)</option>
                <option value="Development" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Development') ? 'selected' : ''; ?>>Development</option>
                <option value="Accounts" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Accounts') ? 'selected' : ''; ?>>Accounts</option>
                <option value="STMF (Development)" <?php echo (isset($_POST['section']) && $_POST['section'] == 'STMF (Development)') ? 'selected' : ''; ?>>STMF (Development)</option>
                <option value="NEVIDA" <?php echo (isset($_POST['section']) && $_POST['section'] == 'NEVIDA') ? 'selected' : ''; ?>>NEVIDA</option>
                <option value="Secretary" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Secretary') ? 'selected' : ''; ?>>Secretary</option>
                <option value="Minister" <?php echo (isset($_POST['section']) && $_POST['section'] == 'Minister') ? 'selected' : ''; ?>>Minister</option>
            </select>
            <button type="submit" id="search-i" name="submit"><i class="fa fa-search fa-1x" style="color: #ffff; font-size:15px; top:-1px; right:5px;"></i></button>
            <button type="submit" id="reset" name="reset"><i class="fa fa-refresh fa-1x" style="color: #ffff; font-size:15px; top:-1px; right:5px;"></i></button>
        </form>
    </div>
        
    <div class="table-container">
        <?php
        $conn = mysqli_connect("localhost", "root", "", "cpu_db");

        if (!$conn) {
            die("Connection Failed: " . mysqli_connect_error());
        }

        $search = '';
        $section = '';
        if (isset($_POST['submit'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $section = mysqli_real_escape_string($conn, $_POST['section']);
        } elseif (isset($_POST['reset'])) {
            // Reset the search and section
            $search = '';
            $section = '';
        }

        $sql = "SELECT * FROM component_data WHERE 1=1";
        
        if ($search) {
            $sql .= " AND Serial_number LIKE '%$search%'";
        }
        
        if ($section) {
            $sql .= " AND Section = '$section'";
        }

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>Serial_number</th>
                        <th>User_name</th>
                        <th>Ram_Rom</th>
                        <th>Processor</th>
                        <th>Generation</th>
                        <th>SSD</th>
                        <th>Hard_disk</th>
                        <th>NIC_card</th>
                        <th>PC_model</th>
                        <th>Country</th>
                        <th>Operating_system</th>
                        <th>Manufacture_year</th>
                        <th>Graphic_card</th>
                        <th>IP_address</th>
                        <th>Section</th>
                        <th>Virus_guard</th>
                        <th>VG_Active_date</th>
                        <th>VG_Expire_date</th>
                        <th>Virus_guard_model</th>
                        <th>Operations</th>
                    </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["Serial_number"]."</td>
                                <td>".$row["User_name"]."</td>
                                <td>".$row["Ram_Rom"]."</td>
                                <td>".$row["Processor"]."</td>
                                <td>".$row["Generation"]."</td>
                                <td>".$row["SSD"]."</td>
                                <td>".$row["Hard_disk"]."</td>
                                <td>".$row["NIC_card"]."</td>
                                <td>".$row["PC_model"]."</td>
                                <td>".$row["Country"]."</td>
                                <td>".$row["Operating_system"]."</td>
                                <td>".$row["Manufacture_year"]."</td>
                                <td>".$row["Grapihic_card"]."</td>
                                <td>".$row["IP_address"]."</td>
                                <td>".$row["Section"]."</td>
                                <td>".$row["Virus_guard"]."</td>
                                <td>".$row["VG_Active_date"]."</td>
                                <td>".$row["VG_Expire_date"]."</td>
                                <td>".$row["Virus_guard_model"]."</td>
                                <td>
                                <form method='POST' action='view.php' style='display:inline;'>
                                <input type='hidden' name='serial_number' value='".$row["Serial_number"]."'>
                                <button type='submit' name='update' style='background-color: black; padding:5px; width: 100px; font-weight: bold; border-radius: 10px; color: white;'>View</button>
                                </form>
                                </div>
                                </td>
                            </tr>";
                        }
                        echo "</table>";
                    } 
                    else {
                    echo "<p class='col'>No Records Found</p>";
                }
                mysqli_close($conn);
            ?>

        <script>
        function toggleDetails(id) {
        var detailsDiv = document.getElementById(id);
        if (detailsDiv.style.display === "none") {
        detailsDiv.style.display = "block";
    } 
        else {
        detailsDiv.style.display = "none";
    }
}
</script>

    </div>
    
    <!--Footer-->
    <div class="footer">
        <div class="footer-container">
            <h2 class="heading-text">Ministry of Water Supply & Estate Infrastructure Development</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum officia ipsa ex animi veniam, eaque quisquam fuga accusamus maxime magni natus reprehenderit aperiam aliquid ad neque quis itaque inimpedit.</p>
        </div>
        <div class="about-details">
            <div>
                <h4>Address :</h4>
                <p>45, St Michaels Road Colombo-03 - 00300</p>
                <p>P.O. Box 00300 Colombo, Near By Union Assurance</p>
            </div>
            <div>
                <h4>E-mail :</h4>
                <p>info@smehci.gov.lk</p>
            </div>
            <div>
                <h4>Contact :</h4>
                <p>+94 76 531 8325</p>
                <p>+94 11 254 136</p>
            </div>
        </div>
    </div>
</body>
</html>