
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
</head>

<body onload="check_login()">
    <div class="content">
        <!-- Menu -->
        <nav id="nav">
            <div class="heading-active">
                <i class="fas fa-tablet-alt"></i>
                <span>Device Management</span>
            </div>
            <ul>
                <li>
                    <i class="fas fa-tv"></i>
                    <a href="dashboard.php" class="active">Dashboard</a>
                </li>
                <li>
                    <i class="fas fa-history"></i>
                    <a href="logs.html">Logs</a>
                </li>
                <li>
                    <i class="fas fa-cog"></i>
                    <a href="settings.html">Settings</a>
                </li>
                <li>
                    <button onclick="logout()" class="btn" style="background: red;">Logout</button>
                </li>
            </ul>
        </nav>
        <!-- End Menu -->
        <div>
            <!-- Header -->
            <header id="header">
                <span id="btn-nav" class="nav-mobile" onclick="click_nav(1)">
                    <i class="fas fa-stream"></i>
                </span>
                <div id="user" class="user-active">
                    <img src="assets/img/cv.jpg" alt="" width="40px" height="40px">
                    <span>Welcom <b id="user_name"></b></span>
                </div>
            </header>
            <!-- End Header -->

            <!-- Content -->
            <main onclick="click_nav(0)">
                <div class="container">
                    <div class="row">
                        <br><br>
                        <table class="table table-none-mobile mx-auto" style="line-height: 40px;">
                            <thead>
                                <tr>
                                    <th scope="col">Index</th>
                                    <th scope="col">Devices</th>
                                    <th scope="col">MAC Address</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Created Date</th>
                                    <th scope="col">PC (Kw/H)</th>
                                </tr>
                            </thead>
                            <tbody id="load_data">
                            </tbody>
                        </table>
                    </div>
                    <div class="row-2">
                        <div>
                            <div class="box">
                                <div class="content-chart">
                                    <b>Power Consumption</b>
                                    <div>
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>

                            <form class="box" id="form-add" enctype="multipart/form-data" method="post"  action="store.php" >
                                <div class="content-box">
                                    <input class="input-active" type="text" name="name" id="name" placeholder="Name..."
                                        required>
                                    <input class="input-active" type="text" name="ip" id="ip" placeholder="IP..."
                                        required>
                                    <input class="input-active" type="text" name="mac" id="mac" placeholder="MAC..."
                                        required>
                                    <input class="input-active" type="number" name="pc" id="pc" placeholder="PC..."
                                        required>

                                    <div>
                                        <button type="submit" class="btn mt-7">ADD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <!-- End Content -->
        </div>
    </div>
    <?php
    include 'Model/Database.php';
    include 'Model/Devices.php';
    $datas=new Model\Database();
    $device = new Model\Devices($datas);
    $device->getAll();
    //    echo nl2br("\n");
    ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboard.js"></script>

</body>

</html>
