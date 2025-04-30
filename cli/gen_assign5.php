<?php
require("/home/breanna/public_html/config.php");
require_once('/home/breanna/public_html/html/tcpdf/tcpdf.php');

putenv('GDFONTPATH=' . realpath('/var/www/html'));

function createInvertedImage($sourcePath, $destPath) {
    if (!file_exists($sourcePath)) return false;
    
    $ext = strtolower(pathinfo($sourcePath, PATHINFO_EXTENSION));
    switch ($ext) {
        case 'png':
            $image = imagecreatefrompng($sourcePath);
            break;
        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($sourcePath);
            break;
        default:
            return false;
    }
    
    if ($image === false) return false;
    
    imagefilter($image, IMG_FILTER_NEGATE);
    
    switch ($ext) {
        case 'png':
            imagepng($image, $destPath);
            break;
        case 'jpg':
        case 'jpeg':
            imagejpeg($image, $destPath);
            break;
    }
    
    imagedestroy($image);
    return true;
}

// List of all image files to be inverted
$imageFiles = [
    'A5-4.png', 'A5-5.png',
    'A5-6.png', 'A5-7.png', 'A5-8.png', 'A5-9.png', 'A5-10.png',
    'A5-11.png', 'A5-12.png', 'A5-13.png'
];

$invertedImages = [];
foreach ($imageFiles as $file) {
    $source = "/home/breanna/public_html/html/prog2007/img/$file";
    $dest = "/home/breanna/public_html/html/prog2007/img/inverted_$file";
    
    if (!file_exists($dest)) {
        createInvertedImage($source, $dest);
    }
    $invertedImages[$file] = "inverted_$file";
}

function generateAssignmentPDF($student_id, $student_name) {
    global $invertedImages;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetAuthor('NSCC PROG2007');
    $pdf->SetTitle('PROG2007 - Assignment 5');
    $pdf->SetSubject('File I/O and Dynamic Memory');
    $pdf->SetKeywords('NSCC, PROG2007, C Programming, Wordle');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(true);
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->AddPage();

    $content = generateAssignmentContent($student_id, $student_name, $invertedImages);
    $pdf->writeHTML($content, true, false, true, false, '');
    $pdf->Output("/home/breanna/public_html/html/prog2007/cli/output/$student_id.pdf", 'F');
}

function generateAssignmentContent($student_id, $student_name, $invertedImages) {
    $startCharArr = ["spaces (\" \")", "underscores (\"_\")", "asterisks (\"*\")", "hyphens (\"-\")", "periods (\".\")", "tildes (\"~\")"];
    $startChar = $startCharArr[rand(0,5)];
    
    return <<<HTML
<table style="width: 99%; align: center">
<tr><td colspan="2" align="left"><h2>PROG2007 - Programming II</h2></td>
<td colspan="2" align="right"><h2>Assignment 5</h2></td></tr>
<tr><th align="left" style="width: 10%">Name:</th><td align="left" style="width: 64%">$student_name</td>
<th align="right" style="width: 12%">ID:</th><td align="right" style="width: 13%">$student_id</td></tr>
</table>
<hr style="width: 99%; align: left; border: 1px black solid;">
<h3>Input/Output, Files, Command Line Arguments and Dynamic Memory</h3>
<p>Write a C program that implements a Wordle-like game using file I/O and dynamic memory allocation.</p>

<h4>IMPORTANT NOTES</h4>
<h5>Note 1:</h5>
<p>Four sample input files have been provided in the GitHub repository. Copy these into your build folder for testing.</p>

<h5>Note 2:</h5>
<p>To get ANSI colors showing in CLion:</p>
<ol>
    <li>Choose Help -> Edit Custom Properties</li>
    <li>Add: <code>run.processes.with.pty=false</code></li>
    <li>Restart CLion.</li>
</ol>

<h4>TASK REQUIREMENTS:</h4>
<ul>
    <li>Build a Wordle-like game that reads settings from input files</li>
    <li>Use ANSI colors to highlight correct letters (green) and misplaced letters (yellow)</li>
    <li>Dynamically allocate a 2D array based on word size and guess limit from input file</li>
    <li>Initialize the array with $startChar</li>
    <li>Write game results to an output file specified via command line arguments</li>
    <li>Implement proper error handling for command line arguments and file operations</li>
</ul>

<h4>GAME PLAY</h4>
<ol>
    <li>Display initial game board showing word length and guess limit</li>
    <li>Prompt for and validate guesses (correct length, letters only)</li>
    <li>Update board with color-coded results</li>
    <li>Repeat until correct guess or maximum attempts reached</li>
    <li>Write final results to output file</li>
</ol>

HTML . ($startChar != "underscores (\"_\")" ? 
"<p><strong>NOTE:</strong> These examples use underscores as the starting character, your program should use $startChar as a starting character.</p>" : "") . <<<HTML
<p><strong>Input File Example:</strong></p>
<table><tr><td>
    <img src="../img/A5-1.png" width="200">
</td></tr></table>

<p><strong>Output File Examples:</strong></p>
<table><tr>
    <td><img src="../img/A5-2.png" width="200"></td>
    <td><img src="../img/A5-3.png" width="200"></td>
</tr></table>

<p><strong>Command Line Argument Errors:</strong></p>
<table><tr>
    <td><img src="../img/{$invertedImages['A5-4.png']}" width="200"></td>
    <td><img src="../img/{$invertedImages['A5-5.png']}" width="200"></td>
</tr></table>
<table><tr><td>
    <img src="../img/{$invertedImages['A5-6.png']}" width="200">
</td></tr></table>

<p><strong>File Errors:</strong></p>
<table><tr>
    <td><img src="../img/{$invertedImages['A5-7.png']}" width="200"></td>
    <td><img src="../img/{$invertedImages['A5-8.png']}" width="200"></td>
</tr></table>

<p><strong>Game Play Examples:</strong></p>
<table><tr>
    <td><img src="../img/{$invertedImages['A5-9.png']}" width="200"></td>
    <td><img src="../img/{$invertedImages['A5-10.png']}" width="200"></td>
</tr></table>
<table><tr><td>
    <img src="../img/{$invertedImages['A5-11.png']}" width="200">
</td></tr></table>

<p><strong>Input Validation:</strong></p>
<table><tr><td>
    <img src="../img/{$invertedImages['A5-12.png']}" width="200">
</td></tr></table>

<p><strong>Longer Word Example:</strong></p>
<table><tr><td>
    <img src="../img/{$invertedImages['A5-13.png']}" width="200">
</td></tr></table>

<h4>SUBMISSION INSTRUCTIONS</h4>
<p>Submit via video recording demonstrating your working program as outlined in Brightspace.</p>
HTML;
}

try {
    $db = connect_db();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $fetch_students = $db->query("SELECT * FROM student WHERE course='prog2007'");
    $counter = 0;
    
    while ($row = $fetch_students->fetch(PDO::FETCH_ASSOC)) {
        generateAssignmentPDF($row['id'], $row['name']);
        $counter++;
    }
    
    echo "Generated $counter assignment PDFs\n";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>