<?php if(count($activities) > 0): ?>
  <?php foreach($activities as $index=>$activity): ?>
    <div class="activity-item">
      <?php $this->load->view("seller/component/user-link", array('user'=>$activity->user)) ?>
      <br>
      <p>
        <?php echo $activity->content ?>
        <br>
        <small><i><?php echo $activity->get_time_elapsed_string() ?></i></small>
        </p>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <p>Chưa có hoạt động nào</p>
<?php endif; ?>