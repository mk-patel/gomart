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
    <link rel="shortcut icon" href="../sys_images/logo.png" />
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

        input[type=text],
        [type=date],
        [type=tel] {
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
            font-size: 13px;
        }

        .para {
            font-size: 15px;
            text-align: center;
        }

        .parafooter {
            font-size: 12px;
            text-align: center;
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

        button {
            /* background-color: #4CAF50; */
            /* color: white; */
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            size: 13px;
        }

        button:hover {
            opacity: 0.8;
        }

        .requestbtn {
            width: auto;
            background-color: darkorange;
            color: white;
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

        @media screen and (max-width: 300px) {
            .signupbtn {
                width: 100%;
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
                <a href="#" class="logo"><img src="../sys_images/logo.png" alt="logo"></a>
            </div>
            <div class="d-inline-block">
                <h1>Request New Password</h1>
            </div>
        </div>
    </header>
    <div class="container">
        <form action="" id="setupform" method="POST" autocomplete="on" onsubmit="return post();">
            <div class="address-body p-3 ">
                <div class="para form-group ">
                    <p> Forget password? <br> Reques for new password. </p>
                </div>
                <div class="form-group">
                    <label for="uname" class="lable-title">Mobile Number</label>
                    <input type="tel" class="form-control" id="pass_mobile" placeholder="Enter your mobile number" name="pass_mobile" maxlength="10" value="" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname" class="lable-title">Name</label>
                    <input type="text" class="form-control" id="pass_name" placeholder="Enter your name" name="name" value=""
                        required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="parafooter form-group ">
                    <p> We will send your new password to given mobile number within 6 (six) hours. </p>
                </div>
                <br />
				<div class="form-group">
					<p id="notify" class="p-2 text-warning h6 mt-2"></p>
				</div>
                <button type="submit" name="submit" id="submit" class="btn btn-warning requestbtn">Request New Password</button>
            </div>
        </form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script type="text/javascript">
	function post() {
		document.getElementById("notify").innerHTML="Please Wait";
		document.getElementById("submit").disabled=true
		  var pass_mobile = document.getElementById("pass_mobile").value;
		  var pass_name = document.getElementById("pass_name").value;
		  if (pass_mobile != "" && pass_name != "") {
			$.ajax({
			  url: "pass-request-insert.php",
			  method: "post",
			  data: {
				pass_mobile : pass_mobile,
				pass_name : pass_name,
			  },
			  success: function (response) {
				document.getElementById("notify").innerHTML=response;
			  },
			});
		  } else {
			document.getElementById("notify").innerHTML="Empty Field Not Allowed";
		  }
		  return false;
	}
	</script> 
</body>

</html>