<?php $assignname = "Prog2007 - Assignment 3" ?>
<?php include_once("components/assign-body-above.php"); mt_srand(); ?>
<h4>Assignment 3 - Structs, Strings and Pointers</h4>
<p>
Create a student report card application using structs, pointers, and proper file organization.
</p>

<h5>TASK REQUIREMENTS:</h5>

<h6>Part 1: Student Record Creation</h6>
<ul>
    <li>Define StudentRecord struct with:
        <ul>
            <li>StudentID (int)</li>
            <li>LastName (char[21])</li>
            <li>FirstName (char[21])</li>
            <li>Array of 5 CourseRecords (struct with CourseName char[21] and Mark float)</li>
            <li>AverageMark (float)</li>
        </ul>
    </li>
    <li>Create function to initialize 3 StudentRecords via user input</li>
</ul>

<h6>Part 2: Average Calculation</h6>
<ul>
    <li>Develop function to calculate and set AverageMark for each student</li>
</ul>

<h6>Part 3: Report Generation</h6>
<ul>
    <li>Create function to print formatted report cards showing:
        <ul>
            <li>Student ID, First/Last Name</li>
            <li>All courses with marks</li>
            <li>Calculated average</li>
        </ul>
    </li>
</ul>

<h6>General Requirements:</h6>
<ul>
    <li>Organize code in src/ and inc/ folders</li>
    <li>studentRecord.c for operations</li>
    <li>studentRecord.h for prototypes</li>
    <li>Clear comments and consistent formatting</li>
</ul>

<h5>SAMPLE OUTPUTS</h5>
<div class="row">
    <div class="col-lg-8 image-container">
        <p class="mb-0 pb-0">Student data entry:</p>
        <img src="img/A3-1.png" alt="Student Data Entry" class="lab-image" style="max-width: 800px;">
        
        <p class="mb-0 pb-0">Generated report cards:</p>
        <img src="img/A3-2.png" alt="Report Cards" class="lab-image" style="max-width: 800px;">
    </div>
</div>
<?php include_once("components/assign-body-below.php"); mt_srand(); ?>
