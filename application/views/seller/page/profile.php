<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3><?php echo $user->username ?></h3>
      </div>
    </div>
    
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Thông tin cá nhân</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
              <div class="profile_img">
                <div id="crop-avatar">
                  <!-- Current avatar -->
                  <img class="img-responsive avatar-view lazy"  data-src="<?php echo $this->config->item('f_user_avatar') . $user->avatar ?>" alt="<?php echo $user->username ?>" title="Change the avatar">
                </div>
              </div>
              <h3><?php echo $user->username ?></h3>

              <ul class="list-unstyled user_data">

                <li>
                  <i class="fa fa-envelope user-profile-icon"></i> Email: <strong><a title="<?php echo $user->email ?>" href="mailto:<?php echo $user->email ?>"><?php echo $user->email ?></a></strong>
                </li>

                <li>
                  <i class="fa fa-calendar user-profile-icon"></i> Ngày tạo: <?php echo date('H:h:i d/m/Y', $user->create_at) ?>
                </li>

                <li>
                  <i class="fa fa-briefcase user-profile-icon"></i> Vị trí: <?php echo $user->getType() ?>
                </li>

                <li>
                  <label for="">
                    <i class="fa fa-map-marker user-profile-icon"></i> Địa chỉ:
                  </label>
                  <textarea placeholder="Click để sửa địa chỉ..." data-url-submit="/admin/profile/edit" data-id="<?php echo $user->id ?>" data-field="content" class="textarea_editable"><?php echo $user->address ?></textarea>
                </li>
              </ul>
              <br />

            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">

              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#activities" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Hoạt động</a>
                  </li>
                  <li role="presentation" class=""><a href="#work-on" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Dự án đã thực hiện</a>
                  </li>
                  <li role="presentation" class=""><a href="#cash" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Thù lao</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="activities" aria-labelledby="home-tab">

                    <!-- start recent activity -->
      					     <?php $this->load->view('seller/component/activities', array('activities'=>$activities)) ?>
                    <!-- end recent activity -->

                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="work-on" aria-labelledby="profile-tab">


                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="cash" aria-labelledby="profile-tab">
                    <div class="form-group row">
                      <div class="col-sm-12">
                        <label for="" class="form-label">Tháng: </label>
                        <select name="" id="reward_month">
                          <?php for($i = 1; $i < 13; $i++) :?>
                            <option value="<?php echo $i ?>" <?php echo $i == date('m') ? "selected" : "" ?> ><?php echo $i?></option>
                          <?php endfor; ?>
                        </select>

                        <label for="" class="form-label"> Năm: </label>
                        <select name="" id="reward_year">
                          <?php for($i = (int)date('Y') - 2; $i < (int)date('Y') + 2; $i++) :?>
                            <option value="<?php echo $i ?>" <?php echo $i == date('Y') ? "selected" : "" ?> ><?php echo $i?></option>
                          <?php endfor; ?>
                        </select>
                        <label for="" class="form-label">Trạng thái: </label>
                        <select name="" id="reward_status">
                          <option value="1">Đang đợi</option>
                          <option value="2">Khả dụng</option>
                          <option value="3">Tạm hoãn</option>
                          <option value="4">Đã thanh toán</option>
                        </select>
                        <button class="btn btn-primary btn-xs" id="submit-reward-filter">Xem</button>
                      </div>
                    </div>
                    <!-- start recent reward -->
                    <?php $this->load->view('seller/component/rewards', array('rewards'=>$rewards)) ?>
                    <!-- end recent reward -->
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var profile_id = "<?php echo $user->id ?>";
</script>