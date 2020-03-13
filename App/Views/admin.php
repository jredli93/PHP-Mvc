<section class="content">
    <div class="comments-center section_center">
        <?php if(\Core\Session::get('loggedIn') == 1) { ?>
        <div class="comments-list">

<!--            --><?php //print_r($comments)  ?>

            <?php foreach($comments as $comment): ?>
                <div class="comment-single">
                    <h1 class="comment-author"><?= $comment['author'] ?></h1>
                    <p class="comment-text"><?= $comment['comment'] ?></p>
                    <span class="publish"><a href="comments/<?= $comment['id'] ?>/publish"><?= $comment['published'] ? 'Unpublish' : 'Publish' ?></a></span>

                </div>
            <?php endforeach; ?>

        </div>
        <?php } ?>
    </div>
</section>
