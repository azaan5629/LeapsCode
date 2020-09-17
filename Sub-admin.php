<?php
extract($_POST);
session_start();


if(isset($_SESSION['Email']))
{
$A=1;
} 
else
{
  header("location:Login_subadmin.php");
}
?>




<?php
 if (isset($_POST['end']))
{
  unset($_SESSION['Email']);
  session_destroy();
  header("location:Login_subadmin.php");
}

?>




 <?php
 $con= mysqli_connect('127.0.0.1','root','');


if(!$con)
{
	echo "Not connected to database";
	
}
if(!mysqli_select_db($con, 'test'))
{
	echo 'Database not selected';
}
/* Creating contest table and Inserting values */
if(isset($_POST['confirm'])) {
$name= $_POST['Contestname'];
 $random=rand(1000,9999);
$token=bin2hex(random_bytes('15'));
$description= $_POST['description'];
$date= $_POST['date'];
$duration1=$_POST['duration'];
$duration2=$duration1*7*8;
$time= $_POST['time'];
 
$_SESSION["name1"] = $_POST['Contestname'];
$_SESSION["token"]=$token;
$_SESSION["duration"]=$duration2;

$sql = " CREATE TABLE `$name`(
    token TEXT,
    contest_description TEXT,
	contest_date DATE,
	contest_time Text,
	contest_duration INT    
);";

if (!$con->query($sql) === TRUE) {
    
    $error_msg="* A contest with this name already exists. Please use a different name.";
}
else{
$sql1 = "INSERT INTO `$name`(token, contest_description, contest_date, contest_time, contest_duration) VALUES ('$token','$description', '$date', '$time', '$duration2')";
$sql2=	 "INSERT INTO `contestname`(Tablename, token, test_duration) VALUES ('$name','$token', '$duration2' )";
if (!$con->query($sql1) === TRUE || !$con->query($sql2	)) {
    
    echo "Error: " . $sql . "<br>" . $con->error;
}
else{
	$success_msg=" Details of your contest have been saved ! Click on 'Next' button to continue";
}
}

}
/* Creating contest-questions table and Inserting values */
if(isset($_POST['create'])) {
$b = 'questions'; 
$name2=$_SESSION["name1"].$b;
$token1=$_SESSION["token"];

$_SESSION["favcolor"]=$name2;

$sql = " CREATE TABLE `$name2`(
    token TEXT,
    problem TEXT,
    input_format TEXT,
	constraints varchar(100),
    output_format TEXT,
	total_test_input TEXT,
	total_test_output TEXT,
	test_input1 TEXT,
	test_output1 TEXT,
	test_input2 TEXT,
	test_output2 TEXT,
	test_input3 TEXT,
	test_output3 TEXT,
	test_input4 TEXT,
	test_output4 TEXT,
	test_input5 TEXT,
	test_output5 TEXT
);";
if (!$con->query($sql) === TRUE) {
    
    echo '<script> alert("Fill up the previous form please.") </script>';
}
else{
	
$_SESSION["no_of_question"] = $_POST['question_numbers'];

for ($x = 0; $x < $_SESSION["no_of_question"]; $x++)
{   $a1="Question";
    $b1=$x+1;
	$c1="Description";
	$temp1= $a1.$b1.$c1;
	$problem=$_POST[$temp1];
	
	$a2="Inputformat";
    $b2=$x+1;
	$temp2= $a2.$b2;
	$input=$_POST[$temp2];
	
	$a3="Constraints";
    $b3=$x+1;
	$temp3= $a3.$b3;
	$constraints=$_POST[$temp3];
	
	$a4="Outputformat";
    $b4=$x+1;
	$temp4= $a4.$b4;
	$output=$_POST[$temp4];
	
	$a5="Totaltestcases";
    $b5=$x+1;
	$temp5= $a5.$b5;
	$totaltest=$_POST[$temp5];
	
	$a6="OutputTotaltestcases";
    $b6=$x+1;
	$temp6= $a6.$b6;
	$outputtotaltest=$_POST[$temp6];
	
	$a7="Publictestcase1";
    $b7=$x+1;
	$temp7= $a7.$b7;
	$publictest1=$_POST[$temp7];
	
	$a8="OutputPublictestcase1";
    $b8=$x+1;
	$temp8= $a8.$b8;
	$outputpublictest1=$_POST[$temp8];
	
	$a9="Publictestcase2";
    $b9=$x+1;
	$temp9= $a9.$b9;
	$publictest2=$_POST[$temp9];
	
	$a10="OutputPublictestcase2";
    $b10=$x+1;
	$temp10= $a10.$b10;
	$outputpublictest2=$_POST[$temp10];
	
	$a11="Privatetestcase1";
    $b11=$x+1;
	$temp11= $a11.$b11;
	$privatetest1=$_POST[$temp11];
	
	$a12="OutputPrivatetestcase1";
    $b12=$x+1;
	$temp12= $a12.$b12;
	$outputprivatetest1=$_POST[$temp12];
	
	$a13="Privatetestcase2";
    $b13=$x+1;
	$temp13= $a13.$b13;
	$privatetest2=$_POST[$temp13];
	
	$a14="OutputPrivatetestcase2";
    $b14=$x+1;
	$temp14= $a14.$b14;
	$outputprivatetest2=$_POST[$temp14];
	
	$a15="Privatetestcase3";
    $b15=$x+1;
	$temp15= $a15.$b15;
	$privatetest3=$_POST[$temp15];
	
	$a16="OutputPrivatetestcase3";
    $b16=$x+1;
	$temp16= $a16.$b16;
	$outputprivatetest3=$_POST[$temp16];
	
	$sql1 = "INSERT INTO `$name2`(token, problem , input_format,constraints, output_format,total_test_input,total_test_output, test_input1,test_output1,test_input2,test_output2,test_input3,test_output3,test_input4,test_output4, test_input5,test_output5) 
	VALUES ('$token1','$problem','$input','$constraints','$output','$totaltest','$outputtotaltest','$publictest1','$outputpublictest1','$publictest2','$outputpublictest2','$privatetest1','$outputprivatetest1','$privatetest2','$outputprivatetest2','$privatetest3','$outputprivatetest3')";
     if (!$con->query($sql1) === TRUE) {
    
    echo "Error: " . $sql . "<br>" . $con->error;
    }
    
  
}
	echo '<script> alert("Contest created successfully") </script>';
	$success_url	='localhost/LeapsCode/Login_candidate.php?token='.$_SESSION["token"].'&dur='.$_SESSION["duration"].'&tna='.$_SESSION["name1"];
}


}


