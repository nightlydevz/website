<?php include "read.php"; ?>
<?php include "settings.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>District Environment Monitor</title>
    <style>
        /* Global Styles */
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            display: flex;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            min-width: 250px;
            background-color: #fff;
            border-right: 1px solid #e9ecef;
            padding: 1.5rem 0;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
        }
        
        .sidebar-header {
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid #e9ecef;
            margin-bottom: 1rem;
        }
        
        .sidebar-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 0;
            line-height: 1.4;
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-nav li {
            margin-bottom: 0.25rem;
        }
        
        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #495057;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        .sidebar-nav a:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }
        
        .sidebar-nav a.active {
            background-color: #e9ecef;
            color: #007bff;
            font-weight: 500;
        }
        
        .sidebar-nav i {
            margin-right: 0.75rem;
            width: 20px;
            text-align: center;
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 1.5rem;
            overflow-y: auto;
        }
        
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .dashboard-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
        }
        
        .dashboard-actions {
            display: flex;
            gap: 1rem;
        }
        
        /* Card Styles */
        .stats-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .stats-card-title {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        
        .stats-card-value {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }
        
        /* Location Card Styles */
        .location-card {
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }
        
        .location-card-header {
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
        }
        
        .location-card-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin: 0;
        }
        
        .location-card-status {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            background-color: #e6f7e6;
            color: #28a745;
        }
        
        .location-card-status.alert {
            background-color: #f8d7da;
            color: #dc3545;
        }
        
        .location-card-body {
            padding: 1.25rem;
        }
        
        .sensor-reading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
        }
        
        .sensor-reading i {
            color: #6c757d;
            margin-right: 0.5rem;
        }
        
        .sensor-reading-value {
            font-weight: 600;
        }
        
        .sensor-reading-value.alert {
            color: #dc3545;
        }
        
        /* Controls Styles */
        .custom-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 0.375rem 0.75rem;
            background-color: #fff;
            transition: all 0.15s ease;
        }
        
        .custom-control:hover {
            border-color: #adb5bd;
        }
        
        .btn-refresh {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }
        
        .btn-refresh:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        
        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #212529;
            color: #f8f9fa;
        }
        
        body.dark-mode .sidebar {
            background-color: #343a40;
            border-right-color: #495057;
        }
        
        body.dark-mode .sidebar-header {
            border-bottom-color: #495057;
        }
        
        body.dark-mode .sidebar-header h2 {
            color: #f8f9fa;
        }
        
        body.dark-mode .sidebar-nav a {
            color: #ced4da;
        }
        
        body.dark-mode .sidebar-nav a:hover {
            background-color: #495057;
            color: #f8f9fa;
        }
        
        body.dark-mode .sidebar-nav a.active {
            background-color: #495057;
            color: #f8f9fa;
        }
        
        body.dark-mode .stats-card,
        body.dark-mode .location-card {
            background-color: #343a40;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        
        body.dark-mode .location-card-header {
            border-bottom-color: #495057;
        }
        
        body.dark-mode .stats-card-title {
            color: #adb5bd;
        }
        
        body.dark-mode .custom-control {
            background-color: #343a40;
            border-color: #495057;
            color: #f8f9fa;
        }
        
        body.dark-mode .custom-control:hover {
            border-color: #6c757d;
        }
        
        /* Media Queries */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                min-width: auto;
                height: auto;
                position: relative;
                border-right: none;
                border-bottom: 1px solid #e9ecef;
                padding: 1rem 0;
            }
            
            .main-content {
                padding: 1rem;
            }
            
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .dashboard-actions {
                width: 100%;
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2>District Environment Monitor</h2>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="index.php" class="active">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="locations.php">
                    <i class="fas fa-map-marker-alt"></i> Locations
                </a>
            </li>
            <li>
                <a href="analytics.php">
                    <i class="fas fa-chart-bar"></i> Analytics
                </a>
            </li>
            <li>
                <a href="admin.php">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            
            <div class="dashboard-actions">
                <div class="dropdown d-inline-block">
                    <button class="btn custom-control dropdown-toggle" type="button" id="locationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-building"></i> <?php echo isset($_GET['filter']) ? $_GET['filter'] : 'All Locations'; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="locationDropdown">
                        <a class="dropdown-item" href="index.php">All Locations</a>
                        <?php
                        // Connect to DB and get locations
                        include("connect-db.php");
                        $sql = "SELECT * FROM locations ORDER BY ID";
                        $result = $mysqli->query($sql);
                        
                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<a class="dropdown-item" href="index.php?filter=' . $row["SHORTCODE"] . '">' . $row["NAME"] . '</a>';
                            }
                        }
                        $mysqli->close();
                        ?>
                    </div>
                </div>
                
                <div class="dropdown d-inline-block">
                    <button class="btn custom-control dropdown-toggle" type="button" id="statusDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-exclamation-triangle"></i> All Status
                    </button>
                    <div class="dropdown-menu" aria-labelledby="statusDropdown">
                        <a class="dropdown-item" href="#">All Status</a>
                        <a class="dropdown-item" href="#">Normal</a>
                        <a class="dropdown-item" href="#">Alert</a>
                        <a class="dropdown-item" href="#">Offline</a>
                    </div>
                </div>
                
                <button id="refreshBtn" class="btn btn-refresh">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
                
                <button id="darkModeToggle" class="btn custom-control">
                    <i class="fas fa-moon"></i> <span id="darkModeText">Dark Mode</span>
                </button>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-card-title">Total Locations</div>
                    <div class="stats-card-value">
                        <?php
                        // Get count of locations
                        include("connect-db.php");
                        $sql = "SELECT COUNT(*) as count FROM locations";
                        $result = $mysqli->query($sql);
                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo $row['count'];
                        } else {
                            echo '0';
                        }
                        $mysqli->close();
                        ?>
                        <i class="fas fa-building float-right text-muted"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-card-title">Active Alerts</div>
                    <div class="stats-card-value">
                        1
                        <i class="fas fa-exclamation-triangle float-right text-warning"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-card-title">Avg Temperature</div>
                    <div class="stats-card-value">
                        72°F
                        <i class="fas fa-thermometer-half float-right text-muted"></i>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="stats-card">
                    <div class="stats-card-title">Avg Humidity</div>
                    <div class="stats-card-value">
                        52%
                        <i class="fas fa-tint float-right text-muted"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
