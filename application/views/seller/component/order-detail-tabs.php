<section class="panel">
  <div class="panel-body">
    <div class="" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li role="presentation" class="active"><a href="#comment" role="tab" data-toggle="tab" aria-expanded="true">Trao đổi</a>
        </li>
        <li role="presentation" class=""><a href="#activities" role="tab" data-toggle="tab" aria-expanded="false">Hoạt động</a>
        </li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="comment" aria-labelledby="home-tab">
          <?php $this->load->view("seller/component/comments", array(
              'comments'=>$orderdetail->comments
          )) ?>
        <div class="comment-editor">
          <form id="bigCommentEditor" >
            <input type="hidden" value="<?php echo $orderdetail->id ?>" name="odid">
            <div class="comment-textarea form-group">
              <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <input type="file" name="images[]" multiple="multiple">
            <div class="comment-submit form-group text-center">
              <button type="reset" class="btn btn-primary">Hủy</button>
              <button type="submit" class="btn btn-success">Gửi</button>
            </div>
          </form>
        </div>

        </div>
        <div role="tabpanel" class="tab-pane fade" id="activities" aria-labelledby="profile-tab">
          
              <?php $this->load->view('seller/component/activities', array('activities'=>$orderdetail->activities)) ?>
          
        </div>
      </div>
    </div>
  </div>
</section>