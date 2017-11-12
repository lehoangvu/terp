<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" href="public/images/favicon.ico">
        <link rel="stylesheet" href="/public/styles/create.css">
        <link rel="stylesheet" href="/public/styles/font-awesome.min.css">
        <title>Create Order!!</title>
    </head>
    <body>
        <div class="container">
            <?php $this->load->view('buyer/layout/header') ?>
        </div>
	    <footer class="light-blue page-footer">
	        <div class="container">
				<?php $this->load->view('buyer/page/create') ?>
	        </div>
	        <div class="footer-copyright">
	            <div class="container">
	                Made by <a class="orange-text text-lighten-3" href="#">Codeigniter Fire</a>
	            </div>
	        </div>
	    </footer>
    </body>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/jquery.form.js"></script>
    <script src="/public/scripts/jquery.sticky.js"></script>
    <script src="/public/scripts/create.js"></script>
</html>