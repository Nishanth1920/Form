<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

// echo "<pre>";
// print_r($_SERVER);
// exit;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo "<pre>";
    // print_r($_POST);
    // exit;
    // $valid=true;
    if (empty($_POST["name"])) {
        // $valid=false;
        $nameErr = "Name is required";

        // echo "<pre>";
        // print_r($_POST["name"]);
        // exit;
    } else {
        // $valid=true;
        $name = test_input($_POST["name"]);
        // $name = htmlspecialchars($_POST["name"]);

        // echo "<pre>";
        // print_r($_POST["name"]);
        // exit;
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            // $valid=false;
            $nameErr = "Only letters and white space allowed";
            // echo "<pre>";
            // print_r($_POST["name"]);
            // exit;
        }
    }

    if (empty($_POST["email"])) {
        // $valid=false;
        $emailErr = "Email is required";
    } else {
        // $valid=true;
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        // $valid=false;
        $websiteErr = "website is required";
    } else {
        // $valid=true;
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
            // $valid=false;
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
    //     $valid=false;
        // $comment = "enter a comment";
    } else {
    //     $valid=true;
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        // $valid=false;
        $genderErr = "Gender is required";
    } else {
        // $valid=true;
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//  if($nameErr || $emailErr || $websiteErr || $genderErr){
//  header('Location: index.php?error&value=&emailErr='.$emailErr.'& nameErr='.$nameErr.'&websiteErr='.$websiteErr.'&genderErr='.$genderErr.'&name='.$name.'&email='.$email.'&website='.$website.'&gender='.$gender.'&comment='.$comment);
//  }
if($nameErr || $emailErr || $websiteErr || $genderErr){
$str = $nameErr.'&emailErr='.$emailErr.'&websiteErr='.$websiteErr.'&genderErr='.$genderErr.'&name='.$name.'&email='.$email.'&website='.$website.'&gender='.$gender.'&comment='.$comment;
$encode =base64_encode($str);
      header('Location: index.php?error= '.$encode) ;
}

 else{
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
}


?>