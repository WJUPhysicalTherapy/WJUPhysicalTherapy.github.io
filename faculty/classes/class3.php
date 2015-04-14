<?php
require_once('../../database/Database.php');

$db = new Database('localhost', 'wjuphysi_nic', 'physical2015', 'wjuphysi_syllabi');

$class = $_POST["classNumber"];

//$cn, $ct, $ch, $credits, $schedule_days
//$_POST["courseNumber"], $_POST["courseTitle"], $_POST["contactHours"], $_POST["credits"], $_POST["schedule"]

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style src="../../js/documents.js"></style>
	<style>
		.syl{
			font-family: "Times New Roman", Times, serif; 
			width: 750px;
			padding:30px;
		}
		h3, h4{
			display:inline;	
		}
		table{
			
		}
		th{
			min-width:200px;
			vertical-align: top;
			text-align:left;
			text-transform: uppercase;
		}

		tr{
			border-spacing: 3em;
			padding-bottom:3em;
		}
		.spacer{
			height:25px;
		}
		
		.title{
			font-weight: bold;
			text-transform: uppercase;
			text-align: left;
		}
		.centerTitle{
			font-weight: bold;
			text-transform: uppercase;
			text-align: center;
		}


	</style>
  </head>

  <body>
  	
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../../index.html">WJU PT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/faculty/profile/profile.php">Craig Ruby</a></li>
            <li><a href="/faculty/faculty.php">Dashboard</a></li>
            <li><a href="#" onclick="print()">Print</a></li>
          </ul>
          <!--<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>-->
        </div>
      </div>
    </nav>

    <div class="container">

	  <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="../faculty.php">Overview</a></li>
            <li class="active"><a href="../documents.php">Documents <span class="sr-only">(current)</span></a></li>
            <li><a href="../classes.html">Classes</a></li>
          </ul>
      </div>
      <div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main syl">
      <!--button style="btn btn-primary" onclick="print()">Click Here to Print</button-->
      <div if="printDiv">
       <div class="centerTitle">
			<h3>Wheeling Jesuit University</h3><br/>
			<h3>Department of Physical Therapy</h3><br/>
			
			<h3>Course Syllabus</h3><br/>
			
			<h3>Fall 2014 - Class 2016</h3><br/>
		</div>
		<table>
		<tr class="spacer"></tr>
			<tr>
				<th>Course Number:</th>
				<td>DPT <?php echo $db->querySingle("course_number", $class); ?></td>
			</tr>
			<tr></tr>
			<tr>
				<th>Course Title:</th>
				<td><?php echo $db->querySingle("course_title", $class); ?></td>
			</tr>
			<tr></tr>
			<tr><?php 
					if(null !== ($db->querySingle("contact_hours", $class))){
						echo "<th>Contact Hours:</th>";
						echo "<td>";
						echo $db->querySingle("contact_hours", $class); 
						echo" hours per week</td>";
					}
				?>
			</tr>
			<tr></tr>
			<tr>
				<th>Credits:</th>
				<td><?php echo $db->querySingle("credits", $class); ?></td>
			</tr>
			<tr class="spacer"><td>  </td></tr>
			<tr><?php 
					if(null !== ($db->querySingle("description", $class))){
						echo "<th>Description:</th>";
						echo "<td>";
						echo $db->querySingle("description", $class); 
						echo "</td>";
					}
					?>
			</tr>
			<tr class="spacer"></tr>
			<tr>
				<th>Schedule:</th>
				<td><?php echo $db->querySingle("schedule_days", $class);
				//$schedule = $_POST["schedule"];
				//foreach ($schedule as $day => $n) {
					//echo $schedule[$day].", ";
				//} ?>
				</td>
			</tr>
			<tr></tr>
			<tr><?php 
					if(null !== ($db->querySingle("location", $class))){
						echo "<th>Location:</th>";
						echo "<td>";
						echo $db->querySingle("location", $class); 
						echo "</td>";
					}
					?>
			</tr>
			<tr class="spacer"></tr>
			<tr>
			<?php 
					if(null !== ($db->querySingle("faculty", $class))){
						echo "<th>Faculty:</th>";
						echo "<td>";
						echo $db->querySingle("faculty", $class); 
						echo "</td>";
					}
					?>
			</tr>
			<tr class="spacer"></tr>
			<tr>
				<?php 
					if(null !== ($db->querySingle("office_hours", $class))){
						echo "<th>Office Hours:</th>";
						echo "<td>";
						echo $db->querySingle("office_hours", $class);
						echo "</td>";
					}
				?>
			</tr>
			<tr></tr>
			<tr>
			<?php 
					if(null !== ($db->querySingle("phone", $class))){
						echo "<th>Phone:</th>";
						echo "<td>";
						echo $db->querySingle("phone", $class); 
						echo "</td>";
					}
					?>
			</tr>
			<tr></tr>
			<tr><?php 
					if(null !== ($db->querySingle("email", $class))){
						echo "<th>Email:</th>";
						echo "<td>";
						echo $db->querySingle("email", $class); 
						echo "</td>";
					}
					?>
			</tr>
			<tr class="spacer"></tr>
			<tr>
			<?php 
					if(null !== ($db->querySingle("resources", $class))){
						echo "<th>Resources:</th>";
						echo "<td>";
						echo $db->querySingle("resources", $class); 
						echo "</td>";
					}
					?>
			</tr>
			<tr class="spacer"></tr>
			</table>
			<?php 
				$items = $db->queryArray("additional_items", $class);
				$itemQue = explode(',', $items);
				for($j=0; $j<10; $j++){
						if($itemQue[$j] == 'a'){
							echo "<p><span class='title'>Academic Dishonesty Policy:</span>Please refer to PT Student Handbook.</p>";
						}
						if($itemQue[$j] == 'b'){
							echo "<p><span class='title'>Statement of Academic Integrity:</span>
									Academic integrity means giving credit where credit is due in an academic setting.  It is an ethical 
									obligation of all people who perform intellectual work including students, faculty members, and administrators
									to preserve the importance of academic integrity.  If the source of intellectual work is not correctly cited,
									then the person who uses that source has stolen the property of someone else and has engaged in theft of intellectual property.</p>
									<p>Consequences: Among the sanctions that may be imposed upon finding that an offense related to academic integrity has been committed include:
									<ul>
										<li>Dismissal from the University by the Associate Academic Dean without expectation of re-admission</li>
										<li>Suspension from the University by the Associate Academic Dean for a specific period of time.</li>
										<li>Dismissal from the department in which the offense occurred, and/or exclusion from courses
										offered in that department, permanently, or for a stated period of time.</li>
										<li>Dismissal from the course in which the offense occurred with or without the opportunity to
										re-enroll at a future date.</li>
										<li>Reduction in grade, or assignment of failing grade, in the course in which the offending paper or
										examination was submitted.</li>
										<li>Reduction in grade, or assignment or a failing grade on the paper or examination in which the
										offense occurred.</li>
									</ul>
								</p>";
						}
						if($itemQue[$j] == 'c'){
							echo "<p><span class='title'>Attendance Policy:</span>
				Please refer to PT Student Handbook. Absenteeism (more than once) and/or tardiness 
				(more than twice) will be reported to the Academic Progress Committee of the Program.  
				This is a graduate class and will start and end promptly.  Penalty for missing a lecture 
				or excessive tardiness (more than twice) during this course: 1% will be deducted from 
				your final grade for each unjustified absences or episode of tardiness up to 5% of your 
				total grade.</p>";
						}
						if($itemQue[$j] == 'd'){
							echo "<p><span class='title'>Professional Behavior Expectations:</span>
				At the instructor’s discretion, a maximum of 10% of total grade points may be deducted 
				for failure to present with professional comportment under all circumstances during this course.
				Lack of the student’s ability to present and behave in a professional manner will be referred to
				the Academic Progress Committee for appropriate intervention.
				</p>";
						}
						if($itemQue[$j] == 'e'){
							echo "<p><span class='title'>Electronic Devices:</span>
				As a courtesy to everyone involved in the course electronic devices such as beepers and cell 
				phones are to be turned off (no sound or vibrating) during class.  If, for some extenuating circumstance, 
				you must be in communication with people outside of class please alert the instructor prior to the 
				start of class.</p>";
						}
						if($itemQue[$j] == 'f'){
							echo "<p><span class='title'>Examinations:</span>
				Written examinations will include material covered in lectures, class discussions, and assigned 
				readings. The exam questions may consist of but are not limited to oral questions, multiple choice, 
				short answer, true/false, short answer, matching, and fill in the blank. Exams are cumulative relative 
				to conceptual information that has relevance to material presented in the course sequence. 
				</p>
				<p>
				During an exam, unless otherwise stated, no books or papers will be allowed in your seat; you may leave
				them in the front of the room.  You must bring your own pencils.
				</p>
				<p>
				If a student has prior knowledge that she/he will miss an exam, that student should meet with the instructor
				at least one (1) week prior to the exam and make arrangements to complete the necessary work.  An absence from
				an exam without an acceptable excuse will result in the assignment of a score of zero (Ø).  An excuse for absence 
				during an exam must satisfy university guidelines.  Absence from a scheduled exam for medical reasons must be
				verified by documentation from the health care professional that provided services to the student.  In cases 
				of emergencies or unexpected absence the student should contact the instructor as soon as possible.  In any case,
				the format (essay, objective, or oral) and time of make-up examinations will be at the discretion of the instructor.
				Tardiness for an exam will not be given additional time. 
				</p>";
						}
						if($itemQue[$j] == 'g'){
							echo "<p><span class='title'>Academic Resource Center (ARC):</span></p>
									<p>
									The Academic Resource Center or ARC, located on the ground floor of Ignatius Hall, is a place where students who
									want to succeed can find professional and caring staff who are willing to listen to their ideas and who provide effective
									strategies to tackle academic tasks.  Assistance is available through one-on-one tutoring instruction, study groups, or
									instructional computer software.  The academic support services at the ARC are available to all Wheeling Jesuit University
									students at no charge.  The ARC serves as an extension of the classroom where learning continues in a collaborative environment.
									 Students need to come to ARC appointments prepared with textbooks, notes, and assignments to discuss study strategies and listen 
									 to suggestions made by the tutors. The ARC encourages students to take responsibility for their own academic achievement and become successful, life-long learners.
									</p><p>
									Students may call the ARC at 304-243-4473 or stop in to set up an appointment with a writing tutor, math tutor, subject tutor,
									or individual professional staff member for assistance with study skills, time management, or strategies to deal with learning
									disabilities. Tutors are scheduled for a variety of core courses on a regular basis throughout the academic year.  Students are
									invited to explore the ARC computer lab, which includes Internet access, computer applications, and self-paced instructional 
									software. The ARC also offers a quiet, comfortable, and effective study environment for students. 
									</p>
									<p>
									The ARC is open 51 hours per week during the fall and spring semesters.  The hours of operation are Monday, Tuesday, Wednesday, 
									and Thursday from 10:00 a.m. – 9:00 p.m., Friday from 10:00 a.m. – 2:00 p.m., and Sunday from 6:00 p.m. – 9:00 p.m.  Visit the 
									ARC website at www.wju.edu/arc to learn more about what the ARC has to offer.  Contact the ARC via e-mail at arc@wju.edu or FAX at 304-243-4457.
									</p>";
						}
						if($itemQue[$j] == 'h'){
							echo "<p><span class='title'>Disability Services:</span>
										Wheeling Jesuit University encourages faculty, staff and administration to assist students with disabilities in achieving academic success.  The University offers students with documented disabilities reasonable accommodations on a case-by-case basis with confidentiality in compliance with the Americans with Disabilities Act and Section 504 of the Rehabilitation Act of 1973.  Students with special academic needs due to physical or learning disabilities should contact the Disability Services Director at 304-243-4484.   Disability Services are coordinated through the Academic Resource Center (ARC) located in G 24 on the ground floor of Ignatius Hall.  A learning disabilities specialist is available at the ARC to provide assistance with time management, study skills, or strategies that specifically address learning disability issues.
									</p>
									<p>
										In order to receive assistance, students must disclose their disability to the university, provide current and comprehensive documentation concerning the nature and extent of the disability, and communicate their specific needs to the Disability Services Director.  Wheeling Jesuit University is committed to providing reasonable accommodations to students with disabilities; however, it is the responsibility of these students to seek out available assistance on campus and to utilize individualized adjustments.  Ultimately, all students are responsible for their own academic achievement.  They must attend classes, complete course assignments and fulfill all university requirements for their chosen field of study.
										</p>";
							}
						if($itemQue[$j] == 'i'){
							echo "<p><span class='title'>Grading Policy:</span>
								This is a pass/fail course.  Attendance at each assignment and completion of tasks as assigned is required for successful completion of this course.
									<br/>1. Paper on the reading:  Drnach, M., Developing Cultural Awareness.  
									<br/>2. Self reflection for each site on what you learned to be placed in your portfolio in the section on service. 
								</p>";
						}
				}
					
					//if(isset($_POST["additionalItems"]) && $_POST["academicDishonestyPolicy"]=='yes'){
						//echo "Working";
						//"<tr>
						//<th>Academic Dishonesty Policy:</th>
						//	<td>Please refer to PT Student Handbook.</td>
						//</tr>";
					//}
					
				?>
				<?php 
					if(null !== ($db->querySingle("objectives", $class))){
						echo "<p><span class='title'>Objectives:</span>The student will be able to:";
						echo "<ol>";
						$obj = $db->queryArray("objectives", $class);
							$objectives = explode(".", $obj);
							//echo $obj;
							for($i=0; $i<count($objectives)-1; $i++){
								echo "<li>".$objectives[$i]."</li>";
							}
						echo "</ol></p>";
						echo "<p>*Major Categories in the Taxonomy of Educational Objectives (Bloom 1956)</p>";
					}
					?>
				</div>
				</div><!--End Print Div-->
      </div><!--End Centering Div-->

    </div><!-- /.container */-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php $db->disconnect();?>
