<!DOCTYPE HTML>
<html>

<head>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  // define variables and set to empty values
  $nameErr = $emailErr = $genderErr = $websiteErr = "";
  $name = $email = $gender = $comment = $website = "";
  // Check if there is an error parameter in the URL
  // include('nichu.php');
  if (isset($_GET['error'])) {
    $error = base64_decode($_GET['error']);
    $decode = explode('&', $error);
    // print_r($err);
    // exit;
    $nameErr = $decode[0];
    $emailErr = str_replace('emailErr=', '', $decode[1]);
    $websiteErr = str_replace('websiteErr=', '', $decode[2]);
    $genderErr = str_replace('genderErr=', '', $decode[3]);
    $name = str_replace('name=', '', $decode[4]);
    $email = str_replace('email=', '', $decode[5]);
    $website = str_replace('website=', '', $decode[6]);
    $gender = str_replace('gender=', '', $decode[7]);
    $comment = str_replace('comment=', '', $decode[8]);
  }
  //     $nameErr= $_GET["nameErr"];
  //     $emailErr = $_GET["emailErr"];
  //     $websiteErr = $_GET["websiteErr"];
  //     $genderErr = $_GET["genderErr"];
  // }+
  // if (isset($_GET["value"])) {
  //   $name = $_GET["name"];
  //   $email = $_GET["email"];
  //   $gender = $_GET["gender"];
  //   $website = $_GET["website"];
  //   $comment = $_GET["comment"];
  // }

  ?>

  <center>
    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="nichu.php">
      Name: <input type="text" name="name" value="<?php echo $name ?>">
      <span class="error">* <?php echo $nameErr; ?></span>
      <br><br>
      E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
      <span class="error">* <?php echo $emailErr; ?></span>
      <br><br>
      Website: <input type="text" name="website" value="<?php echo $website; ?>">
      <span class="error"><?php echo $websiteErr; ?></span>
      <br><br>
      Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
      <br><br>
      Gender:
      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
      <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
      <span class="error">* <?php echo $genderErr; ?></span>
      <br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </center>





</body>

</html>