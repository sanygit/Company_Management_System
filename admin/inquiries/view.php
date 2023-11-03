<?php 
require_once('../../config.php');
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * from messages where id = '{$_GET['id']}' ");
	foreach($qry->fetch_array() as $k => $v){
		if(!is_numeric($k)){
			$$k = $v;
		}
	}
	$conn->query("UPDATE messages set `status` = 1 where id = '{$_GET['id']}' ");
}
?>
<div class="container-fluid">
	<h4><b>From</b></h4>
	<hr>
	<p class="m-0"><b>Full Name:</b> <?php echo ucwords($full_name) ?></p>
	<p class="m-0"><b>Email:</b> <?php echo $email ?></p>
	<p class="m-0"><b>Conatact #:</b> <?php echo $contact ?></p>
	<hr>
	<p class="m-0"><b>Subject:</b> <?php echo $subject ?></p>
	<hr>
	<h4><b>Message</b></h4>
	<p class="m-0"><?php echo $message ?></p>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
<style>
	#uni_modal>.modal-dialog>.modal-content>.modal-footer{
		display:none !important;
	}
	#uni_modal>.modal-dialog>.modal-content>.modal-body{
		padding:0;
	}
</style>