<ul class="messages">
  <?php if(count($comments) === 0) : ?>
    <li>Chưa có thảo luận nào...</li>
  <?php endif; ?>
  <?php foreach ($comments as $i => $comment) :?>
    <li>
      <img src="<?php echo $this->config->item('f_user_avatar') . $comment->user->avatar ?>" alt="" class="avatar">
      <div class="message_date">
        <h3 class="date text-info"><?php echo date("d", $comment->update_at) ?></h3>
        <p class="month"><?php echo date("M", $comment->update_at) ?></p>
        <p class="month"><?php echo date("Y", $comment->update_at) ?></p>
      </div>
      <div class="message_wrapper">
        <h4 class="heading"><?php echo $comment->user->username ?></h4>
        <blockquote class="message"><?php echo $comment->content ?></blockquote>
        <br />

        <?php $this->load->view('seller/component/attachment', array(
        'assets'=>$comment->assets,
        'allow_add'     =>  false
        )) ?>
      </div>
    </li>
  <?php endforeach; ?>
</ul>