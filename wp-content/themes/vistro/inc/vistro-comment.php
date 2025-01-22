<?php

add_filter( 'comment_form_default_fields', 'vistro_comment_form_default_fields_func' );

function vistro_comment_form_default_fields_func( $default ) {

    $default['author'] = '
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-25">
                    <span class="input-title ">'.esc_html__('Name *', 'vistro').'</span>
                    <input type="text" name="author"">
                </div>';

    $default['email'] = '
                <div class="col-lg-6 col-md-6 mb-25">
                    <span class="input-title ">'.esc_html__('Email *', 'vistro').'</span>
                    <input type="text" name="email">
                </div>
            </div>
        ';

    $default['url'] = '';

    $default['comment_field'] = '
        <div class="col-xxl-12 mb-20">
            <span class="input-title">'.esc_html__('Comment *', 'vistro').'</span>
            <textarea id="comment" name="comment" cols="30" rows="10"></textarea>
        </div>';

    $default['cookies'] = '';
    return $default;
}

add_filter( 'comment_form_defaults', 'vistro_comment_form_defaults_func' );
function vistro_comment_form_defaults_func( $info ) {
    if ( !is_user_logged_in() ) {

        $info['comment_field'] = '';

        $info['submit_field'] = '%1$s %2$s';

    } else {
        $info['comment_field'] = '

        <div class="comment-replay-form">
            <div class="row">
                <div class="col-xl-12 form-group">
                    <div class="tx-input-field">
                        <textarea id="comment" name="comment" cols="30" rows="10"></textarea></div></div>';
                        $info['submit_field'] = '%1$s %2$s</div></div>
        ';
    }

    $form_wrapper = 'logged-in mt-10';
    $row_class = '';
    $mt_top = 'mt-15';
    if ( !is_user_logged_in() ) {
        $form_wrapper = 'not-logged';
        $row_class = 'row';
        $mt_top = 'mt-0';
    }

    $info['submit_button'] = '
    <div class="col-xl-12 submit-button '.esc_attr($mt_top).'">
        <button class="vst-btn-1 border-0 wow fadeInUp" type="submit">
            ' . esc_html__( 'Post comment ', 'vistro' ) . '
            <i class="fal fa-arrow-right"></i>
        </button>
    </div>
';

    // check if number of comments is zero
    $comments_number = get_comments_number();

    if( $comments_number == 0 ) {
        $title_class = "mt-0";
    } else {
        $title_class = "mt-0";
    }

    $info['title_reply_before'] = '<div class="group-title">
        <h3 class="comment-replay-form-title h1-heading mb-10 wow '.esc_attr($title_class).'">';
        $info['title_reply_after'] = '</h3>
    </div>';
    $info['comment_notes_before'] = '';

    return $info;
}

// comment view function

if ( !function_exists( 'vistro_comment' ) ) {
    function vistro_comment( $comment, $args, $depth ) {
        $GLOBAL['comment'] = $comment;
        extract( $args, EXTR_SKIP );
        $args['reply_text'] = '' . esc_html__( 'Reply', 'vistro' ) . '';
        $replayClass = 'comment-depth-' . esc_attr( $depth );

        ?>
        <li id="comment-<?php comment_ID();?>">
            <div class="tx-comment-box position-relative comments-box-single wow fadeInUp mb-5">
                <?php if( get_avatar($comment, 78, null, null, ['class' => []]) == true ) : ?>
                <div class="comments-box-author-img wow fadeIn ">
                    <?php print get_avatar( $comment, 60, null, null, ['class' => []] ); ?>
                </div>
                <?php endif; ?>
                <div class="comments-box-author-content comment-text">
                    <h6 class="title wow h1-heading">
                        <?php print get_comment_author_link();?>
                    </h6>
                    <span class="date">
                        <?php comment_time( get_option( 'date_format' ) );
                            echo __('at ', 'vistro');
                            $time = get_comment_time( 'g:i a' );
                            echo esc_html( $time );
                        ?>
                    </span>
                    <?php comment_text();?>
                    <?php comment_reply_link( array_merge( $args, ['depth' => $depth, 'max_depth' => $args['max_depth']] ) );?>
                </div>
            </div>
        </li>
	<?php
    }
}