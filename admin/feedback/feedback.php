<?php
	/*
	* This page displayes all feedbacks.
	*/
	
	/*
	* This ("identification.php") file contains User Authentication code.
	* This ("identification.php") file contains Database Connection code.
	* It checks the user existency in database .
	*/
	require_once '../control/identification.php';
?>
<!doctype html>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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

        .NU {
            margin: -7px;
            font-size: 13px;
        }

        .DG {
            margin: -7px;
            font-size: 12px;
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
                <h1>Feedback</h1>
            </div>
        </div>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="" class="fa fa-sign-out">
                <span aria-hidden="true">Log Out</span>
            </a>
        </div>
    </header>
    <!-- body content -->
    <section class="home-body-content">
        <div class="container">
            <div class="row">
			<?php
				$fd = "select fd_type, fd_name, fd_mobile, fd_data, fd_date from feedback order by fd_id desc";
				$fd_result =mysqli_query($conn, $fd);
				if(mysqli_num_rows($fd_result)<=0){
					echo "No feedbacks";
				}else{
					while($fd_row = mysqli_fetch_assoc($fd_result)){
						if($fd_row['fd_type']==0)
							$fd_type="Feedbck";
						else
							$fd_type="Report";
			?>
                <div class="col-lg-3 col-md-3">
                    <div class="card my_card">
                        <div class="card-body">
                            <div class="d-flex mb-3 NU">
                                <div class="p-2 mr-auto"><b><?php echo $fd_row['fd_name'];?></b></div>
                                <div class="p-2"> <?php echo $fd_type;?> </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="p-2 mr-auto NU">Mobile : <?php echo $fd_row['fd_mobile'];?></div>
                            </div>
                            <div class="d-flex mb-3 DG name">
                                <div class="p-2 mr-auto text-muted">Date : <?php echo $fd_row['fd_date'];?></div>
                            </div>
                            <p class="card-text"><?php echo $fd_row['fd_data'];?></p>
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
    <!-- body content -->

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
</body>

</html>