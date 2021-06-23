<!--MODEL--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="adminProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title text-success" id="myModalLabel">
		<center><img src="../img/admin_icon.jpg" class="img-responsive" width="20%" /></center>
		<br/>
		ADMIN PROFILE</h2>
      </div>
      <div class="modal-body">
       <form action="home.php" method="POST">
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon btn-black">Your Name</span><input name="name" class="form-control" type="text" value="<?php echo $_SESSION["name"]; ?>" />
			</div>
			</div>
			
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon btn-black">Username</span>
				<input name="adminUsername" class="form-control" type="text" value="<?php echo $_SESSION["username"]; ?>" />
			</div>
			</div>
			
			<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon btn-black">Password</span>
				<input name="adminKey" class="form-control" type="password" value="<?php echo $_SESSION["key"]; ?>" />
			</div>
			</div>
			 <div class="form-group">
				<button name="updateProfile" class="form-control btn-primary">Update Profile</button>
			</div>
	   </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-black btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--NEW SALE RECORD--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="addAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">
		<center><img src="../img/pharmacist_icon.jpg" class="img-responsive" width="20%" /></center>
		<br/>
		NEW ACCOUNT</h2><div class="titleline"></div>
      </div>
      <div class="modal-body">
       <form action="home.php" method="post">
		<div class="form-group"><input class="form-control" name="name" type="text" placeholder="Full Name" required /></div>
		<div class="form-group"><input class="form-control" name="regNo" type="text" placeholder="Reg No" required /></div>
		<div class="form-group"><input class="form-control" name="username" type="text" placeholder="Username" required /></div>
		<div class="form-group"><input class="form-control" name="password" type="text" placeholder="Password" required /></div>
		
		<div class="form-group"><button class="form-control btn btn-success" name="addAccount">CREATE ACCOUNT</button></div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-black btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!--NEW SALE RECORD--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="viewAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">
		<center><img src="../img/pharmacist_icon.jpg" class="img-responsive" width="20%" /></center>
		<br/>
		PHARMACIST</h2><div class="titleline"></div>
      </div>
      <div class="modal-body">
       <?php
	$query=mysqli_query($connection,"select * from pharmacydb");
	echo "
		<table class='table table-bordered'>
			<tr>
			<th>Reg No</th>
			<th>Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Delete Account</th>
			</tr>
		";
		while($get = mysqli_fetch_array($query)){

			echo"
			
			<tr>
			<td>{$get["regNo"]}</td>
			<td>{$get["name"]}</td>
			<td>{$get["username"]}</td>
			<td>{$get["password"]}</td>
			
			<td><form action='home.php' method='post'>
			<button class='btn btn-danger btn-block' value='{$get["id"]}' name='deleteAccount'>
			<i class='glyphicon glyphicon-trash'></i></button></form></td>
			</tr>
			";
		}
		echo "</table>";
		?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-black btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!--SEARCH IN STOCK--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="searchInStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">
		<center><img src="../img/prescri.jpg" class="img-responsive" width="20%" /></center>
		<br/>SEARCH IN STOCK
		<div class="titleline"></div>
      </div>
      <div class="modal-body">
       <form action="searchInStock.php" method="GET">
		<div class="form-group"><input class="form-control" name="search" type="text" placeholder="Drug name" required /></div>
		<div class="form-group"><button class="form-control btn btn-success" name="submit">SEARCH IN STOCK</button></div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-black btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--VIEW SALE--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="viewSale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">
		<center><img src="../img/payment.png" class="img-responsive" width="20%" /></center>
		
      </div>
      <div class="modal-body">
       <div class="well">
	   <h3>View Sale For A Particular Date</h3>
	   <form action="sale.php" method="post">
		<div class="form-group">Date:
		<input class="form-control" name="date" type="date" placeholder="Date" required />
		</div>
		<div class="form-group">
		<button class="form-control btn btn-info" name="saleForADate">SEARCH</button></div>
		</form>
	   </div>
       <div class="well">
	   <h3>View Sale For A Particular Month</h3>
	   <form action="sale.php" method="post">
	   <div class="row">
		<div class="col-md-6"><div class="form-group">Month In Digit: 
		<input class="form-control" name="month" type="number" placeholder="Month" required />
		</div></div>
		<div class="col-md-6"><div class="form-group">Year In Digit: 
		<input class="form-control" name="year" type="number" placeholder="Year" required />
		</div></div>
		</div>
		<div class="form-group">
		<button class="form-control btn btn-primary" name="saleForAMonth">VIEW SALE</button></div>
		</form>
	   </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-black btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--VIEW SALE--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="viewAnalysis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">
		<center><img src="../img/invoic_1.jpg" class="img-responsive" width="20%" /></center>
		
      </div>
      <div class="modal-body">
       <div class="well">
	   <h3>View Analysis For A Particular Date</h3>
	   <form action="analysis.php" method="post">
		<div class="form-group">Date:
		<input class="form-control" name="date" type="date" placeholder="Date" required />
		</div>
		<div class="form-group">
		<button class="form-control btn btn-info" name="analysisForADate">VIEW ANALYSIS</button></div>
		</form>
	   </div>
       <div class="well">
	   <h3>View Analysis For Particular Month</h3>
	   <form action="analysis.php" method="post">
	   <div class="row">
		<div class="col-md-6"><div class="form-group">Month In Digit: 
		<input class="form-control" name="month" type="number" placeholder="Month" required />
		</div></div>
		<div class="col-md-6"><div class="form-group">Year In Digit: 
		<input class="form-control" name="year" type="number" placeholder="Year" required />
		</div></div>
		</div>
		<div class="form-group">
		<button class="form-control btn btn-primary" name="analysisForAMonth">VIEW ANALYSIS</button></div>
		</form>
	   </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-black btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
