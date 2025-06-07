<?php
include('dbconnect.php');
include('staffRecord.php');
  session_start();
  if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
  }

  $email = $_SESSION['email'];

  $sql = "SELECT username, role FROM accounts WHERE email = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("s",$email);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $role = $row['role'];
  }
  else{
    $username = "Unknown User";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - Car Rental POS</title>
  <link rel="stylesheet" href="../css/homepage.css">

  <!-- Para mapasa ko yung role varianle sa js -->
  <script>const userRole = "<?php echo $role; ?>";</script>
  
  <script src="../js/address.js" defer></script>
</head>

<body>

    <!-- SIDE NAV NA POSA -->
    <aside class="sidebar">
      <h2>Car Rental POS</h2>

      <div class="user-info">
        <img src="../assets/pfp.jpg" alt="pfp" class="pfp">
        <p><?php echo htmlspecialchars($role) ?> <?php echo htmlspecialchars($username) ?></p>
      </div>
      <nav>
        <ul>
          <li id="dashboard_button" class="navItem active">Dashboard</li>
          <li id="customers_button" class="navItem">Customers</li>
          <li id="staff_button" class="navItem">Staff</li>
          <li id="rentals_button" class="navItem">Daily Rentals</li>
          <li id="reports_button" class="navItem">Reports</li>
          <li id="users_button" class="navItem">Add Users</li>
          <li id="users_button" class="navItem">Settings</li>
        </ul>
      </nav>
      <div class="Logout">
        <form action="logout.php">
          <button type="submit" class="LogOutBtn">Log Out</button>
        </form>
      </div>
    </aside>


  <!-- Main Content -->
    <main class="main-content" id="dashboardSection">
      <header>
        <h1>Welcome, <?php echo htmlspecialchars($username) ?></h1>
        <p>Here's what's happening today.</p>
      </header>

      <section class="cards">
        <div class="card">
          <h3>Total Customers</h3>
          <p>215</p>
        </div>
        <div class="card">
          <h3>Total Staff</h3>
          <p>7</p>
        </div>
        <div class="card">
          <h3>Rentals Today</h3>
          <p>9</p>
        </div>
        <div class="card">
          <h3>Sales Today</h3>
          <p>₱18,000</p>
        </div>
      </section>
    </main>

  <!-- PARA SA CUSTOMER RECORD -->
  <div class="section" id="recordCustomer">
    <main class="main-content" id="dashboardSection">
      <header class="dashboard-header">
        <div class="welcome-section">
            <h1>Welcome, <?php echo htmlspecialchars($username) ?></h1>
            <p>Here's what's happening today.</p>
        </div>

        <div class="add-customer" id="openAddCustomerModal">
            <span>Add Customer</span>
            <img src="../assets/icons/plus-solid.svg" alt="add icon" class="add-icon">
        </div>        

        <!-- Add Customer Modal -->
        <div id="addCustomerModal" class="modal">
          <div class="modal-content">
            <div class="upperPosition">
              <div><h2 style="margin-top:0;">Customer Information</h><br></div>
              <div><span id="closeAddCustomerModal">&times;</span></div>
            </div>
            <form>
              <div class="name">
                <div class="nameGroup">
                  <label for="Last Name">Last Name</label><br>
                  <input type="text" id="lastName" name="lastName" class="form-input">
                </div>
                <div class="nameGroup">
                  <label for="First Name">First Name</label><br>
                  <input type="text" id="firstName" name="firstName" class="form-input">
                </div>
                <div class="nameGroup middleName">
                  <label for="Middle Name">Middle Name</label><br>
                  <input type="text" id="middleName" name="middleName">
                </div>
              </div>


              <div>
                <h2 style="margin-top:0;">Address</h2><br>
              </div>


              <div class="addressDiv">
                <div class="addressgroup">
                  <label for="Province">Province</label><br>
                  <select id="province"></select>
                </div>
                <div class="addressgroup">
                  <label for="City/Municipality">City/Municipality</label><br>
                  <select id="city"></select>
                </div>
                <div class="addressgroup">
                  <label for="Barangay">Barangay</label><br>
                  <select id="barangay"></select>
                </div>
              </div>
              <div class="detailedAdd">
                 <label>Detailed Address</label><br>
                 <input type="text" name="detailedAdd" id="detailedAdd">
                 <label>Detailed Address</label><br>
                 <input type="text" name="detailedAdd" id="detailedAdd">
              </div>
              <div class="modalButtons">
                <button type="submit" class="add-btn">Add</button>
                <button id="cancelBTN" type="button">Cancel</button>
              </div>
              
            </form>
        </div>
        
      </header>
        <div id="customerList">
          <h2>Customer List</h2>
          <table>
            <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Dredd V. Domasian</td>
                  <td>Buenavista 1, General Trias, Cavite</td>
                  <td>09272483891</td>
               </tr>
            </tbody>
          </table>
        </div>
    </main>
    </div>
  </div>

  <!-- PARA SA STAFF RECORD -->
  <div class="section" id="recordStaff">
    <h2>Staff Records</h2>
    <form action="staffRecord.php" method="POST">
      <label for="staff_id">Staff ID</label><br>
      <input type="text" value="<?php echo $generatedId; ?>" disabled readonly><br>
      <input type="hidden" name="staff_id" value="<?php echo $generatedId; ?>">

      <label for="last_name">Last Name</label><br>
      <input type="text" id="last_name" name="last_name" required><br>

      <label for="first_name">First Name</label><br>
      <input type="text" id="first_name" name="first_name" required><br>

      <label for="middle_initial">Middle Initial</label><br>
      <input type="text" id="middle_initial" name="middle_initial"><br>

      <label for="address">Address</label><br>
      <input type="text" id="address" name="address" required><br>

      <label for="contact_number">Contact Number</label><br>
      <input type="text" id="contact_number" name="contact_number" required><br>

      <label for="monthly_salary">Monthly Salary</label><br>
      <input type="number" id="monthly_salary" name="monthly_salary" required><br>

      <button type="submit">Add Staff</button>
    </form>
  </div>

  <!-- PARA SA DAILY SALES -->
  <div class="section" id="salesSection">
    <h2>Daily Sales</h2>
    <form>
      <label for="date">Date</label><br>
      <input type="text" id="date" name="date" value="Auto-generated" readonly><br>

      <label for="customer_name">Customer Name</label><br>
      <input type="text" id="customer_name" name="customer_name" required><br>

      <label for="price">Price</label><br>
      <input type="number" id="price" name="price" required><br>

      <label for="total_sales">Total Sales for the Day</label><br>
      <input type="number" id="total_sales" name="total_sales"><br>

      <button type="submit">Add Sale</button>
    </form>
  </div>

  <!-- PARA SA CUSTOMER RECORD -->
  <div class="section" id="reportSection">
    <h2>Sales Report</h2>
    <div id="sales-summary"></div>
    <h3>Last Customer Ordered</h3>
    <div id="last-customer"></div>
  </div>

  <!-- PARA SA ADDING NG USER OR ADMIN -->
  <div class="section" id="userSection">
    <h2>Add New Staff/Admin</h2>
    <form action="addUser.php" method="POST">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <label for="role">Role</label>
      <select id="role" name="role" required>
        <option value="Staff">Staff</option>
        <option value="Admin">Admin</option>
      </select>

      <button type="submit">Add User</button>
    </form>
  </div>

<!-- SCRIPT PARA SA BUONG HOMEPAGE NAKA BUKOD NG FILE PARA MAS ATTRACTIVE TINGNAN  -->
  <script src="../js/homepage.js"></script>
  <script src="../js/addModal.js" defer></script>
</body>
</html>

<!-- KULANG PA PO NG MGA DESIGN KASI MAG LALABA PA PO AKO -->



<!-- DILI KO PA PO NAAYOS YUNG RECORD NA PART, DI KO ALAM KUNG PANO GAWIN -->



