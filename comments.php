<?php if (have_comments()) { ?>
<div class="comments">
    <div class="comments__get">
        <h1 class="titleStyle2">Comments <i class="far fa-comment"><span><?php echo wp_count_comments(get_the_id())->total_comments ?></span></i></h1>
            <?php
                    wp_list_comments(array(
                        'style'       => 'ol',
                        'short_ping'  => true,
                    ));
                ?>
        <?php if(is_paginate_comments(get_the_id())){ ?>

        <div class="pagination-div">
            <div class="pagination-container">
                <?php paginate_comments_links(); ?>
            </div>
        </div>

        <?php }; ?>
    </div>
    <div class="comments__post">
        <div class="comments__post-form">
            <?php }; comment_form(); ?>
        </div>
    </div>
</div>
