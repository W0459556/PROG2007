<?php

require("/home/breanna/public_html/config.php");
require_once('/home/breanna/public_html/html/tcpdf/tcpdf.php');

putenv('GDFONTPATH=' . realpath('/var/www/html'));

function generateAssignmentPDF($student_id, $student_name){
    global $db;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetAuthor('NSCC PROG2007');
    $pdf->SetTitle('PROG2007 - Assignment 1');
    $pdf->SetSubject('Multiplication Tables');
    $pdf->SetKeywords('NSCC, PROG2007, C Programming, Loops');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(true);
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->AddPage();
   
    $max = rand(8, 16);
    
    $forLoopTable = generateForLoopTable($max);
    $whileLoopTable = generateWhileLoopTable($max);

    $content = <<<HTML
<table style="width: 99%; align: center">
<tr><td colspan="2" align="left"><h2>PROG2007 - Programming II</h2></td>
<td colspan="2" align="right"><h2>Assignment 1</h2></td></tr>
<tr><th align="left" style="width: 10%">Name:</th><td align="left" style="width: 64%">$student_name</td>
<th align="right" style="width: 12%">ID:</th><td align="right" style="width: 13%">$student_id</td></tr>
</table>
<hr style="width: 99%; align: left; border: 1px black solid;">
<h3>Variables, Operations, and Loops</h3>
<p>Write a C program that generates multiplication tables using different loop structures.</p>

<h4>TASK REQUIREMENTS:</h4>
<ul>
    <li>Generate a printed N×N table for values N=1 to $max using for loops</li>
    <li>Table should have column headers showing each N value</li>
    <li>Create a reversed version($max at top/left) using while loops</li>
    <li>Include clear code comments and consistent formatting</li>
    <li>Preserve the included sample text files for testing</li>
</ul>

<h4>SAMPLE OUTPUT</h4>
<pre style="font-family: courier; font-size: 10pt; background-color: #ffffff; color: #000000; border: 1px solid #cccccc; padding: 10px;">
C:\PROG2007\ASSIGN1\cmake-build-debug\ASSIGN1.exe

TABLE OF PRODUCTS(FOR LOOP)
HTML;
   
    $content .= "\n" . htmlspecialchars($forLoopTable) . "\n\n";
    $content .= "REVERSED TABLE OF PRODUCTS(WHILE LOOP)\n";
    $content .= htmlspecialchars($whileLoopTable);
    $content .= "\n\nProcess finished with exit code 0</pre>";

    $content .= <<<HTML
<h4>Submission Instructions</h4>
<h5>Video Recording Submission:</h5>
<p>You will demonstrate the completion of this project via a <strong>video screen-capture recording</strong> of you using CLion, GitBash, and viewing your code to show completion of the <strong>Video Submission Checklist</strong>, which is posted on Brightspace. You will post <strong>either your video file or a link to it</strong>(e.g. a Microsoft Stream recording, make sure to give the instructor permissions to watch it), to the Brightspace Assignment 1 Dropbox prior to the deadline. If you are not sure of how best to capture such a video, seek advice from the instructor prior to the deadline.</p>
<p><strong>NOTE:</strong> MAKE SURE TO SHOW EVERYTHING IN THE VIDEO SUBMISSION CHECKLIST STEP-BY-STEP. YOU WILL NEED AUDIO IN THE VIDEO FOR AT LEAST THE CODE REVIEW PORTION OF THE CHECKLIST</p>
HTML;

    $pdf->writeHTML($content, true, false, true, false, '');
    $totalPages = $pdf->getNumPages();
    if($totalPages%2 != 0){
        $pdf->AddPage();
    }
    $pdf->Output("/home/breanna/public_html/html/prog2007/cli/output/$student_id.pdf", 'F');
}

function generateForLoopTable($max){
    $table = str_pad('N', 5);
    for($i = 1; $i <= $max; $i++){
        $table .= str_pad($i, 5);
    }
    $table .= "\n";
    for($i = 1; $i <= $max; $i++){
        $table .= str_pad($i, 5);
        for($j = 1; $j <= $max; $j++){
            $table .= str_pad($i * $j, 5);
        }
        $table .= "\n";
    }
    return $table;
}
function generateWhileLoopTable($max){
    $table = str_pad('N', 5);
    $i = $max;
    while($i >= 1){
        $table .= str_pad($i, 5);
        $i--;
    }
    $table .= "\n";
    $i = $max;
    while($i >= 1){
        $table .= str_pad($i, 5);
        $j = $max;
        while($j >= 1){
            $table .= str_pad($i * $j, 5);
            $j--;
        }
        $table .= "\n";
        $i--;
    }
    
    return $table;
}


try{
    $db = connect_db();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("Connection failed: " . $e->getMessage());
}


$fetch_students = $db->query("SELECT * FROM student WHERE course='prog2007'");

$counter = 0;
while($row = $fetch_students->fetch(PDO::FETCH_ASSOC)){
    $student_id = $row['id'];
    $student_name = $row['name'];
    
    echo "Generating PDF for " . $student_id . " " . $student_name ."\n";
    generateAssignmentPDF($student_id, $student_name);
    $counter++;
}

echo "Finished output of " . $counter . " assignments.\n";
?>