// Database connection and location filtering
include("connect-db.php");

// Get the filter from URL parameter, default to empty string if not set
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Fetch devices to match the tempmod function's logic
$sql = "SELECT * FROM devices ORDER BY CAMPUS, LOCATION";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    print "<div class='row'>";
    while($row = $result->fetch_assoc()) {
        // Check if the device should be displayed based on filter
        $campus = getcampus($row["Name"]);
        $shouldDisplay = ($filter == "" || $campus == $filter);
        
        if ($shouldDisplay) {
            // Get sensor data
            $temp = gettemp($row["Name"]);
            $location = getloc($row["Name"]);
            $date = pulldate($row["Name"]);
            $time = gettime($row["Name"]);
            
            // Check if device is offline
            $isOffline = checkDeviceOffline($row["Name"], $row["last_ping"], $row["online_status"]);
            
            // Determine status and color
            $status = $isOffline ? 'Offline' : 'Normal';
            $statusClass = $isOffline ? 'alert' : '';
            
            // Determine temperature and color
            $tempValue = is_numeric($temp) ? $temp : 0;
            $tempColor = $isOffline ? '#888888' : getTempColor($tempValue);
            
            print "<div class='col-lg-6'>";
            print "<div class='location-card'>";
            print "  <div class='location-card-header'>";
            print "    <h3 class='location-card-title'>" . htmlspecialchars($location) . "</h3>";
            print "    <span class='location-card-status " . $statusClass . "'>" . $status . "</span>";
            print "  </div>";
            print "  <div class='location-card-body'>";
            print "    <div class='mb-2'>" . htmlspecialchars($campus) . "</div>";
            print "    <div class='sensor-reading'>";
            print "      <div><i class='fas fa-thermometer-half'></i> Temperature</div>";
            print "      <div class='sensor-reading-value' style='color: " . $tempColor . "'>" . 
                  ($isOffline ? 'OFFLINE' : $temp . '°F') . "</div>";
            print "    </div>";
            print "    <div class='sensor-reading'>";
            print "      <div><i class='fas fa-tint'></i> Humidity</div>";
            print "      <div class='sensor-reading-value'>-</div>"; // Humidity data not available in current implementation
            print "    </div>";
            print "    <div class='sensor-reading'>";
            print "      <div><i class='fas fa-clock'></i> Last Updated</div>";
            print "      <div class='sensor-reading-value'>" . 
                  ($isOffline ? 'N/A' : $date . ' ' . $time) . "</div>";
            print "    </div>";
            print "  </div>";
            print "</div>";
            print "</div>";
        }
    }
    print "</div>";
} else {
    // No devices found
    print "<div class='alert alert-info text-center mt-5'>";
    print "<h4 class='alert-heading'>No devices found</h4>";
    print "<p>Looks like you don't have any devices set up yet.</p>";
    print "<hr>";
    print "<p class='mb-0'>";
    print "<button class='btn btn-primary' data-toggle='modal' data-target='#addModal'>Add a device</button>";
    print "</p>";
    print "</div>";
}

$mysqli->close();
?>
        
        <!-- Add Device Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label">Add Device</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo renderForm(); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add Alarm Modal -->
        <div class="modal fade" id="alarmModal" tabindex="-1" role="dialog" aria-labelledby="alarmModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label">Add Alarm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo renderAlarmForm(); ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Add Location Modal -->
        <div class="modal fade" id="locModal" tabindex="-1" role="dialog" aria-labelledby="locModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label">Add Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo renderLocForm(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize dark mode based on localStorage
            if (localStorage.getItem('darkMode') === 'enabled') {
                $('body').addClass('dark-mode');
                $('#darkModeText').text('Light Mode');
                $('#darkModeToggle i').removeClass('fa-moon').addClass('fa-sun');
            }
            
            // Dark mode toggle functionality
            $('#darkModeToggle').click(function() {
                if ($('body').hasClass('dark-mode')) {
                    $('body').removeClass('dark-mode');
                    localStorage.setItem('darkMode', 'disabled');
                    $('#darkModeText').text('Dark Mode');
                    $('#darkModeToggle i').removeClass('fa-sun').addClass('fa-moon');
                } else {
                    $('body').addClass('dark-mode');
                    localStorage.setItem('darkMode', 'enabled');
                    $('#darkModeText').text('Light Mode');
                    $('#darkModeToggle i').removeClass('fa-moon').addClass('fa-sun');
                }
            });
            
            // Refresh button functionality
            $('#refreshBtn').click(function() {
                location.reload();
            });
        });
    </script>
</body>
</html>
