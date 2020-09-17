<?php
extract($_POST);
session_start();

if(isset($_SESSION['Email']))
{
$A=1;
} 
else
{
  header("location:Login_candidate.php");
}


?>



<?php
 if (isset($_POST['end']))
{
  unset($_SESSION['Email']);
  session_destroy();
  header("location:feedback.php");
}
?>


<?php
 if (isset($_POST['end']))
{
  unset($_SESSION['Email']);
  session_destroy();
  header("location:feedback.php");
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
$tname=$_GET['tna'];
 $tnamefinal=$tname."questions";
 $token=$_GET['token'];  




?>
<?php 

$str = "";
$exit_status = -1;
if(isset($_SESSION['changed']) && ($_SESSION['changed'] == true)){
	unset($_SESSION['changed']);
}

else{
	// Include the compiler script according to the selected language.
	if(isset($_POST['compile1'])){

		if(isset($_POST['language'])){
			if($_POST['language'] == "c"){
				include_once('compilers/compiler_c1.php');
			}

			else if($_POST['language'] == "cpp"){
				include_once('compilers/compiler_cpp.php');
			}

			else if($_POST['language'] == "java"){
				include_once('compilers/compiler_java.php');
			}

			else if($_POST['language'] == "python"){
				include_once('compilers/compiler_python.php');
			}
		}
		unset($_POST['compile1']);
	}




	if(isset($_POST['compile2'])){

		if(isset($_POST['language'])){
			if($_POST['language'] == "c"){
				include_once('compilers/compiler_c2.php');
			}

			else if($_POST['language'] == "cpp"){
				include_once('compilers/compiler_cpp.php');
			}

			else if($_POST['language'] == "java"){
				include_once('compilers/compiler_java.php');
			}

			else if($_POST['language'] == "python"){
				include_once('compilers/compiler_python.php');
			}
		}
		unset($_POST['compile2']);
	}




	if(isset($_POST['compile3'])){

		if(isset($_POST['language'])){
			if($_POST['language'] == "c"){
				include_once('compilers/compiler_c3.php');
			}

			else if($_POST['language'] == "cpp"){
				include_once('compilers/compiler_cpp.php');
			}

			else if($_POST['language'] == "java"){
				include_once('compilers/compiler_java.php');
			}

			else if($_POST['language'] == "python"){
				include_once('compilers/compiler_python.php');
			}
		}
		unset($_POST['compile3']);
	}
}

?>


<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Include script and styles for the code editor and web page. -->
	
	<link rel="stylesheet" href="codemirror/lib/codemirror.css">
	<link rel="stylesheet" href="codemirror/addon/fold/foldgutter.css">
	<link rel="stylesheet" href="codemirror/addon/dialog/dialog.css">
	<link rel="stylesheet" href="codemirror/theme/monokai.css">
	<link rel="stylesheet" href="codemirror/theme/twilight.css">
	<script src="codemirror/lib/codemirror.js"></script>
	<script src="codemirror/addon/selection/active-line.js"></script>

	<script src="codemirror/addon/search/searchcursor.js"></script>
	<script src="codemirror/addon/search/search.js"></script>
	<script src="codemirror/addon/dialog/dialog.js"></script>
	<script src="codemirror/addon/edit/matchbrackets.js"></script>
	<script src="codemirror/addon/edit/closebrackets.js"></script>
	<script src="codemirror/addon/comment/comment.js"></script>
	<script src="codemirror/addon/wrap/hardwrap.js"></script>
	<script src="codemirror/addon/fold/foldcode.js"></script>
	<script src="codemirror/addon/fold/brace-fold.js"></script>
	<script src="codemirror/mode/clike/clike.js"></script>
	<script src="codemirror/mode/python/python.js"></script>
	<script src="codemirror/mode/javascript/javascript.js"></script>
	<script src="codemirror/keymap/sublime.js"></script>
	<meta charset="UTF-8">

  <meta name="description"
    content="Free and open-source online code editor that allows you to write and execute code from a rich set of languages.">
  <meta name="keywords"
    content="online editor, online code editor, online ide, online compiler, online interpreter, run code online, learn programming online,
           online debugger, programming in browser, online code runner, online code execution, debug online, debug C code online, debug C++ code online,
           programming online, snippet, snippets, code snippet, code snippets, pastebin, execute code, programming in browser, run c online, run C++ online,
           run java online, run python online, run ruby online, run c# online, run rust online, run pascal online, run basic online">
  <meta name="author" content="Herman Zvonimir Došilović">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta property="og:title" content="Judge0 IDE - Free and open-source online code editor">
  <meta property="og:description"
    content="Free and open-source online code editor that allows you to write and execute code from a rich set of languages.">
  <meta property="og:image" content="https://raw.githubusercontent.com/judge0/ide/master/.github/wallpaper.png">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/goldenlayout.min.js"
    integrity="sha256-NhJAZDfGgv4PiB+GVlSrPdh3uc75XXYSM4su8hgTchI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-base.css"
    integrity="sha256-oIDR18yKFZtfjCJfDsJYpTBv1S9QmxYopeqw2dO96xM=" crossorigin="anonymous" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/golden-layout/1.5.9/css/goldenlayout-dark-theme.css"
    integrity="sha256-ygw8PvSDJJUGLf6Q9KIQsYR3mOmiQNlDaxMLDOx9xL0=" crossorigin="anonymous" />

  <script>
    var require = {
      paths: {
        "vs": "https://unpkg.com/monaco-editor/min/vs",
        "monaco-vim": "https://unpkg.com/monaco-vim/dist/monaco-vim",
        "monaco-emacs": "https://unpkg.com/monaco-emacs/dist/monaco-emacs"
      }
    };
  </script>
  <script src="https://unpkg.com/monaco-editor/min/vs/loader.js"></script>
  <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.nls.js"></script>
  <script src="https://unpkg.com/monaco-editor@0.18.1/min/vs/editor/editor.main.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
    integrity="sha256-9mbkOfVho3ZPXfM7W8sV2SndrGDuh7wuyLjtsWeTI1Q=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"
    integrity="sha256-t8GepnyPmw9t+foMh3mKNvcorqNHamSKtKRxxpUEgFI=" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

  <script type="text/javascript" src="assets/js/download.js"></script>

  <script type="text/javascript" src="assets/js/ide.js"></script>

  <link type="text/css" rel="stylesheet" href="assets/css/ide.css">

  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-83802640-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'UA-83802640-2');
  </script>


  <!--Header files for IDE Finish-->


  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Contest IDE | LeapsCode</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Titleimage.png" rel="icon">


  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>





  <!-- Template Main CSS File -->
  <link href="css/Style_Contest_IDE.css" rel="stylesheet">

	<style type="text/css">
      .CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black;height: 95%;}
      header{text-align: center;}
      .side-content{	padding: 10px 5px;}
	  
	  .inner {
    align-items: center;
    justify-content: center;
    padding: 130px;
    margin-top: 0px;
    margin-left: 65px;
    margin-right: 50px;
    margin-bottom: 35px;

    width: auto;
    height: auto;

    background-color: #ffff;
    font-family: "Calibri";

    font-size: 18px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .inner2 {
    
    padding: 0px;
    margin-top: 0px;
    margin-left: 65px;
    margin-right: 50px;
    margin-bottom: 35px;

    width: auto;
    height: auto;

    background-color: #ffff;
    font-family: "Calibri";

    font-size: 18px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
  .ide{
	  padding:35;
  }

  .h3 {
    color: #0489B1
  }

  #header {
    margin-bottom: 90px;
  }
  
   #response{
	  
	  color: #0489B1;
	  border-style: solid;
	  border-width: thin;
	  border-color:#0489B1;
	  border-radius:30px;
	  padding:6px;
  }
    </style>
	

	<!-- Use ajax to change the language on language option change. -->
	<script type="text/javascript">
		
		function changeLanguage() {
		  var str = document.getElementById("language").value;
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (xhttp.readyState == 4 && xhttp.status == 200) {
		    	window.location.reload(true); 
		    }
		  };
		  xhttp.open("POST", "ajax/change_language.php?q="+str, true);
		  xhttp.send();
		}
	</script>
