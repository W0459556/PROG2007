<?php $assignname = "Prog2007 - Assignment 3" ?>
<?php include_once("components/assign-body-above.php"); mt_srand(); ?>
<h4>Assignment 3 - Structs, Strings and Pointers</h4>
<p>
Create a student report card application using structs, pointers, and proper file organization.
</p>

<?php
$randRecords = rand(3, 6);
$randStudents = rand(2, 4);

require("/home/breanna/public_html/config.php");
mt_srand();
$db = connect_db();

$students = [];

$firstNames = $db->query("SELECT name FROM user_names ORDER BY RAND() LIMIT $randStudents")->fetchAll(PDO::FETCH_COLUMN);
$lastNames = $db->query("SELECT name FROM user_names ORDER BY RAND() LIMIT $randStudents")->fetchAll(PDO::FETCH_COLUMN);
$courseNames = $db->query("SELECT name FROM nscc_courses ORDER BY RAND() LIMIT $randRecords")->fetchAll(PDO::FETCH_COLUMN);

for ($i = 0; $i < $randStudents; $i++) {
    $student = new stdClass();
    $student->studentID = mt_rand(1000000, 9999999);
    $student->firstName = ucfirst(strtolower($firstNames[$i] ?? 'Unknown'));
    $student->lastName = ucfirst(strtolower($lastNames[$i] ?? 'Unknown'));
    
    $student->records = [];
    for ($j = 0; $j < $randRecords; $j++) {
        $record = new stdClass();
        $record->courseName = $courseNames[$j] ?? 'Unknown Course';
        $record->courseMark = mt_rand(50, 100);
        $student->records[] = $record;
    }
    
    $students[] = $student;
}

function generateStudentEntryExample($students) {
    $output = "";
    
    foreach ($students as $student) {
        $output .= "Please enter the Student ID:\n";
        $output .= $student->studentID . "\n";
        $output .= "Please enter the last name for Student #{$student->studentID}:\n";
        $output .= $student->lastName . "\n";
        $output .= "Please enter the first name for Student #{$student->studentID}:\n";
        $output .= $student->firstName . "\n";
        
        foreach ($student->records as $record) {
            $output .= "Please enter the course name:\n";
            $output .= $record->courseName . "\n";
            $output .= "Please enter the mark for {$record->courseName}:\n";
            $output .= $record->courseMark . "\n";
        }
        
        $output .= "\n";
    }
    
    return $output;
}

$studentEntryExample = generateStudentEntryExample($students);

function generateReportCards($students) {
    $output = str_repeat('*', 30) . 'REPORT CARDS' . str_repeat('*', 30) . "\n\n";
    
    foreach ($students as $student) {
       
        $total = 0;
        foreach ($student->records as $record) {
            $total += $record->courseMark;
        }
        $average = count($student->records) > 0 ? $total / count($student->records) : 0;
        
        $output .= "Student: ID:{$student->studentID}          Name: {$student->firstName} {$student->lastName}\n";
        $output .= str_repeat('-', 40) . "\n";
       
        foreach ($student->records as $record) {
            $output .= sprintf("Course name: %-20s Course mark: %d\n", 
                             $record->courseName, 
                             $record->courseMark);
        }
       
        $output .= "\nGrade average: " . number_format($average, 2) . "\n\n\n";
    }
    
    return $output;
}

$reportCards = generateReportCards($students);
?>

<h5>TASK REQUIREMENTS:</h5>

<h6>Part 1: Student Record Creation</h6>
<ul>
    <li>Define StudentRecord struct with:
        <ul>
            <li>StudentID (int)</li>
            <li>LastName (char[21])</li>
            <li>FirstName (char[21])</li>
            <li>Array of <?php echo($randRecords) ?> CourseRecords (struct with CourseName char[21] and Mark float)</li>
            <li>AverageMark (float)</li>
        </ul>
    </li>
    <li>Create function to initialize <?php echo($randStudents) ?> StudentRecords via user input</li>
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
<div class="col-lg-6">

<p class="mb-0 pb-0">Student input:</p>
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
C:\PROG2007\ASSIGN3\cmake-build-debug\ASSIGN3.exe
<?php echo($studentEntryExample) ?>
Process finished with exit code 0</code></pre>
</div>
<br />
<p class="mb-0 pb-0">Report cards:</p>
<div class="bg-dark p-3 text-light">
<pre><code class="text-light">
C:\PROG2007\ASSIGN3\cmake-build-debug\ASSIGN3.exe
<?php echo($reportCards) ?>
Process finished with exit code 0</code></pre>
</div>


</div>
</div>
<?php include_once("components/assign-body-below.php"); mt_srand(); ?>
