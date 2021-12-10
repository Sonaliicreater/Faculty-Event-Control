<?php 
session_start(); 
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'eventmanagement');
$sql= "SELECT * FROM organized"; 
$result = mysqli_query($con,$sql) or die( mysqli_error($con));
?>
<html>
<head>
  <title>Logged in Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style>
table, th, td {
  border: 2px solid white;
  border-collapse: collapse;
}
th, td {
  text-align: center;
  background-color: #96D4D4;
  font-size: 20px;
}
</style>
  
</head>
<body >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="fas fa-university fa-lg"></i> SHAH & ANCHOR KUTCHHI ENGINEERING COLLEGE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mL-auto">
      <li class="nav-item">
        <a class="nav-link" href="loggedinhomepage.php">Home <span class="sr-only">(current)</span><i class="fas fa-house-user fa-lg"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><?php echo $_SESSION['username'];?>  <span class="sr-only">(current)</span><i class="fas fa-user fa-lg"></i> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span><i class="fas fa-sign-out-alt fa-lg"></i> </a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <?php
     $con=mysqli_connect('localhost','root');
       mysqli_select_db($con,'eventmanagement');
       if (isset($_POST['search'])) {
        $searchKey=$_POST['search'];
        $sql="SELECT * FROM organized where event_title like '%$searchKey%' or faculty_id like '$searchKey'";
       }
       else{
        $sql="SELECT * FROM organized";
        $searchKey="";
       }
     $result=mysqli_query($con,$sql);
  ?>
</div>
<div class="container"> 
<br> 
<h3 class="text-center">LIST OF ORGANIZED EVENTS</h3><br />  
         <div class="table-responsive" id="event_management">  
                     <table style="width:100%">  
                          <tr>  
                               <th>EVENT TITLE</th>  
                               <th>FACULTY ID</th> 
                          </tr>  
                          <?php  
                          while($rows=mysqli_fetch_array($result))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $rows["event_title"]; ?></td>  
                               <td><?php echo $rows["faculty_id"]; ?></td> 
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div> 
                <br>
                  <div class="row">
                    <div class="col">
                      <FORM action="displayorganized.php" method="post">
                      <div class="input-group">
                        <input type="text" placeholder="Event Title or Faculty ID" aria-label="Search"
                        aria-describedby="search-addon" name="search" value="<?php echo $searchKey?>">
                        <button class="btn btn-dark"> Search </button>
                      </div>
                      </FORM>
                    </div>
                    <div class="col">
                      <div>
                          <button class="btn btn-dark float-right" style="align-content: right">
                            <a href="displayorganized.php" style="color: white;">Refresh</a>
                          </button>
                      </div>
                    </div>
        </div>
</body>
</html>