</head>
<body>
<nav class="navbar" id="header1">
    <div class="container d-flex align-items-center">


   
            <div class="logo mr-auto">

        <a href="https://www.nineleaps.com/" class="logo mc-auto"><img src="assets/img/nineleaps-logo.png" alt=""
            class="img-fluid"></a>

      </div>
      <span style="font-size:20px " class="h5  mr-auto ml-40px "> Welcome to LeapsCode</span>

      <nav class="nav-menu d-none d-lg-block">
        <ul align="right">
		<!--For timer-->
         <li class="get-started ml-auto"><div id="response" style="font-size:20px"></div></li>
        <li class="get-started ml-auto"><a href="#" data-toggle="modal" data-target="#exampleModal">
            Submit </a></li>
        </ul>
      </nav><!-- .nav-menu -->
  </nav>
  </div>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  </div>
  <div id="sidebar" class="active">

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Question 1</a></li>
      <li><a data-toggle="tab" href="#menu1">Question 2</a></li>
      <li><a data-toggle="tab" href="#menu2">Question 3</a></li>

    </ul>
  </div>
  <br>
  <div class="tab-content">
    <!-- ======= Question 1 section ======= -->
     <?php
      $rows=$_SESSION["sql"];
      $problem=nl2br($rows['problem']);
      $constraints=nl2br($rows['constraints']);
      $input_format=nl2br($rows['input_format']);
      $output_format=nl2br($rows['output_format']);
      $total_case=nl2br($rows['total_test_input']);
      $test_input1=nl2br($rows['test_input1']);  
      $test_output1=nl2br($rows['test_output1']);  
      $test_input2=nl2br($rows['test_input2']);  
      $test_output2=nl2br($rows['test_output2']); 
      $test_input3=nl2br($rows['test_input3']);  
      $test_output3=nl2br($rows['test_output3']);  
      $test_input4=nl2br($rows['test_input4']);  
      $test_output4=nl2br($rows['test_output4']);
      $test_input5=nl2br($rows['test_input5']);  
      $test_output5=nl2br($rows['test_output5']);  
      $tna=$_GET['tna']; 

       ?>




    <div id="home" class="tab-pane fade in active">
      <div class="container-fluid ">

        <div class="inner">
          <h3 class="h3" align="center"><b>QUESTION: 1</b></h3> <br>



          <b>Problem statement:</b> <br>
		  
    
          <?php  
			  print_r($problem);

		  
		  ?>
		  
          
          <br><br><b>Constraints: </b><br>


                  <?php
                  print_r($constraints);
		           ?>
		     <br><br>
                  <b>Input Format:</b>
                  <br>



                  <?php
                   print_r($input_format);
		            ?>
                  <br><br><b>Output Format:</b><br>
                   <?php
                    print_r($output_format);  
		           ?>
				   
				   <br><br><b>Public Test case 1:</b><br>
                   <?php
                    print_r($test_input1);  
		           ?>
				   <br><br><b>Output Test case 1:</b><br>
                   <?php
                    print_r($test_output1);  
		           ?>
				   
				   <br><br><b>Public Test case 2:</b><br>
                   <?php
                    print_r($test_input2);  
		           ?>
				   <br><br><b>Output Test case 2:</b><br>
                   <?php
                    print_r($test_output2);  
		           ?>
        </div>
       <!-- Editor starts-->
        <div class="inner2"><br>
        <h4 class="h3" align="center"><b>Enter your code here</b></h4>
		  
  
	<div class="ide">
		<div >
	
		</div>

		<div class="main-content">
			<form  method="post" role="form">
			
				<div class="row">
					<div class="col-sm-9">
						<input type="hidden" name="user_email1" value="<?php echo $_SESSION['Email']; ?>">
						<input type="hidden" name="test_output1" value="<?php echo $test_output1; ?>">
						<input type="hidden" name="test_output2" value="<?php echo $test_output2; ?>">
						<input type="hidden" name="test_output3" value="<?php echo $test_output3; ?>">
						<input type="hidden" name="test_output4" value="<?php echo $test_output4; ?>">
						<input type="hidden" name="test_output5" value="<?php echo $test_output5; ?>">
						<?php
						if (isset($_SESSION['selected_language']) && $_SESSION['selected_language'] == "java"){
									echo "Public class name should be 'testfile_java'";
							}
						?>
					<textarea rows="40" cols="170" name="program" class="program" id="code" value= <?php if (isset($code1)){?>
                    <spam class="text-danger"> <?php echo $code1; }?></textarea>
                    <?php 
						if(isset($_SESSION['selected_language'])){
							// Load the last compiled program, if any, of the selected language.
							if(isset($_SESSION['c_program']) && ($_SESSION['selected_language'] == "c")){
								echo $_SESSION['c_program'];
							}
							else if(isset($_SESSION['cpp_program']) && ($_SESSION['selected_language'] == "cpp")){
								echo $_SESSION['cpp_program'];
							}
							else if(isset($_SESSION['java_program']) && ($_SESSION['selected_language'] == "java")){
								echo $_SESSION['java_program'];
							}
							else if(isset($_SESSION['python_program']) && ($_SESSION['selected_language'] == "python")){
								echo $_SESSION['python_program'];
							}
							else{
								echo "";
							}
						}
						else{
							$_SESSION['selected_language'] = "c";
							echo "";
						}
						
						?></textarea>
					</div>
			

          <div class="col-sm-3 side-content">   <div class="form-group">
          <select name="language" onchange="changeLanguage()" id="language"
          class="form-control">       <?php
          if(!isset($_SESSION['selected_language']) ||
          $_SESSION['selected_language'] == "c"){?>         <option value="c"
          selected> C </option>         <option value="cpp"> C++ </option>
          <option value="java"> Java </option>         <option value="python">
          Python </option>       <?php } ?>       <?php
          if($_SESSION['selected_language'] == "cpp"){?>         <option
          value="c"> C </option>         <option value="cpp" selected> C++
          </option>         <option value="java"> Java </option>
          <option value="python"> Python </option>       <?php } ?>
          <?php if($_SESSION['selected_language'] == "java"){?>
          <option value="c"> C </option>         <option value="cpp"> C++
          </option>         <option value="java" selected> Java </option>
          <option value="python"> Python </option>       <?php } ?>
          <?php if($_SESSION['selected_language'] == "python"){?>
          <option value="c"> C </option>         <option value="cpp"> C++
          </option>         <option value="java"> Java </option>
          <option value="python" selected> Python </option>       <?php } ?>
          </select>   </div>

						<div class="form-group">
							<!-- Text box for standard  input. -->
							
							<input  type="hidden" rows="5" cols="70" name="input" class="form-control" value="<?php echo $total_case; ?>" ><br/><br/><br/><br/><br/><br/><br/><br/>
						</div>
						
						<div class="form-group">
							<input class="btn btn-primary" type="submit" value="Compile And Run" name="compile1">
							<br>
							<span value= <?php if (isset($msg1)){?>
                    <spam class="text-success"> <?php echo $msg1; }?></span>
                    	<br>
							<span value= <?php if (isset($error_msg1)){?>
                    <spam class="text-danger"> <?php echo $error_msg1; }?></span>
						</div>
					</div>
				</div>
			</form>
		</div>	
	</div>
