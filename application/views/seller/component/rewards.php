<div id="reward-result">
  <span class="pull-right">Có <?php echo count($rewards); ?> kết quả</span>
  <div class="clearfix"></div>
  <ul class="to_do" id="reward-list">
    <?php foreach($rewards as $index=>$reward): ?>
      <li>
        <p>
          <input type="checkbox" class="flat" name="reward_<?php echo $reward->getMid() ?>"> 
          <a href="<?php echo "/admin/order-detail/".$reward->order_detail->getMid() ?>" class="">#<?php echo $reward->order_detail->getMid() ?>
          <?php echo $reward->order_detail->content ?></a>
          <span class="pull-right">
            <small><?php echo date("d/m/Y", $reward->create_at) ?></small>
            <?php echo $reward->getStatusTpl() ?>
          </span>
        </p>
      </li>
    <?php endforeach; ?>
  </ul>
</div>