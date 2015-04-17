<?php session_start();
  if(isset($_SESSION["id"])){
  }else{
    echo $_SESSION['myusername'];
    header("location:../index.html");
    //die();
  }
?>
<?php
//Database code
require_once('../database/Database.php');
$db = new Database('localhost', 'wjuphysi_nic', 'physical2015', 'wjuphysi_syllabi');


//define variables and set to empty values
$courseNumberErr = $courseTitleErr = $contactHoursErr = $creditsErr = $descriptionErr = $scheduleErr = $facultyErr = "";
$courseNumber = $courseTitle = $contactHours = $credits = $description = $schedule = $faculty = "";

/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST["courseNumber"])){
		$courseNumberErr = "Course number required";
	} else {
		$courseNumber = test_input($POST["courseNumber"]);
	}
}*/

if(isset($_POST['syllabusFormSubmit'])){
	$db->insert();
}

$course = $_GET['courseNumber'];
$result = $db->querySimple('*', 'classes', "course_number='".$course."'");

//To check the schedule time
$scDays = explode(",", $result['schedule_days']);
//echo $scDays[0];
for($i=0; $i < count($scDays); $i++){
  if($scDays[$i] == 'monday'){
    $mo = true;
  }else if($scDays[$i] == 'tuesday'){
    $tu = true;
  }else if($scDays[$i] == 'wednesday'){
    $we = true;
  }else if($scDays[$i] == 'thursday'){
    $th = true;
  }else if($scDays[$i] == 'friday'){
    $fr = true;
  }else if($scDays[$i] == 'saturday'){
    $sa = true;
  }else if($scDays[$i] == 'sunday'){
    $su = true;
  }

}

//To Check the Additional Items
$addItems = explode(",", $result['additional_items']);
//echo $scDays[0];
for($i=0; $i < count($addItems); $i++){
  if($addItems[$i] == 'a'){
    $ai_a = true;
  }else if($addItems[$i] == 'b'){
    $ai_b = true;
  }else if($addItems[$i] == 'c'){
    $ai_c = true;
  }else if($addItems[$i] == 'd'){
    $ai_d = true;
  }else if($addItems[$i] == 'e'){
    $ai_e = true;
  }else if($addItems[$i] == 'f'){
    $ai_f = true;
  }else if($addItems[$i] == 'g'){
    $ai_g = true;
  }else if($addItems[$i] == 'h'){
    $ai_h = true;
  }else if($addItems[$i] == 'i'){
    $ai_i = true;
  }

}




