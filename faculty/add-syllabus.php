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
                <a href="#">Dashboard</a>
              </li>


              <li>
                <a href="#">Settings</a>
              </li>


              <li>
                <a href="#">Profile</a>
              </li>


              <li>
                <a href="#">Help</a>
              </li>
            </ul>


            <form class="navbar-form navbar-right">
              <input class="form-control" placeholder="Search..." type=
              "text">
            </form>
          </div>
        </div>
      </nav>


      <div class="container">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li>
              <a href="faculty.html">Overview</a>
            </li>


            <li class="active">
              <a href="documents.html">Documents <span class=
                "sr-only">(current)</span></a>
              </li>


              <li>
                <a href="#">Classes</a>
              </li>
            </ul>
          </div>


          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <form class="form-horizontal" name="addForm" method="post" action="syllabus_html_template.php">
              <fieldset>
                <!-- Form Name -->
                <legend>Add a Syllabus</legend> <!-- Text input-->


                <div class="control-group">
                  <label class="control-label" for="courseNumber">Course Number</label>
                  <div class="controls">
                    <input class="input-xlarge" id="courseNumber" name="courseNumber" placeholder="Enter Course Number" type="text">
                  </div>
                </div>
                <!-- Text input-->


                <div class="control-group">
                  <label class="control-label" for="courseTitle">Course
                    Title</label>

                    <div class="controls">
                      <input class="input-xlarge" id="courseTitle" name=
                      "courseTitle" placeholder="Enter Title" type=
                      "text">
                    </div>
                  </div>
                  <!-- Text input-->


                  <div class="control-group">
                    <label class="control-label" for="contactHours">Contact
                      Hours</label>

                      <div class="controls">
                        <input class="input-xlarge" id="contactHours" name=
                        "contactHours" placeholder="Enter Contact Hourse"
                        type="text">
                      </div>
                    </div>
                    <!-- Text input-->


                    <div class="control-group">
                      <label class="control-label" for=
                      "credits">Credits</label>

                      <div class="controls">
                        <input class="input-xlarge" id="credits" name=
                        "credits" placeholder="Enter Credits" type="text">
                      </div>
                    </div>
                    <!-- Textarea -->


                    <div class="control-group">
                      <label class="control-label" for=
                      "description">Description</label>

                      <div class="controls">
                        <textarea id="description" name="description"></textarea>
                      </div>
                    </div>
                    <!-- Multiple Checkboxes (inline) -->


                    <div class="control-group">
                      <label class="control-label" for=
                      "schedule">Schedule</label>

                      <div class="controls">
                        <label class="checkbox inline" for=
                        "schedule-0"><input id="schedule-0" name="schedule[]"
                        type="checkbox" value="Monday"> Monday</label>
                        <label class="checkbox inline" for=
                        "schedule-1"><input id="schedule-1" name="schedule[]"
                        type="checkbox" value="Tuesday"> Tuesday</label>
                        <label class="checkbox inline" for=
                        "schedule-2"><input id="schedule-2" name="schedule[]"
                        type="checkbox" value="Wednesday">
                        Wednesday</label> <label class="checkbox inline"
                        for="schedule-3"><input id="schedule-3" name=
                        "schedule[]" type="checkbox" value="Thursday">
                        Thursday</label> <label class="checkbox inline"
                        for="schedule-4"><input id="schedule-4" name=
                        "schedule[]" type="checkbox" value="Friday">
                        Friday</label> <label class="checkbox inline" for=
                        "schedule-5"><input id="schedule-5" name="schedule[]"
                        type="checkbox" value="Saturday"> Saturday</label>
                        <label class="checkbox inline" for=
                        "schedule-6"><input id="schedule-6" name="schedule[]"
                        type="checkbox" value="Sunday"> Sunday</label>
                      </div>
                    </div>
                    <!-- Text input-->


                    <div class="control-group">
                      <label class="control-label" for=
                      "faculty1">Faculty</label>

                      <div class="controls">
                        <input class="input-xlarge" id="faculty1" name=
                        "faculty[]" placeholder="Enter a Faculty Member"
                        type="text">
                      </div>
                    </div>
                    <!-- Button -->


                    <div class="control-group">
                      <label class="control-label" for="addFaculty"></label>

                      <div class="controls">
                        <button class="btn btn-default" id="addFaculty"
                        name="addFaculty">Add</button>
                      </div>
                    </div>
                    <!-- Text input-->


                    <div class="control-group">
                      <label class="control-label" for="officeHours">Office
                        Hours</label>

                        <div class="controls">
                          <input class="input-xlarge" id="officeHours" name=
                          "officeHours" placeholder="Enter Office Hours"
                          type="text">
                        </div>
                      </div>
                      <!-- Text input-->


                      <div class="control-group">
                        <label class="control-label" for=
                        "resources">Resources</label>

                        <div class="controls">
                          <input class="input-xlarge" id="resources" name=
                          "resources" placeholder="Enter Resources" type=
                          "text">
                        </div>
                      </div>
                      <!-- Multiple Checkboxes -->


                      <div class="control-group">
                        <label class="control-label" for=
                        "additionalItems">Additional Items</label>

                        <div class="controls">
                          <label class="checkbox" for=
                          "additionalItems-0"><input id="additionalItems-0"
                          name="additionalItems" type="checkbox" value=
                          "Academic Dishonesty Policy"> Academic Dishonesty
                          Policy</label> <label class="checkbox" for=
                          "additionalItems-1"><input id="additionalItems-1"
                          name="additionalItems" type="checkbox" value=
                          "Statement of Academic Integrity"> Statement of
                          Academic Integrity</label> <label class="checkbox"
                          for="additionalItems-2"><input id=
                          "additionalItems-2" name="additionalItems" type=
                          "checkbox" value="Attendance Policy"> Attendance
                          Policy</label> <label class="checkbox" for=
                          "additionalItems-3"><input id="additionalItems-3"
                          name="additionalItems" type="checkbox" value=
                          "Professional Behavior Expectations"> Professional
                          Behavior Expectations</label> <label class=
                          "checkbox" for="additionalItems-4"><input id=
                          "additionalItems-4" name="additionalItems" type=
                          "checkbox" value="Electronic Devices"> Electronic
                          Devices</label> <label class="checkbox" for=
                          "additionalItems-5"><input id="additionalItems-5"
                          name="additionalItems" type="checkbox" value=
                          "Examinations"> Examinations</label> <label class=
                          "checkbox" for="additionalItems-6"><input id=
                          "additionalItems-6" name="additionalItems" type=
                          "checkbox" value="Academic Resource Center(ARC)">
                          Academic Resource Center(ARC)</label> <label class=
                          "checkbox" for="additionalItems-7"><input id=
                          "additionalItems-7" name="additionalItems" type=
                          "checkbox" value="Disability Services"> Disability
                          Services</label> <label class="checkbox" for=
                          "additionalItems-8"><input id="additionalItems-8"
                          name="additionalItems" type="checkbox" value=
                          "Grading Policy"> Grading Policy</label>
                        </div>
                      </div>
                      <!-- Textarea -->

                      <div id="objectivesDiv">
                        <!-- Button Drop Down -->
                        <div class="control-group">
                          <label class="control-label" for="objectives">Objective 1</label>
                          <div class="controls">
                           <div class="input-append">
                             <input id="objectives" name="objectives" class="input-xlarge" placeholder="Objective" type="text">
                             <div class="btn-group">
                              <button class="btn dropdown-toggle" data-toggle="dropdown">
                                Taxonomy
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--End DropDown-->
                      <div class="control-group">
                        <label class="control-label" for="objectives">Objective 2</label>
                        <div class="controls">
                         <div class="input-append">
                           <input id="objectives" name="objectives" class="input-xlarge" placeholder="Objective" type="text">
                           <div class="btn-group">
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                              Taxonomy
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">4</a></li>
                              <li><a href="#">5</a></li>
                              <li><a href="#">6</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--End DropDown-->
                  </div><!--End Objectives-->
                  <button class="btn btn-default" type="button" id="addObjective" name="addObjective" onclick="addObjective()">Add</button>
                </div>
              </fieldset>
              <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
              <button type="submit" name="syllabusFormSubmit" class="btn btn-default">Submit</button>
              </div>
            </form>
          </div>
          <br>
          <br><br><br><br><br><br>


          <p>
          </p>
        </div>
        <script>
         function addObjective(){
          var element = document.createElement("BUTTON");

		//element.setAttribute("type", "text");
		//element.setAttribute("value", "");
		//element.setAttribute("name", "Test Name");
		
		//var foo = document.getElementById("objectivesDiv");
		document.getElementById("objectivesDiv").appendChild(element);
	}
</script>
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