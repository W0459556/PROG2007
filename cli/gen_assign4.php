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

$imageFiles = ['A4-2.png', 'A4-3.png', 'A4-4.png'];
$invertedImages = [];
foreach ($imageFiles as $file) {
    $source = "/home/breanna/public_html/html/prog2007/img/$file";
    $dest = "/home/breanna/public_html/html/prog2007/img/inverted_$file";
    
    if (!file_exists($dest)) {
        createInvertedImage($source, $dest);
    }
    $invertedImages[$file] = "inverted_$file";
}

function applyShift($char, $shift) {
    $code = ord($char);
    $ranges = [
        ['start' => 48, 'end' => 57],   // 0-9
        ['start' => 65, 'end' => 90],   // A-Z
        ['start' => 33, 'end' => 47],   // !-/
        ['start' => 58, 'end' => 64]    // :-@
    ];
    
    foreach ($ranges as $range) {
        if ($code >= $range['start'] && $code <= $range['end']) {
            $rangeSize = $range['end'] - $range['start'] + 1;
            $shiftedCode = $code + $shift;
            while ($shiftedCode > $range['end']) $shiftedCode -= $rangeSize;
            while ($shiftedCode < $range['start']) $shiftedCode += $rangeSize;
            return chr($shiftedCode);
        }
    }
    return $char;
}

function generateAssignmentPDF($student_id, $student_name) {
    global $invertedImages;

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, 'mm', PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetAuthor('NSCC PROG2007');
    $pdf->SetTitle('PROG2007 - Assignment 4');
    $pdf->SetSubject('Bit Operations and Encryption');
    $pdf->SetKeywords('NSCC, PROG2007, C Programming, Encryption');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(true);
    $pdf->setFooterData(array(0,64,0), array(0,64,128));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->AddPage();

    $content = generateAssignmentContent($student_id, $student_name, $invertedImages);
    $pdf->writeHTML($content, true, false, true, false, '');
    $totalPages = $pdf->getNumPages();
    if($totalPages%2 != 0){
        $pdf->AddPage();
    }
    $pdf->Output("/home/breanna/public_html/html/prog2007/cli/output/$student_id.pdf", 'F');
}

function generateAssignmentContent($student_id, $student_name, $invertedImages) {
    $cipherTable = generateCipherTable();
    
    return <<<HTML
<table style="width: 99%; align: center">
<tr><td colspan="2" align="left"><h2>PROG2007 - Programming II</h2></td>
<td colspan="2" align="right"><h2>Assignment 4</h2></td></tr>
<tr><th align="left" style="width: 10%">Name:</th><td align="left" style="width: 64%">$student_name</td>
<th align="right" style="width: 12%">ID:</th><td align="right" style="width: 13%">$student_id</td></tr>
</table>
<hr style="width: 99%; align: left; border: 1px black solid;">
<h3>Operating with Bits, the PreProcessor and Enumerated Types</h3>
<p>Write a C program that implements a magic decoder ring using bit operations and encryption.</p>

<h4>TASK REQUIREMENTS:</h4>
<ul>
    <li>Build a program that can encrypt and decrypt text using bit masks and XOR operations</li>
    <li>Implement a substitution cipher with the following table:
    <br />$cipherTable<br />
        <ul>
            <li>Convert all input to uppercase before processing</li>
        </ul>
    </li>
    <li>Use enumerated types for encrypt/decrypt modes</li>
    <li>Implement with proper file organization (separate .h and .c files)</li>
</ul>

<h4>SAMPLE OUTPUTS</h4>
<p><strong>NOTE: Your cipher shift is randomized - your output will differ from these examples</strong></p>

<p><strong>Encrypting a message:</strong></p>
<img src="../img/{$invertedImages['A4-2.png']}" width="585">

<p><strong>Decrypting a message:</strong></p>
<img src="../img/{$invertedImages['A4-3.png']}" width="585">

<p><strong>Bad input example:</strong></p>
<img src="../img/{$invertedImages['A4-4.png']}" width="585">

<h4>Submission Instructions</h4>
<p>Submit via video recording demonstrating your working program as outlined in Brightspace.</p>
HTML;
}

function generateCipherTable() {
    $shift = rand(-15, 15);
    $chars = [
        ['A','B','C','D','E','F','G','H','I','J'],
        ['K','L','M','N','O','P','Q','R','S','T'],
        ['U','V','W','X','Y','Z','!','@','#','$'],
        ['%','&','(',')',':',';','?','.','/',' '],
        ['0','1','2','3','4','5','6','7','8','9']
    ];

    $table = '<table border="1" cellpadding="4" style="margin: 0 auto;">';
    foreach ($chars as $row) {
        $table .= '<tr><td><strong>Start</strong></td>';
        foreach ($row as $char) $table .= '<td>'.htmlspecialchars($char).'</td>';
        $table .= '</tr><tr><td><strong>Sub</strong></td>';
        foreach ($row as $char) $table .= '<td>'.htmlspecialchars(applyShift($char, $shift)).'</td>';
        $table .= '</tr>';
    }
    $table .= '</table>';
    return $table;
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