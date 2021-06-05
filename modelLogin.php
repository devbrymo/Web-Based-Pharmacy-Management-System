
<!--admin--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="admin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">
		<center><img src="image/login.png" class="img responsive img-thumbnail" width="30%" /></center>
		<br/>ADMINISTRATOR LOGIN
		<div class="titleline"></div>
      </div>
      <div class="modal-body">
       <form action="index.php" method="post">
		<div class="form-group">
		<input class="form-control" name="username" type="text" placeholder="Username" required /></div>
		<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Password" required /></div>
		<div class="form-group"><button class="form-control btn btn-success" name="adminPost">
		LOGIN</button></div>
	</form>
      </div>
      
    </div>
  </div>
</div>

<!--admin--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="pharmacist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">
		<center><img src="img/pharmacist.png" class="img responsive img-thumbnail" width="30%" /></center>
		<br/>PHARMACIST LOGIN
		<div class="titleline"></div>
      </div>
      <div class="modal-body">
       <form action="index.php" method="post">
		<div class="form-group">
		<input class="form-control" name="username" type="text" placeholder="Username" required /></div>
		<div class="form-group">
		<input class="form-control" name="password" type="password" placeholder="Password" required /></div>
		<div class="form-group"><button class="form-control btn btn-success" name="pharmacistPost">
		LOGIN</button></div>
	</form>
      </div>
      
    </div>
  </div>
</div>
