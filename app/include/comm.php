<?php
//include
include SITE_ROOT . "/app/controls/comments.php";
 ?>

 <div class="cpl-md-12 col-12 comm">
     <h3>Комментарии</h3>
     <form action="<?= BASE_URL . "single.php?post=$page"?>" method="post">
         <input name="page" value="<?= $page; ?>" type="hidden">
         <div class="mb-3">
             <label for="exampleFormControlInput1" class="form-label">Email</label>
             <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
         </div>
         <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
             <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
         </div>
         <div class="col-12">
             <button name="goComment" class="btn btn-primary" type="submit">Отправить</button>
         </div>
     </form>
     <?php if(count($comments) > 0): ?>
        <div class="row all-comments">
            <h3 class="col-12">Комментарии к записи</h3>
            <?php foreach ($comments as $comment): ?>
                <div class="one-comment col-12">
                    <span><i class="far fa-envelope"></i> <?= $comment['email']  ?> </span>
                    <span><i class="far fa-calendar-check"></i> <?=$comment['crdate']  ?> </span>
                    <div class="col-12 text">
                        <?=$comment['comment']  ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif; ?>
 </div>
