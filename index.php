<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <title>live search with php and ajax.</title>
</head>

<body class="bg-secondary">
        <!-- start navbar -->
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Navbar</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
        </li>
        </ul>
        </div>
        </nav>
        <?php 
                include "inti.php";
                $stmt=$link->prepare("SELECT *  FROM Users WHERE GroupID!=1  ORDER BY UserID ASC");
                //ececute the Query
                $stmt->execute();
                //fetch all data (fetch get you all data in an array)=>
                $rows=$stmt->get_result();
                ?>
        <!-- end navbar -->
        <div class="container">
          <div class="row justify-content-center ">
             <div class="col-md-10 bg-light mt-3 rounded pb-3">
                <h1 class="text-primary text-center">
                   Live Search
                </h1>
                <hr>
                <div class="form-inline">
                   <label for="search" class="font-weight-bold lead text-dark">Search</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="text" name="search" id="search-text" class="form-control rounded-0 border-primary" placeholder="search...">
                </div>
                <hr>
                <div class="table-responsive">
                <table class=" table table-hover table-light table-striped table-bordered text-center pr-3 mx-auto" id="table-data">
                  <thead>
                     <tr>
                        <th>#ID</th>
                        <th>#Name</th>
                        <th>#email</th>
                        <th>#full name</th>
                        <th>#date</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                       foreach($rows as $row){
                        echo "<tr>";
                             echo "<td>".$row["UserID"]."</td>";
                             echo "<td>".$row["username"]."</td>";
                             echo "<td>".$row["Email"]."</td>";
                             echo "<td>".$row["FullName"]."</td>";
                             echo "<td>".$row["Date"]."</td>";
                        echo "</tr>";
                       }
                     ?>
                  </tbody>
                </table>
                </div>
             </div>
          </div>
        </div>
        <script src="back.js"></script>
</body>
</html>