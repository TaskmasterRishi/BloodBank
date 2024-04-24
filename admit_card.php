<?php
require_once("php/connection.php");
session_start();
if (!isset($_SESSION["camp_id"])) {
    header("location: index.php?error=camp id not set");
    die();
}

require "dompdf/vendor/autoload.php";
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);

$campid = $_SESSION["camp_id"];
$id = $_SESSION["user_id"];
$email = $_SESSION["user_email"];

$select = "SELECT * FROM camp,donordetail,campdetail WHERE camp.donorid=$id AND camp.campid=$campid AND donordetail.id=$id AND  campdetail.id=$campid";

if ($result = mysqli_query($con, $select)) {
    if (mysqli_num_rows($result) == 1) {
        // Proceed
    } else {
        header("location: index.php?error=number of rows not equal to one");
        die();
    }
}

$select1 = "SELECT 
                donordetail.name as n,
                donordetail.weight as w,
                donordetail.height as h,
                donordetail.contact as c,
                donordetail.gender as g,
                donordetail.dob as d,
                donordetail.bloodGroup as bg,
                donordetail.state as ds,
                donordetail.district as dd,
                donordetail.city as dc,
                donordetail.landmark as dl,
                campdetail.name as cn,
                campdetail.address as ca,
                campdetail.state as cs,
                campdetail.district as cd,
                campdetail.date as date,
                campdetail.time1 as t1,
                campdetail.time2 as t2,
                campdetail.contact as cc,
                campdetail.organizedBy as cob
            FROM campdetail 
            INNER JOIN (donordetail 
                INNER JOIN camp ON donordetail.id = camp.donorid 
                    AND camp.donorid = $id 
                    AND camp.campid = $campid 
                    AND donordetail.id = $id) 
                ON camp.campid = campdetail.id 
            WHERE campdetail.id = $campid";

if ($result1 = mysqli_query($con, $select1)) {
    if (mysqli_num_rows($result1) == 1) {
        // Proceed
    } else {
        header("location: index.php?error=join query did not happen");
        die();
    }
} else {
    header("location: index.php?error=join query failed");
    die();
}

$row = mysqli_fetch_array($result1);
if (!$row) {
    header("location: index.php?error=join operation not performed");
    die();
}

$donorid = $id . $campid;
$name = $row["n"];
$weight = $row["w"];
$height = $row["h"];
$contact = $row["c"];
$gender = $row["g"];
$dob = $row["d"];
$bloodgroup = $row["bg"];
$address = $row["dl"] . ", " . $row["dc"] . ", " . $row["dd"] . ", " . $row["ds"];

$path = "";
if (file_exists("profilePhotos/$id.jpg")) {
    $path = "profilePhotos/$id.jpg";
} elseif (file_exists("profilePhotos/$id.jpeg")) {
    $path = "profilePhotos/$id.jpeg";
} elseif (file_exists("profilePhotos/$id.png")) {
    $path = "profilePhotos/$id.png";
} else {
    header("location: index.php?error=Set profile photo first");
    die();
}

$campname = $row["cn"];
$campaddress = $row["ca"];
$state = $row["cs"];
$district = $row["cd"];
$date = $row["date"];
$time1 = substr($row["t1"], 0, 5);
$time2 = substr($row["t2"], 0, 5);
$campcontact = $row["cc"];
$hospitalname = $row["cob"];

$query = "SELECT email FROM bloodcenterdetail WHERE `name` ='$hospitalname'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

$hospitalemail = $row["email"];
$iconpath = "Icon/Icon.png";

$values = array(
    $donorid, $name, $weight, $height, $email, $contact, $gender, $dob, $bloodgroup, $address, $campname,
    $campaddress, $state, $district, $date, $time1, $time2, $campcontact, $hospitalname, $hospitalemail, $path, $iconpath
);

$variables = array(
    "{{ donorid }}", "{{ name }}", "{{ weight }}", "{{ height }}", "{{ email }}", "{{ contact }}", "{{ gender }}",
    "{{ dob }}", "{{ bloodgroup }}", "{{ address }}", "{{ campname }}", "{{ campaddress }}", "{{ state }}", "{{ district }}", "{{ date }}", "{{ time1 }}", "{{ time2 }}",
    "{{ campcontact }}", "{{ hospitalname }}", "{{ hospitalemail }}", "{{ path }}", "{{ iconpath }}"
);

$pdf = new Dompdf($options);
$pdf->setPaper("A4");

$html = file_get_contents("template.html");
$html = str_replace($variables, $values, $html);
$pdf->loadHtml($html);
$pdf->render();
ob_end_clean();

if (!file_exists("admitCards/" . $id . $campid . ".pdf")) {
    $output = $pdf->output();
    if (file_put_contents('admitCards/' . $id . $campid . '.pdf', $output) !== false) {
        header("location: index.php?error=Admit card created");
    } else {
        header("location: index.php?error=Failed to save PDF");
    }
} else {
    $pdf->stream($id . "", ["Attachment" => 0]);
}