</div>
     
    </div>
	<div class="col-md-4 col-sm-4 col-xs-12"> </div>
  
       <!-- IDE section end -->
      </div>
	  <!-- Question 2 section -->

      <?php
      $rows=$_SESSION["sql1"];
      $problem=nl2br($rows['problem']);
      $constraints=nl2br($rows['constraints']);
      $total_case=nl2br($rows['total_test_input']);
      $input_format=nl2br($rows['input_format']);
      $output_format=nl2br($rows['output_format']);
      $test_input1=nl2br($rows['test_input1']);  
      $test_output1=nl2br($rows['test_output1']);  
      $test_input2=nl2br($rows['test_input2']);  
      $test_output2=nl2br($rows['test_output2']); 
      $test_input3=nl2br($rows['test_input3']);  
      $test_output3=nl2br($rows['test_output3']);  
      $test_input4=nl2br($rows['test_input4']);  
      $test_output4=nl2br($rows['test_output4']);
      $test_input4=nl2br($rows['test_input5']);  
      $test_output5=nl2br($rows['test_output5']);   

       ?>

    <div id="menu1" class="tab-pane fade">
      <div class="container-fluid">
        <div class="inner">
          <h3 class="h3" align="center"><b>QUESTION: 2</b></h3> <br>
           <b>Problem statement:</b> <br>

                  <?php
                  print_r($problem);
               ?>
          <br><br><b>Constraints: </b><br>


                  <?php
                  print_r($constraints);
               ?>
         <br><br>
                  <b>Input Format:</b>
                  <br>



                  <?php
                   print_r($input_format);
                ?>
                  <br><br><b>Output Format:</b><br>
                   <?php
                    print_r($output_format);  
               ?>
           
           <br><br><b>Public Test case 1:</b><br>
                   <?php
                    print_r($test_input1);  
               ?>
           <br><br><b>Output Test case 1:</b><br>
                   <?php
                    print_r($test_output1);  
               ?>
           
           <br><br><b>Public Test case 2:</b><br>
                   <?php
                    print_r($test_input2);  
               ?>
           <br><br><b>Output Test case 2:</b><br>
                   <?php
                    print_r($test_output2);  
               ?>
        </div>
        <div class="inner2"><br>
        <h4 class="h3" align="center"><b>Enter your code here</b></h4>
		  <!-- Editor starts-->
  
		<div class="ide">
		<div class="result">
		
		<?php  ?>
		</div>

		<div class="main-content">
			<form  method="post" role="form">
			
				<div class="row">
					<div class="col-sm-9">
						<input type="hidden" name="user_email2" value="<?php echo $_SESSION['Email']; ?>">
						<input type="hidden" name="test_output1" value="<?php echo $test_output1; ?>">
						<input type="hidden" name="test_output2" value="<?php echo $test_output2; ?>">
						<input type="hidden" name="test_output3" value="<?php echo $test_output3; ?>">
						<input type="hidden" name="test_output4" value="<?php echo $test_output4; ?>">
						<input type="hidden" name="test_output5" value="<?php echo $test_output5; ?>">
						<?php
						if (isset($_SESSION['selected_language']) && $_SESSION['selected_language'] == "java"){
									echo "Public class name should be 'testfile_java'";
							}
						?>
					<textarea rows="40" cols="170" name="program" class="program" id="code2"  value= <?php if (isset($code2)){?>
                    <spam class="text-danger"> <?php echo $code2; }?></textarea><?php 
						if(isset($_SESSION['selected_language'])){
							// Load the last compiled program, if any, of the selected language.
							if(isset($_SESSION['c_program']) && ($_SESSION['selected_language'] == "c")){
								echo $_SESSION['c_program'];
							}
							else if(isset($_SESSION['cpp_program']) && ($_SESSION['selected_language'] == "cpp")){
								echo $_SESSION['cpp_program'];
							}
							else if(isset($_SESSION['java_program']) && ($_SESSION['selected_language'] == "java")){
								echo $_SESSION['java_program'];
							}
							else if(isset($_SESSION['python_program']) && ($_SESSION['selected_language'] == "python")){
								echo $_SESSION['python_program'];
							}
							else{
								echo "";
							}
						}
						else{
							$_SESSION['selected_language'] = "c";
							echo "";
						}
						
						?></textarea>
					</div>
			

					<div class="col-sm-3 side-content">
						<div class="form-group">
							<select name="language" onchange="changeLanguage()" id="language" class="form-control">
								<?php if(!isset($_SESSION['selected_language']) || $_SESSION['selected_language'] == "c"){?>
									<option value="c" selected> C </option>
									<option value="cpp"> C++ </option>
									<option value="java"> Java </option>
									<option value="python"> Python </option>
								<?php } ?>
								<?php if($_SESSION['selected_language'] == "cpp"){?>
									<option value="c"> C </option>
									<option value="cpp" selected> C++ </option>
									<option value="java"> Java </option>
									<option value="python"> Python </option>
								<?php } ?>
								<?php if($_SESSION['selected_language'] == "java"){?>
									<option value="c"> C </option>
									<option value="cpp"> C++ </option>
									<option value="java" selected> Java </option>
									<option value="python"> Python </option>
								<?php } ?>
								<?php if($_SESSION['selected_language'] == "python"){?>
									<option value="c"> C </option>
									<option value="cpp"> C++ </option>
									<option value="java"> Java </option>
									<option value="python" selected> Python </option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<!-- Text box for standard  input. -->
						
							<input  type="hidden" rows="5" cols="70" name="input" class="form-control" value="<?php echo $total_case; ?>" ><br/><br/><br/><br/><br/><br/><br/><br/>
						</div>
						
						<div class="form-group">
							<input class="btn btn-primary" type="submit" value="Compile And Run" name="compile2">
							<br>
							<span value= <?php if (isset($msg2)){?>
                    <span class="text-success"> <?php echo $msg2; }?></span>
                    	<br>
							<span value= <?php if (isset($error_msg2)){?>
                    <spamnclass="text-danger"> <?php echo $error_msg2; }?></span>
						</div>
					</div>
				</div>
			</form>
		</div>	
	</div>
</div> 

      </div>
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
	<!-- ======= Question 3 section ======= -->
     <?php
      $rows=$_SESSION["sql2"];
      $problem=nl2br($rows['problem']);
      $constraints=nl2br($rows['constraints']);
      $total_case=nl2br($rows['total_test_input']);
      $input_format=nl2br($rows['input_format']);
      $output_format=nl2br($rows['output_format']);
      $test_input1=nl2br($rows['test_input1']);  
      $test_output1=nl2br($rows['test_output1']);  
      $test_input2=nl2br($rows['test_input2']);  
      $test_output2=nl2br($rows['test_output2']); 
      $test_input3=nl2br($rows['test_input3']);  
      $test_output3=nl2br($rows['test_output3']);  
      $test_input4=nl2br($rows['test_input4']);  
      $test_output4=nl2br($rows['test_output4']);
      $test_input4=nl2br($rows['test_input5']);  
      $test_output5=nl2br($rows['test_output5']);   

       ?>

    <div id="menu2" class="tab-pane fade">
      <div class="container-fluid">
        <div class="inner">

          <h3 class="h3" align="center"><b>QUESTION: 3</b></h3> <br>
		  <b>Problem statement:</b> <br>
		  <?php
		 
		  
			  print_r($problem);

		  
		  ?>
		  <br><br>
		  <b>Constraints:</b><br>
		  <?php
           print_r($constraints);
		   ?>
		   <br><br>
          <b>Input Format:</b>
          <br>



                   <?php
                   print_r($input_format);
		            ?>

          <br><br>

          <b>Output Format:</b><br>
                   <?php
                    print_r($output_format);
		           ?>
				   
		<br><br><b>Public Test case 1:</b><br>
                   <?php
                    print_r($test_input1);  
		           ?>
				   <br><br><b>Output Test case 1:</b><br>
                   <?php
                    print_r($test_output1);  
		           ?>
				   
				   <br><br><b>Public Test case 2:</b><br>
                   <?php
                    print_r($test_input2);  
		           ?>
				   <br><br><b>Output Test case 2:</b><br>
                   <?php
                    print_r($test_output2);  
		           ?>
        </div>
        <div class="inner2"><br>
        <h4 class="h3" align="center"><b>Enter your code here</b></h4>
		  <!-- Editor starts-->
  
	
		<div class="ide">
		<div class="result">
		
		<?php  ?>
		</div>

		<div class="main-content">
			<form  method="post" role="form">
			
				<div class="row">
					<div class="col-sm-9">
						<input type="hidden" name="user_email3" value="<?php echo $_SESSION['Email']; ?>">
						<input type="hidden" name="test_output1" value="<?php echo $test_output1; ?>">
						<input type="hidden" name="test_output2" value="<?php echo $test_output2; ?>">
						<input type="hidden" name="test_output3" value="<?php echo $test_output3; ?>">
						<input type="hidden" name="test_output4" value="<?php echo $test_output4; ?>">
						<input type="hidden" name="test_output5" value="<?php echo $test_output5; ?>">
						<?php
						if (isset($_SESSION['selected_language']) && $_SESSION['selected_language'] == "java"){
									echo "Public class name should be 'testfile_java'";
							}
						?>
					<textarea rows="40" cols="170" name="program" class="program" id="code3"  value= <?php if (isset($code3)){?>
                    <spam class="text-danger"> <?php echo $code3; }?></textarea><?php 
						if(isset($_SESSION['selected_language'])){
							// Load the last compiled program, if any, of the selected language.
							if(isset($_SESSION['c_program']) && ($_SESSION['selected_language'] == "c")){
								echo $_SESSION['c_program'];
							}
							else if(isset($_SESSION['cpp_program']) && ($_SESSION['selected_language'] == "cpp")){
								echo $_SESSION['cpp_program'];
							}
							else if(isset($_SESSION['java_program']) && ($_SESSION['selected_language'] == "java")){
								echo $_SESSION['java_program'];
							}
							else if(isset($_SESSION['python_program']) && ($_SESSION['selected_language'] == "python")){
								echo $_SESSION['python_program'];
							}
							else{
								echo "";
							}
						}
						else{
							$_SESSION['selected_language'] = "c";
							echo "";
						}
						
						?></textarea>
					</div>
			

					<div class="col-sm-3 side-content">
						<div class="form-group">
							<select name="language" onchange="changeLanguage()" id="language" class="form-control">
								<?php if(!isset($_SESSION['selected_language']) || $_SESSION['selected_language'] == "c"){?>
									<option value="c" selected> C </option>
									<option value="cpp"> C++ </option>
									<option value="java"> Java </option>
									<option value="python"> Python </option>
								<?php } ?>
								<?php if($_SESSION['selected_language'] == "cpp"){?>
									<option value="c"> C </option>
									<option value="cpp" selected> C++ </option>
									<option value="java"> Java </option>
									<option value="python"> Python </option>
								<?php } ?>
								<?php if($_SESSION['selected_language'] == "java"){?>
									<option value="c"> C </option>
									<option value="cpp"> C++ </option>
									<option value="java" selected> Java </option>
									<option value="python"> Python </option>
								<?php } ?>
								<?php if($_SESSION['selected_language'] == "python"){?>
									<option value="c"> C </option>
									<option value="cpp"> C++ </option>
									<option value="java"> Java </option>
									<option value="python" selected> Python </option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<!-- Text box for standard  input. -->
							
							 <input  type="hidden" rows="5" cols="70" name="input" class="form-control" value="<?php echo $total_case; ?>" ><br/><br/><br/><br/><br/><br/><br/><br/>
						
						<div class="form-group">
							<input class="btn btn-primary" type="submit" value="Compile And Run" name="compile3">
							<br>
							<span value= <?php if (isset($msg3)){?>
                    <span class="text-success"> <?php echo $msg3; }?></span>
                    	<br>
							<span value= <?php if (isset($error_msg3)){?>
                    <spamnclass="text-danger"> <?php echo $error_msg3; }?></span>
						</div>
					</div>
				</div>
			</form>
		</div>	
	</div>
</div>       
</div>
      <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>

    <!-- Question 3 section ends-->

  </div>
      
 


	<script>
		// Script for the editor.
		var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
		    styleActiveLine: true,
		    lineNumbers: true,
		    lineWrapping: true,
		    <?php if(($_SESSION['selected_language'] == "c")){
		    	echo "mode: 'text/x-csrc',";
		     }?>
		    <?php if(($_SESSION['selected_language'] == "cpp")){
		    	echo "mode: 'text/x-c++src',";
		     }?>
		    <?php if(($_SESSION['selected_language'] == "java")){
		    	echo "mode: 'text/x-java',";
		     }?>
		     <?php if(($_SESSION['selected_language'] == "python")){
		    	echo "mode: {name: 'text/x-cython',
               				version: 2,
               				singleLineStringErrors: false},";
		     }?>
		    keyMap: "sublime",
		    autoCloseBrackets: true,
		    matchBrackets: true,
		    showCursorWhenSelecting: true,
		    theme: "twilight",
		    tabSize: 2
		  });
		  
		  var editor = CodeMirror.fromTextArea(document.getElementById("code2"), {
		    styleActiveLine: true,
		    lineNumbers: false,
		    lineWrapping: true,
		    <?php if(($_SESSION['selected_language'] == "c")){
		    	echo "mode: 'text/x-csrc',";
		     }?>
		    <?php if(($_SESSION['selected_language'] == "cpp")){
		    	echo "mode: 'text/x-c++src',";
		     }?>
		    <?php if(($_SESSION['selected_language'] == "java")){
		    	echo "mode: 'text/x-java',";
		     }?>
		     <?php if(($_SESSION['selected_language'] == "python")){
		    	echo "mode: {name: 'text/x-cython',
               				version: 2,
               				singleLineStringErrors: false},";
		     }?>
		    keyMap: "sublime",
		    autoCloseBrackets: true,
		    matchBrackets: true,
		    showCursorWhenSelecting: true,
		    theme: "twilight",
		    tabSize: 2
		  });
		  
		  var editor = CodeMirror.fromTextArea(document.getElementById("code3"), {
		    styleActiveLine: true,
		    lineNumbers: false,
		    lineWrapping: true,
		    <?php if(($_SESSION['selected_language'] == "c")){
		    	echo "mode: 'text/x-csrc',";
		     }?>
		    <?php if(($_SESSION['selected_language'] == "cpp")){
		    	echo "mode: 'text/x-c++src',";
		     }?>
		    <?php if(($_SESSION['selected_language'] == "java")){
		    	echo "mode: 'text/x-java',";
		     }?>
		     <?php if(($_SESSION['selected_language'] == "python")){
		    	echo "mode: {name: 'text/x-cython',
               				version: 2,
               				singleLineStringErrors: false},";
		     }?>
		    keyMap: "sublime",
		    autoCloseBrackets: true,
		    matchBrackets: true,
		    showCursorWhenSelecting: true,
		    theme: "twilight",
		    tabSize: 2
		  });
	</script>




  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <!-- Submit pop up-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post"  enctype="multipart/form-data"> 
      <div class="modal-body">
      <center><h4> Do you want to submit the test?</h4></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button name="end" type="submit" class="btn btn-info">Yes, submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Submit pop up ends-->



<script type="text/javascript">
setInterval(function()
{   
    var xmlhttp=new XMLHttpRequest();
	
	xmlhttp.open("GET","response.php",false);
	xmlhttp.send(null);	
	if(xmlhttp.responseText=="00:00:01")
	{
		window.location="index.php";
	}
	document.getElementById("response").innerHTML=xmlhttp.responseText;
},1000);
</script>


</body>
</html>