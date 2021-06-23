<?php include("date.php"); ?>
<nav class="navbar navbar-inverse navbar-fixed-top " >
<div class="pad-10 bg-black-fade">
	<div class="container-fluid">
	<div class="rows">
	<div class="col-md-1">
		<img src="../img/fudmalogo.jpg" class="img-responsive" width="85%"/>
	</div>
	<div class="col-md-10">
		<h2 class="text-white">PHARMACY MANAGEMENT SYSTEM (FUDMA)</h2>
	</div>
	<div class="col-md-1">
		<h2 class=""></h2>
	</div>
	</div>
	</div>
</div>
	
      <div class="btn-black">
      <div class="container ">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand "><b class="text-white" style="color:green;">MENU</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="home.php" class="btn"><i class="glyphicon glyphicon-home"></i> HOME</a></li>
            <li><a href="stock.php" class="btn"><i class="glyphicon glyphicon-eye-open"></i> VIEW STOCK ITEMS</a></li>
            <li><a data-toggle="modal" data-target="#searchInStock" class="btn"><i class="glyphicon glyphicon-search"></i> SEARCH IN STOCK </a></li>
            <li><a data-toggle="modal" data-target="#addRecord" class="btn"><i class="glyphicon glyphicon-list-alt"></i> NEW SALE RECORD</a></li>
            <li><a data-toggle="modal" data-target="#addStock" class="btn"><i class="glyphicon glyphicon-list"></i> NEW STOCK ITEM</a></li>
            <li><a href="logout.php"><i class="glyphicon glyphicon-off"></i> LOGOUT</a></li>
            <li><a><i class="glyphicon glyphicon-time"></i> <?php echo $time; ?></a></li>
            
            
              </ul>
            </li>
          </ul>
         
        </div><!--/.nav-collapse -->
      </div>
	  
	</div>
</nav>
	