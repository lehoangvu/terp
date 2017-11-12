<div class="attachment">
  <p>
    <span><i class="fa fa-paperclip"></i> <?php echo count($assets) ?> tệp đính kèm</span>
    <!-- <a href="#">Tải xuống tất cả</a> |
    <a href="#">View all images</a> -->
  </p>
  <ul>
  <?php foreach($assets as $i=>$asset): ?>
    <?php $asset_detail = json_decode($asset->d_json) ?>
    <li data-json="<?php echo json_encode($asset) ?>">
    <?php if(strpos($asset_detail->mime_type, "image")  !== -1): ?>
      <div class="preview-wrap">
        <a href="<?php echo "/asset/preview?id=".$asset->id ?>" class="atch-thumb lbx">
        <img class="lazy" data-src="<?php echo "/" . $asset->thumb ?>" alt="img">
      </a>
      </div>
    <?php else: ?>
      <div class="preview-wrap">
        <span class="glyphicon glyphicon-save-file"></span>
      </div>
    <?php endif; ?>
      <div class="file-name">
        <?php echo $asset->name ?>
      </div>
      <div class="links">
        <a href="<?php echo "/asset/download?id=".$asset->id ?>" target="_blank">Tải xuống</a>
        <span class="pull-right"><?php echo $asset_detail->size ?></span>
      </div>
    </li>
  <?php endforeach; ?>
  <?php if(isset($allow_add) && $allow_add): ?>
    <li>
      <div class="preview-wrap add-button">
        <form action="<?php $action_url ?>" class="hidden attachment-add-form" method="POST" >
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <input type="file" name="files[]" id="<?php echo $object_type . '-' . $id ?>">
        </form>
        <label for="<?php echo $object_type . '-' . $id ?>">Thêm file</label>
      </div>
    </li>
  <?php endif; ?>
  </ul>
</div>