
<div class="bg-black-fade">
	<div class="">
	
        <div class="">
    		<div class="" id="loginModal">
              
              <div class="modal-body">
                <div class="">
                  <ul class="nav nav-tabs">
                    <li class="pad-right-20"><a href="#login" class="btn-success text-white" data-toggle="tab">Pharmasist Login</a></li>
                    <li><a href="#create" class="btn-primary text-white" data-toggle="tab">Admin Login</a></li>
                  </ul>
				  
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active in" id="login">
                      <form class="top-10" action='index.php' method="POST">
                        <fieldset>
                            
                            <div class="form-group">
                              <input type="text" name="username" placeholder="Student Matric No" class="form-control" required />
                            </div>
                          
                          <div class="form-group">
							<input type="password" name="password" placeholder="Student Password" class="form-control" required /> 
							<input type="hidden" name="user" value="studentData"  /> 
                          </div>
     
     
                          <div class="form-group">
                            <!-- Button -->
                            <div class="">
                              <button class="btn form-control btn-success" name="formSubmit">Login</button>
                           
							
						  </div>
                          </div>
						  
                        </fieldset>
                      </form>                
                    </div>
                    <div class="tab-pane fade top-10" id="create">
                      <form id="tab" action="index.php" method="POST">
                        <div class="form-group">
                              <input type="text" name="username" placeholder="Teachers Reg No" class="form-control" required />
                            </div>
                          
                          <div class="form-group">
							<input type="password" name="password" placeholder="Teachers Password" class="form-control" required /> 
							<input type="hidden" name="user" value="teachersData"  /> 
                          </div>
     
                        <div class="form-group">
                          <button class="btn btn-primary form-control" name="formSubmit">Login</button>
						  
                        </div>
						
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
	</div>
	<?php if(isset($_POST["formSubmit"])){
		$user=$_POST["user"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		
		$query=mysqli_query($connection,"SELECT * FROM $user WHERE regNo='{$username}' AND password='{$password}'");
		if(mysqli_num_rows($query)>0){
			while($fetchData=mysqli_fetch_array($query))
			{
				if($user=="studentData"){$_SESSION["userName"]=$fetchData["studentName"];
				$_SESSION["userId"]=$fetchData["studentId"];}
				if($user=="teachersData"){$_SESSION["userName"]=$fetchData["teachersName"];
				$_SESSION["userId"]=$fetchData["teachersId"];
				$_SESSION["rank"]=$fetchData["position"];}
				$_SESSION["regNo"]=$fetchData["regNo"];
				$_SESSION["deptId"]=$fetchData["deptId"];
				$_SESSION["userPic"]=$fetchData["picture"];
				
			}
			if($user=="studentData"){echo"<script>window.location.href='studentPanel.php'</script>"; exit();}
			if($user=="teachersData"){echo"<script>window.location.href='teachersPanel.php'</script>"; exit();}
			
		}
		else{
			echo"<div class='alert alert-warning'><p>Invalid Username And Password</p></div>";
		}
		
	} ?>
</div>

</div>