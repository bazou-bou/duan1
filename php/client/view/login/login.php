
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="http://localhost/shopBanGiay/php/client/view/css/styleindex.css">
    <link rel="icon" href="../../img/logoweb.png" type="image/png" sizes="128x128">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .slide {
            width: 100%;
            height: 500px;
            overflow: hidden;
        }
        .tab-content{
            width: 500px;
            /* background-color: red; */
        }
        .nav-link{
            width: 250px;
        }
        .nav-item{
            width: 250px;
        }
        .nav{
            width: 500px;
            /* background-color: red; */
        }
        .content{
            display: flex;
            /* background-color: red; */
            justify-content: center;
            /* height: 800px; */
            margin-top: 50px;
        }
        
    </style>
    <title>Website Bán Giày Converse</title>
</head>

<body>
    <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/header.html'; ?>
    </header>
    <div class="content">
        <div class="center">

    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
			aria-controls="pills-login" aria-selected="true">Login</a>
		</li>
		<!-- <li class="nav-item" role="presentation">
			<a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
			aria-controls="pills-register" aria-selected="false">Register</a>
		</li> -->
	</ul>
	<!-- Pills navs -->
	
	<!-- Pills content -->
	<div class="tab-content">
		<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
			<form form method="post" enctype="multipart/form-data" class="mx-auto">
				
	
				<!-- Email input -->
				<div class="form-outline mb-4">
					<input type="email" id="loginName" class="form-control" />
					<label class="form-label" for="loginName">Email or username</label>
				</div>
	
				<!-- Password input -->
				<div class="form-outline mb-4">
					<input type="password" id="loginPassword" class="form-control" />
					<label class="form-label" for="loginPassword">Password</label>
				</div>
	
				<!-- 2 column grid layout -->
				<div class="row mb-4">
					<div class="col-md-6 d-flex justify-content-center">
						<!-- Checkbox -->
						<div class="form-check mb-3 mb-md-0">
							<input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
							<label class="form-check-label" for="loginCheck"> Remember me </label>
						</div>
					</div>
	
					<div class="col-md-6 d-flex justify-content-center">
						<!-- Simple link -->
						<a href="#!">Forgot password?</a>
					</div>
				</div>
	
				<!-- Submit button -->
				<button type="submit" name="submitForm" class="btn btn-primary btn-block mb-4">Sign in</button>
	
				<!-- Register buttons -->
				<div class="text-center">
					<p>Not a member? <a href="#!">Register</a></p>
				</div>
			</form>
		</div>
		<!--  -->
	</div>
    </div>
    </div>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shopBanGiay/php/client/view/html/footer.html'; ?>
    </footer>
</body>

</html>