

<!--NEW SALE RECORD--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="addRecord" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">NEW SALE RECORD</h2><div class="titleline"></div>
      </div>
      <div class="modal-body">
       <form action="record.php" method="post">
		<div class="form-group">
		<select class="form-control" name='drugName'  >
		<option selected>Select Drug</option>
		<?php
		$getDrugs=mysqli_query($connection,"SELECT * FROM stock");
		while($showDrugs=mysqli_fetch_array($getDrugs)){
			echo "<option value='{$showDrugs["id"]}'>
			{$showDrugs["name"]}</option>";
		}
		
		?>
		</select>
		</div>
		<div class="form-group"><input class="form-control" name="quantity" type="number" placeholder="Quantity" required /></div>
	
		<div class="form-group">Date Sold
		<input class="form-control" name="dateSold" type="text" value="<?php echo $date2; ?>" required /></div>
		<div class="form-group">
		<textarea rows="8" class="form-control" name="usage" placeholder="Prescription" required>Prescription
		</textarea>
		</div>
		<div class="form-group"><button class="form-control btn btn-success" name="addSaleRecord">ADD TO SALE RECORD</button></div>
	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-black btn-block" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<!--ADD TO STOCK--------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal" id="addStock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="text-center modal-title" id="myModalLabel">NEW STOCK ITEM<div class="titleline"></div>
      </div>
      <div class="modal-body">
       <form action="home.php" method="post">
		<div class="form-group"><input class="form-control" name="drugName" type="text" placeholder="Drug Name" required /></div>
		<div class="form-group"><input class="form-control" name="quantity" type="number" placeholder="Quantity" required /></div>
		<div class="form-group"><input class="form-control" name="price" type="number" placeholder="Price" required /></div>
		<div class="form-group">Expiry Date<input class="form-control" name="expiryDate" type="date" placeholder="Date Sold" required /></div>
		
		<div class="form-group"><button class="form-control btn btn-success" name="addToStock">ADD TO STOCK</button></div>
	</form>
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
        <h2 class="text-center modal-title" id="myModalLabel">SEARCH IN STOCK
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
