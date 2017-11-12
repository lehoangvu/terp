<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Khách hàng: <?php echo $orderdetail->order->customer ?></h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tổng quan</h2>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">

            <div class="col-md-9 col-sm-9 col-xs-12">

              <ul class="stats-overview">
                <li>
                  <span class="name">Số lượng cần thiết kế: <b><?php echo count($orderdetail->sizes) ?></b></span>
                  <?php foreach($orderdetail->sizes as $sizes): ?>
                    <button class="btn btn-xs btn-primary"><?php echo $sizes ?></button>
                  <?php endforeach; ?>
                </li>
                <li>
                  <span class="name">Trạng thái</span>
                  <p><?php echo $orderdetail->getStatusTpl() ?></p>
                </li>
                <li class="hidden-phone">
                  <span class="name">Đếm thời gian </span>
                </li>
              </ul>
              <br />

              <div class="project_detail">
                <p class="title">Hình ảnh</p>
                <?php $this->load->view('seller/component/attachment', array(
                  'assets'        =>  $assets,
                  'allow_add'     =>  true,
                  'action_url'    =>  '/admin/order-detail/add-file',
                  'id'            =>  $orderdetail->id,
                  'object_type'            =>  'order-detail'
                  )) ?>
                <p class="title">Tóm tắt yêu cầu</p>
                <p>
                  <textarea data-url-submit="/admin/order-detail/edit" data-id="<?php echo $orderdetail->id ?>" data-field="note" class="textarea_editable"><?php echo nl2br($orderdetail->note) ?></textarea>
                </p>
                <p class="title">Thông điệp:</p>
                <p>
                  <textarea data-url-submit="/admin/order-detail/edit" data-id="<?php echo $orderdetail->id ?>" data-field="content" class="textarea_editable"><?php echo $orderdetail->content ?></textarea>
                </p>
              </div>

              <div>


                <!-- User messages -->
                <!-- <h4>Recent Activity</h4> -->
                  <?php $this->load->view("seller/component/order-detail-tabs") ?>
                <!-- end of user messages -->


              </div>


            </div>

            <!-- start project-detail sidebar -->
            <div class="col-md-3 col-sm-3 col-xs-12">
              <!-- <section class="panel"> 
                <div class="x_title">
                    <h2>Thiết kế</h2>
                    <div class="clearfix">  </div>
                </div>
                <div class="panel-body">  
                  <div class="clearfix"></div>
                  <h5><b>Kích thước 800x400</b></h5>
                  <ul class="list-unstyled project_files">
                    <li>
                        <a href="">
                          <i class="fa fa-file-image-o"></i> Functional-requirements.docx
                        </a>
                        <a href="">
                          <i class="fa fa-envira"></i> Functional-requirements.docx
                        </a>
                    </li>
                  </ul>
                  <h5><b>Kích thước 800x400</b></h5>
                  <ul class="list-unstyled project_files">
                    <li>
                        <a href="">
                          <i class="fa fa-file-image-o"></i> Functional-requirements.docx
                        </a>
                        <a href="">
                          <i class="fa fa-envira"></i> Functional-requirements.docx
                        </a>
                    </li>
                  </ul>
                </div>
              </section> -->
              <section class="panel">
                <div class="panel-body">
                  <div class="project_detail">
                    <p class="title">Keep moving!</p>
                    <?php foreach($orderdetail->getSuggestActionTpl() as $i=>$tpl): ?>
                    <?php echo $tpl; ?>
                    <?php endforeach; ?>
                    <p class="title">Thanh toán</p>
                    <?php echo $orderdetail->getPaymentTpl(); ?>
                    <p class="title">Đang chuyển cho</p>
                    <p>
                      <?php $this->load->view('seller/component/user-link', array('user'=>$orderdetail->assignee)) ?>
                    </p>
                    <p class="title">Người chuyển</p>
                    <p>
                      <?php $this->load->view('seller/component/user-link', array('user'=>$orderdetail->reporter)) ?>
                    </p>
                    <a href="#" class="btn btn-xs btn-default" onclick="showAssignModal(<?php echo $orderdetail->assignee ? $orderdetail->assignee->id : '' ?>)"><span class="fa fa-user"></span> Chuyển đi</a>
                  </div>
                </div>
              </section>
              <section class="panel">
                <div class="panel-body">
                  <div class="project_detail">
                    <p class="title">Số lượng cần thiết kế: <span class="badge badge-success"><?php echo count($orderdetail->sizes) ?></span>
                  
                    <?php foreach($orderdetail->sizes as $size): ?>
                      <div class="size-upfile-block">
                        <button class="title-btn btn btn-xs btn-primary"><?php echo $size ?></button>
                        <br/>

                        <form action="" class="size-uploader" enctype="multipart/form-data">
                          <input type="hidden" name="sid" value="<?php echo $size->id ?>">
                          
                          <label class="btn btn-warning btn-xs"><input type="file" name="files[]" multiple="" class="hidden">Upfile</label>
                        </form>
                        
                        <?php $this->load->view('seller/component/attachment', array('assets'=>$size->assets)) ?>
                      </div>

                    <?php endforeach; ?>
                  </div>
                </div>
              </section>
            </div>
            <!-- end project-detail sidebar -->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="image-viewer" style="display: none">
  <div class="image-viewer-overlay"></div>
  <div class="image-viewer-wrap">
    <img src="" alt="" class="lazy">
    <a href="" class="image-viewer-close"><span class="fa fa-close"></span></a>
  </div>
</div>