?>




 <?php
 if(isset ($_POST['change'])){
 $con= mysqli_connect('127.0.0.1','root','');

if(!$con)
{
	echo "Not connected to database";
	
}
if(!mysqli_select_db($con, 'leapscode'))
{
	echo 'Database not selected';
}

$pass= $_POST['newpass'];
$confirmpass= $_POST['confirmpass'];
$semail=$_SESSION['Email'];
if($pass == $confirmpass){
  $password=md5($pass);
	$sql = "UPDATE leapscode_subadmin
SET Password = '$password'
WHERE Email='$semail'";
	echo '<script> alert("Password updated successfully.") </script>';
if (!$con->query($sql) === TRUE) {
    
    echo "Error: " . $sql . "<br>" . $con->error;
}
	
}
else{
		echo '<script> alert("Passwords do not match. Please try again.") </script>';
}
}

?> 
<?php

if(isset($_POST['delete1'])){
$con= mysqli_connect('127.0.0.1','root','');
if(!$con)
{
	echo "Not connected to database";
	
}
if(!mysqli_select_db($con, 'test'))
{
	echo 'Database not selected';
}
$tablename=$_POST['deletecontest'];
$sql = " DROP TABLE `$tablename`";

if (!$con->query($sql) === TRUE) {
    
    
}
$c = 'questions'; 
$name2=$tablename.$c;
$sql2 = " DROP TABLE `$name2`";

if (!$con->query($sql2) === TRUE) {
    
    echo "Error: " . $sql2 . "<br>" . $con->error;
}
$sql3= " TRUNCATE TABLE contestname";
if (!$con->query($sql3) === TRUE) {
    
    echo "Error: " . $sql3 . "<br>" . $con->error;
}

else{
	echo '<script> alert("Contest Deleted successfully.") </script>';
}


}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
  	  <!-- Favicons -->
  <link href="assets/img/Titleimage.png" rel="icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Sub-Admin Dashboard | LeapsCode</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Sub-admin_Dashboard_Css.css">
  </head>
  <script>
  
