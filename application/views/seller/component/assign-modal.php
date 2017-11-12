<div id="assignModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
	  <div class="modal-content">

	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <h4>Chọn người để chuyển</h4>

			<div class="user-select-container" id="assignOnSideBar">
			  <div class="form-group">
			      <select class="user-select form-control" tabindex="-1" data-bind-value="#assignSubmit">
					<?php foreach($userlist as $i=>$user) : ?>
					<option value="<?php echo $user->id ?>" data-avatar="<?php echo $this->config->item('f_user_avatar') . $user->avatar ?>"><?php echo $user->username ?></option>
					<?php endforeach; ?>
			      </select>
			  </div>
			</div>
	    </div>
	    <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
	      <button type="button" class="btn btn-primary" onclick="assignTo(this.value, <?php echo isset($orderdetail) ? $orderdetail->id : 0 ?>)" id="assignSubmit">Chuyển</button>
	    </div>

	  </div>
	</div>
</div>