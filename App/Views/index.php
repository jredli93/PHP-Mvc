<section class="content">
    <div class="content-center section_center">
        <div class="items-container">
            <?php foreach($products as $product) : ?>
                <div class="item_single">
                    <img src="./assets/img/<?= $product['image'] ?>">
                    <h2 class="itemm_single-title"><?= $product['title'] ?></h2>
                    <p class="item_single-text"><?= $product['description'] ?></p>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<section class="comments">
    <div class="comments-center section_center">
        <div class="comments-list">

            <?php foreach($comments as $comment): ?>
                <div class="comment-single">
                    <h1 class="comment-author"><?= $comment['author'] ?></h1>
                    <p class="comment-text"><?= $comment['comment'] ?></p>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="comment-form">
            <form action="insert_comment" class="comment-form" method="POST">
                <input class="tbName" placeholder="Name" type="text" name="name" />
                <input type="email" placeholder="Email" name="email" class="tbEmail" />
                <textarea placeholder="Comment" name="comment" cols="30" rows="10" class="taComment" ></textarea>
                <button class="btn-submit" type="submit">Post</button>
            </form>
        </div>
    </div>
</section>
