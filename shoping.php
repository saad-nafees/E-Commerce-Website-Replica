<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$firstname = $lastname = $address = $phone = $size = "";
$firstname_err = $lastname_err = $address_err = $phone_err = $size_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate firstname
    $input_firstname = trim($_POST["firstname"]);
    if(empty($input_firstname)){
        $firstname_err = "Please enter a name.";
    } elseif(!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $firstname_err = "Please enter a valid name.";
    } else{
        $firstname = $input_firstname;
    }

    // Validate lastname
    $input_lastname = trim($_POST["lastname"]);
    if(empty($input_lastname)){
        $lastname_err = "Please enter a name.";
    } elseif(!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lastname_err = "Please enter a valid name.";
    } else{
        $lastname = $input_lastname;
    }

    // Validate email
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an Address.";
    } else{
        $address = $input_address;
    }

    // Validate password
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter an Phone Number";
    } else{
        $phone = $input_phone;
    }

    $input_size = trim($_POST["size"]);
    if(empty($input_size)){
        $size_err = "Please enter an size";
    } else{
        $size = $input_size;
    }

    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($address_err) && empty($phone_err) && empty($size_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO shopcart (firstname, lastname, address, phone , size) VALUES (?, ?, ?, ?, ?)";
 
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_firstname, $param_lastname, $param_address, $param_phone, $param_size);

            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_address = $address;
            $param_phone = $phone;
            $param_size = $size;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: greenshirt.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Order</h2>
                    </div>
                    <p>Please fill this form and submit to add your Order Request to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                            <span class="help-block"><?php echo $firstname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control"><?php echo $lastname; ?></textarea>
                            <span class="help-block"><?php echo $lastname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <label>Phone No.</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                            <span class="help-block"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($size_err)) ? 'has-error' : ''; ?>">
                            <label>Size</label>
                            <input type="text" name="size" class="form-control" value="<?php echo $size_err; ?>">
                            <span class="help-block"><?php echo $size_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="greenshirt.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
