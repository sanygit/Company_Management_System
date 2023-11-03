<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.banner-img{
		width: 75px;
		object-fit:contain;
	}
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_client" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered table-compact" id="list">
				<colgroup>
					<col width="10%">
					<col width="20%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Logo</th>
						<th>Company Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `clients` order by company_name asc ");
					while($row= $qry->fetch_assoc()):
						$row['description'] = strip_tags(stripcslashes(html_entity_decode($row['description'])));
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td>
							<center><img src="<?php echo validate_image($row['file_path']) ?>" class="banner-img img-thumbnail" alt=""></center>
						</td>
						<td><b class=""><?php echo ucwords($row['company_name']) ?></b></td>
						<td><small class="truncate"><?php echo $row['description'] ?></small></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_client">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_client" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>

	$(document).ready(function(){
		$('.new_client').click(function(){
			location.href = _base_url_+"admin/?page=clients/manage";
		})
		$('.manage_client').click(function(){
			location.href = _base_url_+"admin/?page=clients/manage&id="+$(this).attr('data-id')
		})
		$('.delete_client').click(function(){
		_conf("Are you sure to delete this Client detail?","delete_client",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_client($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=client_delete',
			method:'POST',
			data:{id:$id},
			dataType:'json',
			success:function(resp){
				if(resp.status == 'success'){
					location.reload()
				}else{
					alert_toast(resp.err_msg,'error')
				}
				end_loader();
			}
		})
	}
</script>