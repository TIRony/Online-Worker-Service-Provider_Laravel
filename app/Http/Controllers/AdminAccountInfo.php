<?php
include "includes/db_connect.inc.php";

session_start();
$username = $_SESSION['userName'];
$userName = $message = $rowCount = $result = $err = "";
$firstName = $lastName = $email = $salary = $phone = $DOB = $NID = $address = "";

$sqlUserCheck = "SELECT firstName, lastName, userName, email,salary, phone, NID, address, DOB FROM employee WHERE userName = '$username'";
  $result=mysqli_query($conn, $sqlUserCheck);
  $row=mysqli_num_rows($result);
  while($row=mysqli_fetch_assoc($result))
 {
  $userName = $row['userName'];
  $firstName = $row['firstName'];
  $lastName = $row['lastName'];
  $email = $row['email'];     
  $phone = $row['phone'];
  $DOB = $row['DOB'];
  $NID = $row['NID'];
  $address = $row['address'];
  $salary = $row['salary'];

}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  if(isset($_POST['signout'])){
       $_SESSION['userName'] = "";
       header("Refresh:0; url=Home.php");
    }
  if(isset($_POST['updateButton'])){    
    if(!empty($_POST['userName'])){
        $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    }
    if(!empty($_POST['firstName'])){
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    }
    if(!empty($_POST['lastName'])){
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    }
    if(!empty($_POST['phone'])){
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }
    if(!empty($_POST['email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if(!empty($_POST['DOB'])){
        $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
    }
    if(!empty($_POST['NID'])){
        $NID = mysqli_real_escape_string($conn, $_POST['NID']);
    }
    if(!empty($_POST['address'])){
        $address = mysqli_real_escape_string($conn, $_POST['address']);

    }
    if(!empty($_POST['salary'])){
        $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    }
    
    $sql = "UPDATE employee SET firstName='$firstName', lastName='$lastName', userName='$userName', email='$email', phone='$phone', NID='$NID', address='$address', DOB='$DOB' WHERE userName = '$username'";

    $sql2 = "UPDATE login SET userName='$userName', phone='$phone' WHERE userName = '$username'";
              mysqli_query($conn, $sql);
              mysqli_query($conn, $sql2);
              $message = "Update done!";
} 
if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $sqlUserCheckPhoto="SELECT * FROM pictures where userName = '$username'";
     $resultUserPhoto=mysqli_query($conn, $sqlUserCheckPhoto);
     $rowUserPhoto=mysqli_num_rows($resultUserPhoto);
     if($rowUserPhoto < 1){
     $queryUpload = "INSERT into pictures (name, userName) values ('$file', '$username')";  
      mysqli_query($conn, $queryUpload);   
     }
     else{
      $queryUpdate = "UPDATE pictures set name =('$file') where userName= '$username'";  
      mysqli_query($conn, $queryUpdate);
         }
      }  
 } 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Easy4U</title>
  <link rel="stylesheet" href="./CSS/Home.css">
</head>
<body>
  <header>
    <div class="container">
    <div id="branding">
      <form method="post" action="">
          <h1><span class="highlight">Easy4U</span></h1>
        </div>
        <div id="upperRightBranding">
        <nav>
          <ul>
            <li><a href="">Contact</a></li>
            <h5>Call: 01951265659</h5>
          </ul>
        </nav>
        </div>
        <div id="upperLeft">
        <nav>
          <ul>
            <li><button type="submit" name="signout" id="logout">Logout</button></li>
          </ul>
        </nav>
        </div>
        <nav>
          <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">How it works</a></li>
          </ul>
        </nav>
      </form>
    </div>
  </header>


   <section id="CustomerSidebar">
      <div class="container">
        <form class="EmployeeSidebar">
        <nav>
          <ul>
            <div class="HireNowBorder">
            <li ><a href="Admin.php">My Account</a></li><br><br>
          </div>
            <li class="current"><a href="AdminAccountInfo.php">My Account Information</a></li><br><br><br>
            <li><a href="PreviousRecord.php">Prevoius Record</a></li><br><br>
            <li><a href="loadWorker.php">Worker</a></li><br><br>
            <li><a href="loadCustomer.php">Customer</a></li><br><br>
            <li><a href="loadEmployee.php">Employee</a></li><br><br>
            <li><a href="AddDepartment.php">Department</a></li><br><br>
            <li><a href="Area.php">Coverage Area</a></li><br><br>
            
            <li><a href="AdminSetting.php">Seetings</a></li><br><br>
          </ul>
        </nav>
      </form>
       </div>
     </section>
