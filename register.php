<?php
// All the code from tutorialPublic.com

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "من فضلك ادخل اسم المستخدم.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "اسم المستخدم هذا موجود مسبقًا.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "اوه! هناك مشكلة حدث. من فضلك جرب لاحقًا.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "كلمة المرور يجب ان تحتوي على الاقل على 6 خانات.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "من فضلك أكد كلمة المرور.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "كلمة المرور لا تتطابق.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "حدث خطاء. من فضلك جرب مرة اخرى لاحقًا.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" href ="mystyle.css">
    <!-- This meta will render the width of the page at the width of the user screen -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icon bar Library-->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap code FROM W3SCHOOLS -->
    <style>
        .affix {
           top: 0;
           width: 99%;
           padding-top: 60px;
           z-index: 9999 !important; }

       .affix + .home{
           padding-top: 70px; }
   </style>

</head>
<body>

       <div class="wrapper">
               <h2>تسجيل حساب جديد</h2>
               <p>ادخل البيانات التالية لتسجيل حساب جديد</p>
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                   <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                       <label>اسم المستخدم</label>
                       <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                       <span class="help-block"><?php echo $username_err; ?></span>
                   </div>
                   <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                       <label>كلمة المرور</label>
                       <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                       <span class="help-block"><?php echo $password_err; ?></span>
                   </div>
                   <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                       <label>تأكيد كلمة المرور</label>
                       <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                       <span class="help-block"><?php echo $confirm_password_err; ?></span>
                   </div>
                   <div class="form-group">
                       <input type="submit" class="btn btn-primary" value="سجل">
                       <input type="reset" class="btn btn-default" value="مسح">
                   </div>
                   <p>هل لديك حساب مسبقًا ؟ <a href="login.php">سجل الدخول من هنا</a>.</p>
               </form>
             </div>
