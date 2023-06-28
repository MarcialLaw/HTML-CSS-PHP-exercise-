<?php
    require_once('process.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style type="text/css">
        *{
            padding: 0;
            margin: 0;
        }
        body {
             background-color: lightblue;
        }
        .container{
            position: relative;
            align: center;

        }
        .container .row{
            position: fixed;
	        left: 50%;
	        top: 0;
	        width: 15vw;
	        height: 100vh;
	        background: #808080;
        }
        .container .row .{

        }
    </style>

</head>
<body>
    <div>
        <?php
            if(isset($_POST['create'])){
                
                $firstname      = $_POST['firstname'];
                $lastname       = $_POST['lastname'];
                $middlename       = $_POST['middlename'];
                $age       = $_POST['age'];
                $email          = $_POST['email'];
                $number    = $_POST['number'];

                $sql = "INSERT INTO chavez (firstname, lastname, middlename, age, email, number) VALUES(?,?,?,?,?,?)";
                $stmtinsert = $db->prepare($sql);
                $result = $stmtinsert->execute([$firstname, $lastname, $middlename, $age, $email, $number]);
                if($result){
                    echo '<h3>Successfully Save!</h3>';
                } else{
                    echo 'There were error occured while saving the data!';
                }
                
            }

        ?>
    </div>
    <div>
        <form action="regform.php" method="post" action="process.php">

        <div class="cointainer">

            <div class="row">
                <div class="col-sm-3">
                    <h1>Registration Form!!</h1>
                    <p>Please Fill out this form</p>
                    <hr class="mb-3">
                    <label for="firstname"><b>First Name</b></label>
                    <input class="form-control" type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input class="form-control" type="text" name="lastname" required>

                    <label for="lastname"><b>Middle Name</b></label>
                    <input class="form-control" type="text" name="middlename" required>

                    <label for="lastname"><b>Age</b></label>
                    <input class="form-control" type="text" name="age" required>

                    <label for="email"><b>Email Address</b></label>
                    <input class="form-control" type="email" name="email" required>

                    <label for="phonenumber "><b>Phone Number</b></label>
                    <input class="form-control" type="text" name="number" required>
                    <hr class="mb-3">

                    <input class="btn btn-primary" type="submit" name="create" value="Sign Up">
                </div>
            </div>
        </div>
    </div>

</body>
</html>