<?php
require("/home/breanna/public_html/config.php");
require_once('/home/breanna/public_html/html/tcpdf/tcpdf.php');

putenv('GDFONTPATH=' . realpath('/var/www/html'));

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

function generateAssignmentPDF($student_id, $student_name, &$mergedPdf = null) {
    global $db;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetAuthor('NSCC PROG2007');
    $pdf->SetTitle('PROG2007 - Assignment 3');
    $pdf->SetSubject('Student Report Cards');
    $pdf->SetKeywords('NSCC, PROG2007, C Programming, Structs');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(true);
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->AddPage();

    $randRecords = rand(3, 6);
    $randStudents = rand(2,4);
    $courseNames = $db->query("SELECT name FROM nscc_courses ORDER BY RAND() LIMIT $randRecords")->fetchAll(PDO::FETCH_COLUMN);
    
    $student = new stdClass();
    $student->studentID = mt_rand(1000000, 9999999);
    $parts = explode(' ', $student_name);
    $student->firstName = $parts[0] ?? 'Unknown';
    $student->lastName = $parts[1] ?? 'Unknown';
    
    $student->records = [];
    for ($j = 0; $j < $randRecords; $j++) {
        $record = new stdClass();
        $record->courseName = $courseNames[$j] ?? 'Unknown Course';
        $record->courseMark = mt_rand(50, 100);
        $student->records[] = $record;
    }

    $studentEntryExample = generateStudentEntryExample([$student]);
    $reportCards = generateReportCards([$student]);

    $content = <<<HTML
<table style="width: 99%; align: center">
<tr><td colspan="2" align="left"><h2>PROG2007 - Programming II</h2></td>
<td colspan="2" align="right"><h2>Assignment 3</h2></td></tr>
<tr><th align="left" style="width: 10%">Name:</th><td align="left" style="width: 64%">$student_name</td>
<th align="right" style="width: 12%">ID:</th><td align="right" style="width: 13%">$student_id</td></tr>
</table>
<hr style="width: 99%; align: left; border: 1px black solid;">
<h3>Structs, Strings and Pointers</h3>
<p>Create a student report card application using structs, pointers, and proper file organization.</p>

<h4>TASK REQUIREMENTS:</h4>

<h5>Part 1: Student Record Creation</h5>
<ul>
    <li>Define StudentRecord struct with:
        <ul>
            <li>StudentID (int)</li>
            <li>LastName (char[21])</li>
            <li>FirstName (char[21])</li>
            <li>Array of $randRecords CourseRecords (struct with CourseName char[21] and Mark float)</li>
            <li>AverageMark (float)</li>
        </ul>
    </li>
    <li>Create function to initialize student records for $randStudents students via user input</li>
</ul>

<h5>Part 2: Average Calculation</h5>
<ul>
    <li>Develop function to calculate and set AverageMark for each student</li>
</ul>

<h5>Part 3: Report Generation</h5>
<ul>
    <li>Create function to print formatted report cards showing:
        <ul>
            <li>Student ID, First/Last Name</li>
            <li>All courses with marks</li>
            <li>Calculated average</li>
        </ul>
    </li>
</ul>

<h5>General Requirements:</h5>
<ul>
    <li>Organize code in src/ and inc/ folders</li>
    <li>studentRecord.c for operations</li>
    <li>studentRecord.h for prototypes</li>
    <li>Clear comments and consistent formatting</li>
</ul>

<h4>SAMPLE OUTPUTS</h4>
<p><strong>Student input for 1 student:</strong></p>
<pre style="font-family: courier; font-size: 10pt; background-color: #ffffff; color: #000000; border: 1px solid #cccccc; padding: 10px;">
C:\PROG2007\ASSIGN3\cmake-build-debug\ASSIGN3.exe
{$studentEntryExample}Process finished with exit code 0
</pre>

<p><strong>Report card for 1 student:</strong></p>
<pre style="font-family: courier; font-size: 10pt; background-color: #ffffff; color: #000000; border: 1px solid #cccccc; padding: 10px;">
C:\PROG2007\ASSIGN3\cmake-build-debug\ASSIGN3.exe
{$reportCards}Process finished with exit code 0
</pre>
<p><strong>REMEMER: your assignment should accept inputs & output report cards for $randStudents students.</strong></p>
HTML;

    $pdf->writeHTML($content, true, false, true, false, '');
    if($pdf->getNumPages() % 2 != 0){
        $pdf->AddPage();
    }
    $individualPath = "/home/breanna/public_html/html/prog2007/cli/output/$student_id.pdf";
    $pdf->Output($individualPath, 'F');
    
    if($mergedPdf !== null){
        $currentPages = $mergedPdf->getNumPages();
        
       
        if($currentPages == 0) {
            $mergedPdf->AddPage();
            $mergedPdf->writeHTML('<h2>Student: '.$student_name.' (ID: '.$student_id.')</h2>', true, false, true, false, '');
            $mergedPdf->writeHTML($content, true, false, true, false, '');
        } 
        else {
            if($currentPages % 2 == 1) {
                $mergedPdf->AddPage();
                
            }
            
            $mergedPdf->writeHTML('<h2 style="page-break-before: always;">Student: '.$student_name.' (ID: '.$student_id.')</h2>', true, false, true, false, '');
            $mergedPdf->writeHTML($content, true, false, true, false, '');
        }
        
       
        if($mergedPdf->getNumPages() % 2 == 1){
            $mergedPdf->AddPage();
        }
    }
    
    return $individualPath;
}

try {
    $db = connect_db();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $mergedPdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $mergedPdf->SetAuthor('NSCC PROG2007');
    $mergedPdf->SetTitle('PROG2007 - All Assignments 3');
    $mergedPdf->setPrintHeader(false);
    $mergedPdf->setPrintFooter(true);
    $mergedPdf->setFooterData(array(0,64,0), array(0,64,128));
    $mergedPdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $mergedPdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
    $counter = 0;
    $fetch_students = $db->query("SELECT * FROM student WHERE course='prog2007'");
    
    while($row = $fetch_students->fetch(PDO::FETCH_ASSOC)) {
        $student_id = $row['id'];
        $student_name = $row['name'];
        
        echo "Generating PDF for " . $student_id . " " . $student_name ."\n";
        generateAssignmentPDF($student_id, $student_name, $mergedPdf);
        $counter++;
    }
    
    if($counter > 0){
        $mergedPath = "/home/breanna/public_html/html/prog2007/cli/output/ASSIGN3.pdf";
        $mergedPdf->Output($mergedPath, 'F');
        echo "Created merged PDF: ASSIGN3.pdf\n";
    }
    
    echo "Finished output of " . $counter . " assignments.\n";

} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>