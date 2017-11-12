<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 docs-actions">
            <div class="row">
                <span class="stepOne pull-left">1</span>
                <dib class="clearfix"></dib>
                <div class="banner-request-wrap">
                    
                        <div class="banner-request-block">
                            <form method="post" name="multiple_upload_form" enctype="multipart/form-data" action="/order/addRequest">
                                <input type="hidden" name="bannerID" value="">
                                <a href="#" class="remove pull-right">Xóa banner này</a>
                                <div class="col-sm-12 input-pattern">
                                    <div class="row">
                                        <p class="col-sm-7">Gửi kèm hình ảnh hoặc banner mẫu mà bạn thấy ưng ý, nếu có.</p>
                                        <div class="col-sm-5">
                                            <label class="btn btn-warning btn-sm" title="Upload image file">
                                                <input type="file" multiple="multiple" class="sr-only" id="images" name="images[]" accept="image/*">
                                                <span class="docs-tooltip" data-toggle="tooltip" title="Upload images">
                                                    <i class="fa fa-upload"></i> Chọn file ảnh...
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 input-pattern">
                                    <input type="text" class="form-control input-sm" name="bannerContent" placeholder="Nhập nội dung banner...">
                                </div>
                                <div class="size-item-wrap input-pattern">
                                    <div class="size-item">
                                        <input type="text" name="bannerSizeX[]" class="x form-control" placeholder="Dài">
                                        x
                                        <input type="text" name="bannerSizeY[]" class="y form-control" placeholder="Rộng">
                                        <span class="close">x</span>
                                    </div>
                                </div>
                                <div class="alert alert-danger size-item-error" style="display: none"></div>
                                <div class="col-sm-6 input-pattern">
                                    <button class="add-size form-control btn btn-sm btn-primary">Thêm kích thước</button>
                                </div>
                                <div class="col-sm-12 input-pattern">
                                    <textarea type="text" class="form-control input-sm" name="bannerNote" placeholder="Link trang web của bạn và yêu cầu khác nếu có..."></textarea>
                                </div>
                            </form>
                        </div>
                </div>
                <a href="javascript:void(0)" class="form-control btn btn-sm btn-success design-cart" style="font-size: 15px">Thêm yêu cầu banner</a>
            </div>
        </div>
        <div class="col-sm-4 docs-actions">
            <div id="customerForm" class="col-sm-12" style="clear:both">
            <span class="stepTwo pull-left">2</span>
            <h3>Thông tin của bạn</h3>
            <form id="createOrderFinalStep" action="/order/completeOrder" method="post">
                <input type="text" class="form-control oname" value="" placeholder="Họ và tên">
                <input type="text" class="form-control ophone" value="" placeholder="Số điện thoại (*)">
                <input type="email" class="form-control oemail" value="" placeholder="Email (*)">
                <input type="text" class="form-control owebsite" value="" placeholder="Địa chỉ website">
                <button type="button" data-method="save" class="btn createOrder">Xác nhận yêu cầu thiết kế</button>
            </form>
                </div>
        </div>
    </div>
</div>