function myFunction(){
            var number = document.getElementById("member").value;
            var container = document.getElementById("container");
			
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
			    
			    
            for (i=0;i<number;i++){
			container.appendChild(document.createElement("br"));
			    var div=document.createElement("div");
				div.class="form-group";
                bold=document.createElement("strong");
                Desc=document.createTextNode("Question " + (i+1) + " Description :");
				bold.appendChild(Desc);
				container.appendChild(bold);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
                var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.class="form-control"
				input.name="Question" + (i+1) + "Description"
                container.appendChild(input);
                container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("Input format:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Inputformat"+ (i+1)
                container.appendChild(input);
                container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("Constraints:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Constraints"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("Output format:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Outputformat"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("Total test cases:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Totaltestcases"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("Output Total test cases:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="OutputTotaltestcases"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("Public test case1:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Publictestcase1"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("Output Public test case1:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="OutputPublictestcase1"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("  Public test case2:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
			    var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Publictestcase2"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("  Output Public test case2:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
			    var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="OutputPublictestcase2"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("  Private test case1:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Privatetestcase1"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("  Output Private test case1:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="OutputPrivatetestcase1"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("   Private test case 2:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Privatetestcase2"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("  Output Private test case2:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="OutputPrivatetestcase2"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("   Private test case 3:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="Privatetestcase3"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createTextNode("  Output Private test case3:"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				var input = document.createElement("textarea");
                input.row="100"
				input.cols="86"
				input.name="OutputPrivatetestcase3"+ (i+1)
                container.appendChild(input);
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				container.appendChild(document.createElement("br"));
				
				
				
            }
			
			    
				
        }
function myFunction2(){
	document.getElementById("myform").submit();
}
</script>

  <body>
   
   <!-- nav header starts-->

  <div class="container-fluid1" id="mynavbar">
  <nav class="navbar navbar-inverse" >
  <div class="container-fluid2">
    <div class="navbar-header">
	
      <form method="post">
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Sub-Admin Dashboard </a>
    </div>
	<ul class="nav navbar-nav navbar-right">
      <li > <button type="submit" name="end" class="btn btn-link"><span class="glyphicon glyphicon-off"></span></button></li>
      </ul>
	  &nbsp;&nbsp;</a>
  </form>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<!--nav header ends-->

<!--sidebar starts-->
 <div id="sidebar">
      <div class="toggle-btn" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <ul >
    <li class="active"><a  data-toggle="tab" href="#home" ><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Create a new Programming contest</a></li>
    <li><a data-toggle="tab" href="#menuscore" ><span class="glyphicon glyphicon-stats"></span>&nbsp;&nbsp;Results of candidates</a></li>
     <li><a data-toggle="tab" href="#menupass" ><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Change Password</a></li>
	 <li><a data-toggle="tab" href="#menudelete" ><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete existing contest</a></li>
    
    
    
  </ul>
    </div>
	
<!--sidebar ends-->
<!--ADD a new contest part1 starts -->

	<div class="sidebar tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container-fluid " >
 

   <form class="form-container" method="post" >
    <h2>Add a new contest</h2><br>
    <div class="form-group">
     <label for="exampleInputEmail1">Contest name</label>
     <input type="text" class="form-control" name=" Contestname" id="exampleInputcontestname" aria-describedby="emailHelp" placeholder="Enter Contest name"  value="<?php if(isset($_POST['confirm'])) {echo $name;} ?>" required>
     <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
     <label for="exampleInputPassword1">Contest Description</label>
     <input type="text" name="description" class="form-control" id="exampleInputcontestdescription" placeholder="Enter Desciption" value="<?php if(isset($_POST['confirm'])) {echo $description;} ?>" required>
    </div>
	
	<div class="form-group">
     <label for="exampleInputPassword1">Contest Date</label>
     <input type="date" id="start" name="date" value="2018-07-22" class="form-control" id="exampleInputcontestdescription" placeholder="Enter Rules of the contest" value="<?php if(isset($_POST['confirm'])) {echo $date;} ?>"required>

    </div>
	
	<div class="form-group">
     <label for="exampleInputPassword1">Time of contest</label>
     <input type="text" id="start" name="time"  class="form-control" id="exampleInputcontestdescription" placeholder="Enter time of contest in HH:MM Format" value="<?php if(isset($_POST['confirm'])) {echo $time;} ?>"required>

    </div>
     <div class="form-group">
     <label for="exampleInputPassword1">Contest Duration</label>
     <input type="number" name="duration" class="form-control" id="exampleInputcontestduration" placeholder="Enter Duration" value="<?php if(isset($_POST['confirm'])) {echo $duration;} ?>" required>
    </div>

    
  <br>
  <label> Do you want to confirm the details of contest? </label><br><br>
 <button type="submit" name="confirm" class="btn btn-success btn-block"> Yes, confirm contest details</button> <br>
  <button name="next" data-toggle="tab" href="#menu2"   class="btn btn-success  btn-block">Next</button>
   <br>

  <?php if (isset($success_url)){?>
                <spam class="text-danger"> <?php echo $success_url; }?></spam>
  <?php if (isset($error_msg)){?>
                <spam class="text-danger"> <?php echo $error_msg; }?></spam>
             
  <?php if (isset($success_msg)){?>
                <spam class="text-danger"> <?php echo $success_msg; }?></spam>
</form> 
  
  
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12"></div>
 </div>

    
<!--add a new contest part 1ends here-->


<!-- view existing contests section ends here-->

<!-- Add new contest part 2 section starts here-->
    <div id="menu2" class="tab-pane fade">
	
	<div class="container-fluid">
     <form class="form-container" id="myform" method="post">
<h2>Add a new contest- Next Step </h2><br>


  <div class="form-group">
      <label for="exampleInputPassword1">Number of questions: </label>
	  <input type="numbers" id="member" name="question_numbers" value="" class="form-control" required><br><br>
     <a id="filldetails" onclick="myFunction();">Add number of questions</a><br><br>
    <div id="container"/>
    </div>
  <button data-toggle="tab" href="#home" type="submit" class="btn btn-success btn-block">Go Back</button> <br><br>
  <button type="submit" name="create" class="btn btn-success btn-block" >Create Contest</button> <br><br>
  <?php if (isset($success_url)){?>
                 <spam class="text-danger"> <?php echo $success_url; }?></spam>
	</form>
	 </div>
	 
	 
	  
	 
    </div>
	</div>
<!-- New Contest part 2 section ends here-->

 <!-- Results section starts here-->
    <div id="menuscore" class="tab-pane fade">
	
	<div class="container-fluid">
    
<h2>Results of the contest</h2><br><br>
<table>
<?php
 extract($_POST);
 $link=mysqli_connect("localhost","root","","leapscode");
 $qry="select Username, Email, Password, College, score1, score2, score3, score1+score2+score3 as total from candidate ORDER BY total desc";
	$resultSet=mysqli_query($link,$qry);
	$tab=<<<demo
 	<table class="abc" id="ert">
	<thead>
	<tr bgcolor="#4CAF50">
	 <td align='center'><b>Name</b></td>
 	<td align='center'><b>Email ID</b></td>
 	<td align='center'><b>College</b></td>
 	<td align='center'><b>Score 1</b></td>
 	<td align='center'><b>Score 2</b></td>
 	<td align='center'><b>Score 3</b></td>
 	<td align='center'><b>Total Score</b></td>
	</tr>
    </thead>
demo;


while ($r=mysqli_fetch_assoc($resultSet))
{
   $tab.="<tr><td align='center'>$r[Username]</td><td align='center'>$r[Email]</td><td align='center'>$r[College]</td><td align='center'>$r[score1]</td><td align='center'>$r[score2]</td><td align='center'>$r[score3]</td><td align='center'>$r[total]</td>" ;     
  }  
$tab.="</table>";
echo $tab;



?>
  
	</form>
	 </div>
	 
	 
     
	 
      
	  
	 
    </div>
<!-- New Contest part 2 section ends here-->
 <div id="menupass" class="tab-pane fade">
      <div class="container-fluid " >
 

   <form class="form-container" method="post" >
    <h2>Change Password</h2><br>
    <div class="form-group">
     <label for="exampleInputEmail1">New Password</label>
     <input type="password" class="form-control" name="newpass" id="exampleInputcontestname" aria-describedby="emailHelp" placeholder="Enter new password"  value="<?php if(isset($_POST['confirm'])) {echo $name;} ?>" required>
     <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
     <label for="exampleInputPassword1">Confirm New Password</label>
     <input type="password"  class="form-control" name="confirmpass" id="exampleInputcontestdescription" placeholder="Confirm new password" value="<?php if(isset($_POST['confirm'])) {echo $description;} ?>" required>
    </div>
     <br>
  <label> Do you want to confirm the change of password?</label><br><br>
 <button type="change" name="change" class="btn btn-success btn-block"> Yes, change my password</button> <br>
 </form>
</div>
</div>

<!-- Delete Contest section starts here-->
 <div id="menudelete" class="tab-pane fade">
      <div class="container-fluid " >
   <form class="form-container" method="post" >
    <h2>Delete existing contest</h2><br><br>
    <div class="form-group">
     <label for="exampleInputEmail1">Enter the name of contest that you want to delete</label>
     <input type="text" class="form-control" name="deletecontest" id="exampleinputcontest" aria-describedby="emailHelp" placeholder="Enter contest name" required>
     <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <br>
 <button type="submit" name="delete1" class="btn btn-success btn-block"> Delete contest</button> <br>
 </form>
</div>
</div>



 
  
  
	
	
<script src="css/Sub-admin_DashboardJS.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


  
  </body>
</html>