<section id="LoginSignupbar">
       <div class="container">
         <aside id="Signupbar">
                  <div class="HireNowBack1">
                    <h2> <span class="highlight">Information</span></h2>
                  </div>
                 <div class="HireNowBack2">
                 <form class="contact" method="post" action="AdminAccountInfo.php">
                <div>
                    <label>User Name: </label>
                    <input type="text" name="userName" value="<?php echo $userName;?>" required>
                </div>
                <div>
                    <label>Phone number: </label>
                    <input type="Phone" name="phone" value="<?php echo $phone;?>" required>
                </div>
                <div>
                    <label>First Name: </label>
                    <input type="text" name="firstName" value="<?php echo $firstName;?>" required>
                </div>
                <div>
                    <label>Last Name: </label>
                    <input type="text" name="lastName" value="<?php echo $lastName;?>" required>
                </div>              
                <div>
                    <label>Email: </label>
                    <input type="Email" name="email" value="<?php echo $email;?>" required>
                </div>
                <div>
                    <label>Date Of Birth: </label>
                    <input type="Date" name="DOB" value="<?php echo $DOB;?>" required>
                </div>
                <div>
                    <label>National ID card: </label>
                    <input type="number" name="NID" readonly="" value="<?php echo $NID;?>" required>
                </div>
                <div class="Add">
                    <label>Address: </label>
                    <input type="text" name="address" value="<?php echo $address;?>" required>
                </div>

                <div>
                    <label>Salary: </label>
                    <input type="number" name="salary" readonly="" value="<?php echo $salary;?>" required>
                </div>
                <div>
                    <button type="submit" class="Signup" name="updateButton">Update</button>
                    <label style="color:red"><?php echo $err; ?></label>
                    <label style="color:red"><?php echo $message; ?></label>
                </div>
              </form>
              </div>
            </aside>



<aside id="Loginbar2">
<h1 style="color: green" align="upperLeft">Profile Picture</h1>   

  <div class="HireNowBack3">
</div>

 
     
 <html>  
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

      </head>  
      <body>  
           
           <div class="container" style="width:700px;">           

                <form method="post" enctype="multipart/form-data">
                  <br>

                <div id="pictureSize">

                <?php     
                $queryLoad = "SELECT * FROM pictures where userName='$username'";    
                $resultLoadPhoto=mysqli_query($conn, $queryLoad);
                $rowUserPhotoLoad=mysqli_num_rows($resultLoadPhoto);
                ?> 

      </div> 
              
                </form>  
   
                
           </div>  
           <script>  
                 $(document).ready(function(){  
                $('#insert').click(function(){  
                var image_name = $('#image').val();  
                if(image_name == '')  
                  {  
                    alert("Please Select Image");  
                    return false;  
                  }  
             else  
                 {  
                  var extension = $('#image').val().split('.').pop().toLowerCase();  
                  if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                    {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                    }  
           }  
      });  
 });  
 </script>  
 <style >
   
aside#Loginbar2{
  align-items: right;
  float:right;
  padding-right: 100px ;
  width:25%;
  margin-top:260px;
  margin-bottom:20px;
  margin-left: 0px;
  background:;

}


img {
border-radius: 100%;

}
aside#loginbar2 .pictureSize{
  width: 10px;
  height: 10px;
  position: fixed;
}
 </style>
      </body>  
 </html>  

   </aside>
           
 </div>
</section>




    <section id="tranjection">
      <div class="container">
        <div class="tran">
          <h1>00</h1>
          <h4>Tranjection</h4>
        </div>
        <div class="tran">
          <h1>00</h1>
          <h4>Workers</h4>
        </div>
        <div class="tran">
          <h1>00</h1>
          <h4>Successfully served</h4>
        </div>
      </div>
    </section>

    
    <footer>
      <div class="container">
        <div class="Footer">
          <div id="FooterTitle">
          <h2>Easy4U</h2>
            </div>
          <div id="FooterAboutUs">
          <h3>About us</h3><er>
          <nav>
            <ul>
              <li><a href="">Terms of use</a></li>
              <li><a href="">Privacy policy</a></li>
              <li><a href="">Contact us</a></li>
            </ul>
          </nav>
        </div>
        </div>
        <div class="Footer">
          <div id="FooterService">
          <h3>Services</h3><er>
          <nav>
            <ul>
              <li><a href="">Plumping</a></li>
              <li><a href="">Electrical</a></li>
              <li><a href="">Labor</a></li>
              <li><a href="">Guard</a></li>
            </ul>
          </nav>
          </div>
        </div>
      </div>
      <p>Easy4U, Copyright &copy; 2019</p>
    </footer>
</body>
</html>