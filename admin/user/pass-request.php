<?php
	/*
	* This page displayes all password request.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
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
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        .home-body-content,
        .default-body-content {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .default-body-content .list-group .list-group-item h3 {
            font-size: 1.3em;
        }

        .default-body-content .list-group a {
            color: black;
            padding-top: 20px;
        }

        .home-body-content .my_card {
            margin-bottom: 25px;
            transition-duration: 0.4s;
        }

        .my_card:hover {
            box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.3);
            transition-duration: 0.4s;
        }

        .my_card {
            padding: 16px;
            margin: 12px;
        }

        .NU {
            margin: -7px;
            font-size: 13px;
        }

        .DG {
            margin: -7px;
            font-size: 12px;
        }

        .buttoning {
            size: 12px;
            margin: -1px;
            font-size: x-small;
        }

        .btn-group-sm>.btn,
        .btn-sm {
            font-size: .875rem;
            border-radius: .2rem;
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
                <h1>Password Change Request</h1>
            </div>
        </div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="" class="fa fa-sign-out">
                <span aria-hidden="true">Log Out</span>
            </a>
        </div>
    </header>
    <!--Body----------->
    <section class="home-body-content">
        <div class="container">
			<div class="pb-4">
				Note : To create new password for requested person, note their name or mobile number and search on <b>See Users</b> section. 
				Please match the mobile number carefully, then click <b>Update</b> and you will be able to create new password for the user.<br/>
				Don't forget to send the newly generated password to the the requested person's mobile number.
			</div>
            <div class="row">
			<?php
				$pass = "select pass_mobile, pass_name, pass_date from pass_request order by pass_id desc";
				$pass_result =mysqli_query($conn, $pass);
				if(mysqli_num_rows($pass_result)<=0){
					echo "No Requests";
				}else{
					while($pass_row = mysqli_fetch_assoc($pass_result)){
				?>
                <div class="col-lg-4 col-md-4 sol-sm-4">
                    <a href="#"></a>
                    <div class="card my_card">
                        <div class="card-body">
                            <div class="d-flex mb-3 NU">
                                <div class="p-2 mr-auto"><b><?php echo $pass_row['pass_name'];?></b></div>
                                <!-- <div class="p-2">ID : 1234</div> -->
                            </div>
                            <div class="d-flex mb-3">
                                <div class="p-2 mr-auto NU">Mo. : <?php echo $pass_row['pass_mobile'];?></div>
                            </div>
                            <div class="d-flex mb-3 DG name">
                                <div class="p-2 mr-auto text-muted">Date : <?php echo $pass_row['pass_date'];?></div>
                                <!-- <div class="p-2 text-muted">Gender : Male</div> -->
                            </div>
                        </div>
                    </div>
                </div>
				<?php
					}
				}
				?>
            </div>
        </div>
    </section>
</body>

</html>