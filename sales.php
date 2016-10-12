<!DOCTYPE HTML>

<html lang="en">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="Content-Style-Type" content="text/css">
      <meta http-equiv="Content-Script-Type" content="text/javascript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Bruce's Store</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="store.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">micromediaweb.com</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li class="active"><a href="#">Home</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container">

      <h1>Bruce's Store</h1>
      <p class="lead">insert sales</p>

    <section class="row">
      <article id="catalogue"></article>
      
    </section>
  </div><!-- /.container -->

  <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="addCustomer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="insert_customer.php" id="buyItems">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Share some deets...</h4>
      </div>

      <div class="modal-body">
         <label for="name">Full Name: <br>
            <input type="text" name="name" id="name" title="Full Name" class="form-control" />
          </label><br>
          <label for="email">Email:<br>
            <input type="email" name="email" id="email" title="Email" class="form-control" />
          </label><br>
          <section id="modal-hidden"></section>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Checkout</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
    <!-- end of modal -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="sales.js"></script>




</body>
</html>