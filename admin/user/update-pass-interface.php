<?php
	/*
	* This page change password.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';

	if(isset($_REQUEST['uid']) && isset($_REQUEST['mno'])){
		$user_id = $_REQUEST['uid'];
		$mobile = $_REQUEST['mno'];
	}
	else
		echo "<script>alert('Invalid');
			window.location.href='user-details.php';</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
	<meta name="theme-color" content="green" />
	<title>Go Mart</title>
	<meta property="og:title" content="Go Mart">
	<meta name="description" content="Go Mart is collection of fresh vegetables and grocery products.">
	<meta property="og:description" content="Go Mart is collection of fresh vegetables and grocery products.">
	<meta name="keywords" content="go mart, vegetable shop in village, grocery shop in village">
	<meta name="author" content="Manish Patel, Nitish Prasad">
    <link rel="shortcut icon" href="../../sys_images/logo.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--using FontAwesome--------------->
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: poppins;
            margin: 0px;
            padding: 0px;
            font-family: poppins;
            background-color: #ffffff;
        }

        input[type=text] {
            width: 100%;
            padding: 7px 20px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 12px;
            margin-left: 5px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: 13px;
            font-size: 12px;
        }

        .para {
            font-size: 12px;
        }

        * {
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: black;
        }

        a:hover {
            text-decoration: none;
            color: black;
        }

        nav {
            width: 100%;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.05);
            z-index: 100;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
        }

        h1 {
            font-size: 18px;
            margin-left: 10px;
        }

        .logo {
            width: 200px;
            margin-left: 10px;
        }

        .logo img {
            height: 40px;
            width: 40px;
        }

        .right-menu a {
            margin: 0px 10px;
            font-size: 1.2rem;
            color: rgba(0, 0, 0, 0.7);
        }

        .right-menu a:hover {
            color: #0b9d8a;
            transition: all ease 0.3s;
        }

        .useid {
            text-align: center;
            font-size: 13px;
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .fix-nav {
            width: 100%;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            left: 0px;
            background-color: #ffffff;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.05);
            z-index: 102;
        }

        .lable-title {
            font-size: 13px;
        }

        @media(max-width:1000px) {
            nav {
                position: relative;
            }

            .navigation {
                height: 50px;
            }

            .fix-nav {
                height: 50px;
            }

            .menu {
                position: absolute;
                top: 110px;
                left: 0px;
                background-color: #ffffff;
                border-bottom: 4px solid #0b9d8a;
                width: 100%;
                padding: 0px;
                margin: 0px;
                z-index: 102;
                flex-direction: column;
                display: none;
            }

            .fix-nav .menu {
                top: 50px;
            }

            .navigation.active .menu {
                display: block;
            }
        }

        @media(max-width:700px) {
            h1 {
                font-size: 16px;
                margin-left: 10px;
            }
        }
    </style>
</head>

<body>
    <!--menu-bar----------------------------------------->
    <header class="navigation fix-nav">
        <!--logo------------>
        <div class="logo-img">
            <div class="d-inline-block">
                <a href="#" class="logo"><img src="../../sys_images/logo.png" alt="logo"></a>
            </div>
            <div class="d-inline-block">
                <h1>Change Password </h1>
            </div>
        </div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="../login/logout.php" class="fa fa-sign-out">
                <span aria-hidden="true">Log Out</span>
            </a>
        </div>
    </header>
    
    <div class="container">
        <form action="" id="setupform" method="POST" onsubmit="return post();" autocomplete="on">
            <div class="address-body p-3 ">
                <div class="form-group useid">
                    <label for="userid">Changing Password for User Id : <b class="h6"><?php echo $user_id;?></b></label>
					<input type="hidden" class="form-control" id="user_id" placeholder="" name="user_id" value="<?php echo $user_id;?>" required>
                </div>
                <div class="form-group">
                    <label for="uname" class="lable-title">New Password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter new password" name="password" value="" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
				<div class="form-group">
                    <label for="uname" class="lable-title">Retype New Password</label>
                    <input type="text" class="form-control" id="repeat_password" placeholder="Retype new password" name="repeat_password" value="" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="para form-group ">
                    <p> Keep remember this password to send the user by message to his mobile number. </p>
                </div>
				<div class="para form-group ">
                    <p> User's Mobile No : <b><?php echo $mobile;?></b></p>
                </div>
                <br />
                <button type="submit" name="submit" class="btn btn-success">Update</button>
            </div>
        </form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script type="text/javascript">
	function post() {
		var user_id = document.getElementById("user_id").value;
		var password = document.getElementById("password").value;
		var repeat_password = document.getElementById("repeat_password").value;
		if(password == repeat_password){
			if (password != "" && repeat_password != "") {
				$.ajax({
				  url: "update-pass.php",
				  method: "post",
				  data: {
					user_id : user_id,
					password : password,
					repeat_password : repeat_password,
				  },
				  success: function (response) {
					alert(response);
				  },
				});
			} else {
				alert("Empty Field Not Allowed");
			}
		}
		else {
			alert("Password Not Matched");
		}
		return false;
	}
	</script> 
	
</body>

</html>