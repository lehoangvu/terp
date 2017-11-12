<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Đơn hàng</h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Tìm kiếm</button>
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
            <h2>Đơn hàng</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <p>Hiển thị <?php echo count($orders) ?> trong tổng số <?php echo $total ?> đơn hàng</p>
            <!-- start project list -->
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 1%">#</th>
                  <th >Khách hàng</th>
                  <th style="width: 20%">Chi tiết</th>
                  <th>Tham gia</th>
                  <th>Tiến độ</th>
                  <th>Trạng thái</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($orders as $index=>$order): ?>
                <tr>
                  <td><?php echo $order->getMid() ?></td>
                  <td>
                    <a><?php echo $order->customer->fullname ?></a>
                    <br />
                    <small><?php echo $order->get_time_elapsed_string() ?></small>
                  </td>
                  <td>
                    <?php foreach($order->order_details as $odi=>$order_detail): ?>
                      <div class="btn-group  btn-group-xs" style="margin-bottom: 5px">
                        <a href="<?php echo "/admin/order-detail/".$order_detail->getMid() ?>" class="btn btn-warning btn-xs"><i class="fa fa-paper-plane"></i> #<?php echo $order_detail->getMid() ?> </a>
                        <?php echo $order_detail->getStatusTpl() ?>
                      </div>
                      <div class="clearfix"></div>
                    <?php endforeach; ?>
                  </td>
                  <td>
                    <ul class="list-inline">
                      <?php $worker = $order->getWorker(); ?>
                      <?php echo empty($worker) ? 'Chưa có ai!' : '' ?>
                      <?php foreach($order->getWorker() as $user): ?>
                        <li>
                          <?php $this->load->view('seller/component/user-link', array('user'=>$user)) ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  </td>
                  <td class="project_progress">
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $order->getProcessPercent(); ?>"></div>
                    </div>
                    <small><?php echo $order->getProcessPercent(); ?>% Complete</small>
                  </td>
                  <td>
                  <p><?php echo $order->getStatusTpl() ?></p>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
            <!-- end project list -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>