?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">
  <link href="../../favicon.ico" rel="icon">

  <title>Add Syllabus</title>
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target="#navbar"
            data-toggle="collapse" type="button"><span class=
            "sr-only">Toggle navigation</span> <span class=
            "icon-bar"></span> <span class="icon-bar"></span> <span class=
            "icon-bar"></span></button> <a class="navbar-brand" href=
            "../index.html">WJU PT</a>
          </div>


          <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="/faculty/profile/profile.php"><?php echo $db->queryProfile("first_name", $_SESSION['id']); echo  " "; echo $db->queryProfile("last_name", $_SESSION['id']); ?></a>
              </li>


              <li>
                <a href="../faculty/faculty.php">Dashboard</a>
              </li>

              <li>
                <a href="/login/logout.php">Logout</a>
              </li>
            </ul>


            <!--<form class="navbar-form navbar-right">
              <input class="form-control" placeholder="Search..." type=
              "text">
            </form>-->
          </div>
        </div>
      </nav>

      <div class="col-md-6 col-md-offset-3"><!--Start Editing navbar-->
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="#">View </a></li>
              <li class="active"><a name="courseNumber"href="../edit-syllabus.php?courseNumber=<?php echo $db->querySingle("course_number", $class)?>">Edit</a></li>
              <li><a href="#">Save</a></li>
              
            </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

    </div><!--End editing Nav bar-->


      <div class="container">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li>
              <a href="faculty.php">Overview</a>
            </li>


            <li class="active">
              <a href="documents.php">Documents <span class=
                "sr-only">(current)</span></a>
              </li>


              <li>
                <a href="classes.html">Classes</a>
              </li>
            </ul>
          </div>


          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <form class="form-horizontal" name="addForm" method="post" action="syllabus_html_template.php">
              <fieldset>
                <!-- Form Name -->
                <legend>Edit Syllabus</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="courseNumber">Course Number:</label>  
				  <div class="col-md-6">
				  <input id="courseNumber" name="courseNumber" type="number" value="<?php echo $course;?>" class="form-control input-md" required>
					
				  </div>
				</div>
        <div ><?php
        //echo $resultArr['description'];
        //'Results: '.$result;
        ?></div>

                <div class="form-group">
                  <label class="col-md-4 control-label" for="courseTitle">Course
                    Title</label>

                    <div class="col-md-6">
                      <input class="form-control input-md" id="inputName" name=
                      "courseTitle" value="<?php echo $result['course_title'];?>" type="text" >
                    </div>
                  </div>
                  <!-- Text input-->


                  <div class="form-group">
                    <label class="col-md-4 control-label" for="contactHours">Contact
                      Hours</label>

                      <div class="col-md-6">
                        <input class="form-control input-md" id="contactHours" name=
                        "contactHours" value="<?php echo $result['contact_hours'];?>"
                        type="number" >
                      </div>
                    </div>
                    <!-- Text input-->


                    <div class="form-group">
                      <label class="col-md-4 control-label" for=
                      "credits">Credits</label>

                      <div class="col-md-6">
                        <input class="form-control input-md" id="credits" name=
                        "credits" value="<?php echo $result['credits'];?>" type="number" >
                      </div>
                    </div>
                    <!-- Textarea -->


                    <div class="form-group">
                      <label class="col-md-4 control-label" for=
                      "description">Description</label>

                      <div class="col-md-6">
                        <textarea class="form-control" id="description" name="description" cols="56" rows="5"><?php echo $result['description'];?></textarea>
                      </div>
                    </div>
                    <!-- Multiple Checkboxes (inline) -->

                    <div class="form-group">
                      <label class="col-md-4 control-label" for=
                      "schedule">Schedule</label>

                      <div class="col-md-6">
                        <label class="checkbox-inline" for="schedule-0">
                          <input id="schedule-0" name="schedule[]" type="checkbox" value="monday" <?php if(isset($mo))echo 'checked';?>> 
                          Monday
                        </label>

                        <label class="checkbox-inline" for="schedule-1">
                          <input id="schedule-1" name="schedule[]" type="checkbox" value="tuesday" <?php if(isset($tu))echo 'checked';?>> 
                          Tuesday
                        </label>

                        <label class="checkbox-inline" for="schedule-2">
                          <input id="schedule-2" name="schedule[]" type="checkbox" value="wednesday"<?php if(isset($we))echo 'checked';?>>
                          Wednesday
                        </label> 

                        <label class="checkbox-inline" for="schedule-3">
                          <input id="schedule-3" name="schedule[]" type="checkbox" value="thursday" <?php if(isset($th))echo 'checked';?>>
                          Thursday
                        </label> 

                        <label class="checkbox-inline" for="schedule-4">
                          <input id="schedule-4" name="schedule[]" type="checkbox" value="friday" <?php if(isset($fr))echo 'checked';?>>
                          Friday
                        </label> 

                        <label class="checkbox-inline" for="schedule-5">
                          <input id="schedule-5" name="schedule[]" type="checkbox" value="saturday" <?php if(isset($sa))echo 'checked';?>> 
                          Saturday
                        </label>

                        <label class="checkbox-inline" for="schedule-6">
                          <input id="schedule-6" name="schedule[]" type="checkbox" value="sunday" <?php if(isset($su))echo 'checked';?>> 
                          Sunday
                        </label>
                      </div>
                    </div>

                    <!--Schedule Time-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for=
                      "schedule_time">Scheduel Time</label>

                      <div class="col-md-6">
                        <input class="form-control input-md" id="schedule_time" name=
                        "schedule_time" value="<?php echo $result['schedule_time'];?>"
                        type="text">
                      </div>
                    </div>

                    <!-- Location-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for=
                      "location">Location</label>

                      <div class="col-md-6">
                        <input class="form-control input-md" id="location" name=
                        "location" value="<?php echo $result['location'];?>"
                        type="text">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for=
                      "faculty1">Faculty</label>

                      <div class="col-md-6">
                        <input class="form-control input-md" id="faculty1" name=
                        "faculty[]" value="<?php echo $result['faculty'];?>"
                        type="text">
                      </div>
                    </div>
                    <p id="addFaculty"></p>
                    <!-- Button -->


                    <div class="form-group">
                      <label class="col-md-4 control-label" for="addFaculty"></label>

                      <div class="col-md-6">
                        <button class="btn btn-default" id="addFacultyBtn"
                        name="addFacultyBtn" type="button" onclick="addFaculty()">Add Faculty Member</button>
                      </div>
                    </div>
                    <!-- Text input-->


                    <!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="office_hours_time">Office Hours Time:</label>
					  <div class="col-md-6">
						<input id="office_hours_time" name="office_hours_time" type="text" value="<?php echo $result['office_hours'];?>" class="form-control input-md">
					  </div>
					</div>

					<!-- Multiple Checkboxes (inline) -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="office_hours_days">Office Hours Days:</label>
					  <div class="col-md-6">
						<label class="checkbox-inline" for="office_hours_days-0">
						  <input type="checkbox" name="office_hours_days" id="office_hours_days-0" value="Monday">
						  Monday
						</label>
						<label class="checkbox-inline" for="office_hours_days-1">
						  <input type="checkbox" name="office_hours_days" id="office_hours_days-1" value="Tuesday">
						  Tuesday
						</label>
						<label class="checkbox-inline" for="office_hours_days-2">
						  <input type="checkbox" name="office_hours_days" id="office_hours_days-2" value="Wednesday">
						  Wednesday
						</label>
						<label class="checkbox-inline" for="office_hours_days-3">
						  <input type="checkbox" name="office_hours_days" id="office_hours_days-3" value="Thursday">
						  Thursday
						</label>
						<label class="checkbox-inline" for="office_hours_days-4">
						  <input type="checkbox" name="office_hours_days" id="office_hours_days-4" value="Friday">
						  Friday
						</label>
						<label class="checkbox-inline" for="office_hours_days-5">
						  <input type="checkbox" name="office_hours_days" id="office_hours_days-5" value="Saturday">
						  Saturday
						</label>
						<label class="checkbox-inline" for="office_hours_days-6">
						  <input type="checkbox" name="office_hours_days" id="office_hours_days-6" value="Sunday">
						  Sunday
						</label>
					  </div>
					</div>
                      <!-- Phone-->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for=
                        "email">Phone:</label>

                        <div class="col-md-6">
                          <input class="form-control input-md" id="phoneNumber" name=
                          "phoneNumber" value="<?php echo $result['phone'];?>" type=
                          "phone">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label" for=
                        "email">Email:</label>

                        <div class="col-md-6">
                          <input class="form-control input-md" id="email" name=
                          "email" value="<?php echo $result['email'];?>" type=
                          "email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label" for=
                        "resources">Resources</label>

                        <div class="col-md-6">
                          <input class="form-control input-md" id="resources" name=
                          "resources" value="<?php echo $result['resources'];?>" type=
                          "text">
                        </div>
                      </div>
                      <!-- Multiple Checkboxes -->


                      <div class="form-group">
                        <label class="col-md-4 control-label" for=
                        "additionalItems">Additional Items</label>

                        <div class="col-md-6">
                          <label class="checkbox" for="additionalItems-0">
	                          <input id="additionalItems-0" name="additionalItems[]" type="checkbox" value="a" <?php if(isset($ai_a))echo 'checked';?>> 
	                          Academic DishonestyPolicy
                          </label> 
                          <label class="checkbox" for="additionalItems-1">
	                          <input id="additionalItems-1" name="additionalItems[]" type="checkbox" value="b"<?php if(isset($ai_b))echo 'checked';?>> 
	                          Statement of Academic Integrity
                          </label> 
                          <label class="checkbox"
                          for="additionalItems-2"><input id=
                          "additionalItems-2" name="additionalItems[]" type=
                          "checkbox" value="c" <?php if(isset($ai_c))echo 'checked';?>> Attendance
                          Policy</label> <label class="checkbox" for=
                          "additionalItems-3"><input id="additionalItems-3"
                          name="additionalItems[]" type="checkbox" value=
                          "d" <?php if(isset($ai_d))echo 'checked';?>> Professional
                          Behavior Expectations</label> <label class=
                          "checkbox" for="additionalItems-4"><input id=
                          "additionalItems-4" name="additionalItems[]" type=
                          "checkbox" value="e" <?php if(isset($ai_e))echo 'checked';?>> Electronic
                          Devices</label> <label class="checkbox" for=
                          "additionalItems-5"><input id="additionalItems-5"
                          name="additionalItems[]" type="checkbox" value=
                          "f" <?php if(isset($ai_f))echo 'checked';?>> Examinations</label> <label class=
                          "checkbox" for="additionalItems-6"><input id=
                          "additionalItems-6" name="additionalItems[]" type=
                          "checkbox" value="g" <?php if(isset($ai_g))echo 'checked';?>>
                          Academic Resource Center(ARC)</label> <label class=
                          "checkbox" for="additionalItems-7"><input id=
                          "additionalItems-7" name="additionalItems[]" type=
                          "checkbox" value="h" <?php if(isset($ai_h))echo 'checked';?>> Disability
                          Services</label> <label class="checkbox" for=
                          "additionalItems-8"><input id="additionalItems-8"
                          name="additionalItems[]" type="checkbox" value=
                          "i" <?php if(isset($ai_i))echo 'checked';?>> Grading Policy</label>
                        </div>
                      </div>
                      <!-- Textarea -->

                      <div id="objectivesDiv">
	                      <div class='form-group'>
	                      	<label class='col-md-4 control-label' for='objectives'>Objective</label>
	                      	<div class='col-md-6'>
	                      		<div class='input-append'>
	                      			<input id='objectives' name='objective[]' class='form-control input-md' value="<?php echo $result['objectives'];?>" type='text'>
	                      		</div><!--End Input-append-->
	                      	</div><!--End col-md-6-->
	                      	<div class="col-md-2">
						    	<select id="Taxonomy" name="taxonomy[]" class="form-control" required>
							    	<option value="" disabled>Taxonomy</option>
						      		<option value="1">1</option>
						      		<option value="2">2</option>
						      		<option value="3">3</option>
						      		<option value="4">4</option>
						      		<option value="5">5</option>
						      		<option value="6">6</option>
							    </select>
							</div><!--End col-md-2-->
	                      </div><!--End Form Group-->
                    	<p id="addObjective"></p>
                 	 </div><!--End Objectives-->

				  <div class="form-group">
                      <label class="col-md-4 control-label" for="addObjective"></label>
                      <div class="col-md-6">
                        <button class="btn btn-default" id="addObjective" type="button" 
                        name="addObjective" onclick="add()">Add Objective</button>
                      </div>
                    </div>
                  
                </div>
              </fieldset>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
				<div class="form-group">
                      <label class="col-md-4 control-label" for="addObjective"></label>
					<button type="submit" name="syllabusFormSubmit" class="btn btn-default">Save</button>
					</div>
					</div>
				</div>
            </form>

          </div>
          <br>
          <br><br><br><br><br><br>


          <p>
          </p>
        </div>
        <script type="text/javaScript">
        function add(){
        	/**/
			document.getElementById("addObjective").innerHTML += 
			"<div class='form-group'><label class='col-md-4 control-label' for='objectives'></label><div class='col-md-6'><div class='input-append'><input id='objectives' name='objective[]' class='form-control input-md' placeholder='Objective' type='text'></div></div><div class='col-md-2'><select id='Taxonomy' name='taxonomy[]' class='form-control'><option value='' disabled selected>Taxonomy</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option></select></div></div>";
		}

		function addFaculty(){
			document.getElementById("addFaculty").innerHTML += "<div class='form-group'><label class='col-md-4 control-label' for='faculty1'></label><div class='col-md-6'><input class='form-control input-md' id='faculty' name='faculty[]' placeholder='Enter a Faculty Member' type='text'></div></div>";
		}
		</script>
		<?php $db->disconnect();?>
<!-- /.container */-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script> 
    <script src="faculty.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>