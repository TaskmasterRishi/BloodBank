<?php

require "dompdf/vendor/autoload.php";
use Dompdf\Dompdf;
use Dompdf\Options;

$id=1;
$donorid=12345;
$name="shlok";
$weight="73";
$height=170;
$email="shlok@gmail.com";
$contact="23894029834";
$gender="male";
$dob="6 july 2004";
$bloodgroup="O+";
$address="dummy address";
$campname="camp name";
$campaddress="werfrwfwrf";
$state="gujarat";
$district="vadodara";
$date="2024-08-08";
$time1="8:00";
$time2="8:00";
$campcontact=1234567890;
$hospitalname="hospital";
$hospitalemail="hospital1@gmail.com";
$path="profilePhotos/$id.jpg";

$variables=array("{{ donorid }}", "{{ name }}","{{ weight }}","{{ height }}","{{ email }}","{{ contact }}","{{ gender }}",
"{{ dob }}","{{ bloodgroup }}","{{ address }}","{{ campname }}","{{ campaddress }}","{{ state }}","{{ district }}","{{ date }}","{{ time1 }}","{{ time2 }}",
"{{ campcontact }}", "{{ hospitalname }}", "{{ hospitalemail }}","{{ path }}");

$values=array($donorid,$name,$weight,$height,$email,$contact,$gender,$dob,$bloodgroup,$address,$campname,
$campaddress,$state,$district,$date,$time1,$time2,$campcontact,$hospitalname,$hospitalemail,$path);




$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$pdf=new Dompdf($options);

$pdf->setPaper("A4");

$html = file_get_contents("template.html");
$html = str_replace($variables,$values, $html);



$pdf->loadHtml($html);



$pdf->render();
ob_end_clean();
$pdf->stream($id."",["Attachment" => 0]);
$pdf->addInfo("Title", "Admit Card");

// $output = $dompdf->output();
// file_put_contents("admitCards/$id.pdf", $output);