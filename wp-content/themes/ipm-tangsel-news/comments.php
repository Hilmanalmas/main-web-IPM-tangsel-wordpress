<?php
/**
 * The template for displaying comments
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area" style="font-family: var(--font-body);">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title" style="font-family: var(--font-display); font-size: 1.75rem; font-weight: 700; margin-bottom: 24px; color: var(--text-main); display: flex; align-items: center; gap: 12px;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--secondary);"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
            <?php
            $comment_count = get_comments_number();
            if ( '1' === $comment_count ) {
                printf( esc_html__( '1 Komentar', 'ipm-tangsel' ) );
            } else {
                printf( esc_html__( '%1$s Komentar', 'ipm-tangsel' ), number_format_i18n( $comment_count ) );
            }
            ?>
        </h2>

        <ol class="comment-list" style="list-style: none; padding: 0; margin: 0 0 40px;">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
                'callback'    => 'ipm_custom_comment_callback' // We will define this inline or let WP do it then style it. Wait, let's just use WP default and style via CSS, or custom callback if we want tight HTML control. Better to use inline custom callback for full layout!
            ) );
            ?>
        </ol>

        <?php
        the_comments_navigation( array(
            'prev_text' => '<span class="nav-previous-text">&larr; ' . esc_html__( 'Komentar Terdahulu', 'ipm-tangsel' ) . '</span>',
            'next_text' => '<span class="nav-next-text">' . esc_html__( 'Komentar Selanjutnya', 'ipm-tangsel' ) . ' &rarr;</span>',
        ) );
        ?>

        <?php if ( ! comments_open() ) : ?>
            <p class="no-comments" style="padding: 16px; background: var(--bg-main); border-radius: 8px; text-align: center; color: var(--text-muted); font-weight: 500; font-size: 0.95rem;"><?php esc_html_e( 'Komentar telah ditutup.', 'ipm-tangsel' ); ?></p>
        <?php endif; ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );

    $fields = array(
        'author' => '<div class="comment-form-author" style="margin-bottom: 20px;"><label for="author" style="display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem;">' . __( 'Nama', 'ipm-tangsel' ) . ( $req ? ' <span class="required" style="color: red;">*</span>' : '' ) . '</label>' .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" placeholder="Masukkan nama..." style="width: 100%; padding: 12px 16px; border: 1px solid var(--border-light); border-radius: 8px; font-family: inherit; font-size: 0.95rem; outline: none; transition: border-color 0.2s;"' . $aria_req . $html_req . ' /></div>',
        'email'  => '<div class="comment-form-email" style="margin-bottom: 20px;"><label for="email" style="display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem;">' . __( 'Email', 'ipm-tangsel' ) . ( $req ? ' <span class="required" style="color: red;">*</span>' : '' ) . '</label>' .
                    '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" placeholder="Masukkan email..." style="width: 100%; padding: 12px 16px; border: 1px solid var(--border-light); border-radius: 8px; font-family: inherit; font-size: 0.95rem; outline: none; transition: border-color 0.2s;"' . $aria_req . $html_req  . ' /></div>',
    );

    $comments_args = array(
        'title_reply'          => '<span style="font-family: var(--font-display); font-size: 1.5rem; font-weight: 700; color: var(--text-main);">Tinggalkan Komentar</span>',
        'title_reply_to'       => '<span style="font-family: var(--font-display); font-size: 1.5rem; font-weight: 700; color: var(--text-main);">Balas ke %s</span>',
        'cancel_reply_link'    => __( 'Batal Balas', 'ipm-tangsel' ),
        'label_submit'         => __( 'Kirim Komentar', 'ipm-tangsel' ),
        'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" style="background: var(--primary); color: white; border: none; padding: 12px 24px; border-radius: 6px; font-family: var(--font-body); font-weight: 600; font-size: 1rem; cursor: pointer; transition: background 0.2s; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);">%4$s</button>',
        'submit_field'         => '<div class="form-submit" style="margin-top: 24px;">%1$s %2$s</div>',
        'comment_field'        => '<div class="comment-form-comment" style="margin-bottom: 20px;"><label for="comment" style="display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem;">' . _x( 'Komentar', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="6" maxlength="65525" required="required" placeholder="Tulis komentar Anda di sini..." style="width: 100%; padding: 16px; border: 1px solid var(--border-light); border-radius: 8px; font-family: inherit; font-size: 0.95rem; outline: none; transition: border-color 0.2s; resize: vertical;"></textarea></div>',
        'fields'               => $fields,
        'comment_notes_before' => '<p class="comment-notes" style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 20px;"><span id="email-notes">' . __( 'Alamat email Anda tidak akan dipublikasikan.', 'ipm-tangsel' ) . '</span></p>',
        'class_form'           => 'comment-form',
        'class_submit'         => 'submit',
    );
    ?>

    <div class="comment-respond-wrapper" style="background: var(--bg-main); padding: 32px; border-radius: 16px; border: 1px solid var(--border-light); margin-top: 40px;">
        <?php comment_form( $comments_args ); ?>
    </div>

</div><!-- #comments -->

<?php
/**
 * Add inline styling for injected comment list from wp_list_comments
 * We could use a callback, but inline CSS targeting default classes is easier
 */
?>
<style>
/* Modern styling for the default WordPress comment list */
.comment-list .comment {
    margin-bottom: 24px;
}
.comment-list .comment-body {
    background: white;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.02), 0 1px 2px rgba(0,0,0,0.04);
    border: 1px solid var(--border-light);
    position: relative;
}
.comment-list .comment-author {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 12px;
}
.comment-list .comment-author img.avatar {
    border-radius: 50%;
    width: 48px;
    height: 48px;
}
.comment-list .comment-author .fn {
    font-weight: 700;
    font-size: 1.05rem;
    color: var(--text-main);
}
.comment-list .comment-meta {
    font-size: 0.85rem;
    color: var(--text-muted);
}
.comment-list .comment-meta a {
    color: inherit;
    text-decoration: none;
}
.comment-list .comment-content {
    font-size: 1rem;
    line-height: 1.6;
    color: var(--text-main);
}
.comment-list .comment-content p:last-child {
    margin-bottom: 0;
}
.comment-list .reply {
    margin-top: 16px;
}
.comment-list .reply a {
    display: inline-block;
    padding: 6px 16px;
    background: rgba(0, 181, 42, 0.1);
    color: #00b52a;
    border-radius: 100px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.2s;
}
.comment-list .reply a:hover {
    background: #00b52a;
    color: white;
}
.comment-list .children {
    list-style: none;
    padding-left: 20px;
    border-left: 2px solid rgba(0, 181, 42, 0.2);
    margin-left: 24px;
    margin-top: 24px;
}
.comment-list .children .comment:last-child {
    margin-bottom: 0;
}

/* Comment form focused inputs */
#comment:focus,
#author:focus,
#email:focus,
#url:focus {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 3px rgba(0, 31, 63, 0.1);
}
.submit:hover {
    background: var(--primary-light) !important;
    transform: translateY(-2px);
}
</style>
