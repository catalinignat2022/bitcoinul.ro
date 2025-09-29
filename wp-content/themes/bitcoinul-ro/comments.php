<?php
/**
 * Template pentru afișarea comentariilor
 * Optimizat pentru comunitatea Bitcoin România
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area" style="margin-top: 3rem;">
    
    <?php if (have_comments()) : ?>
        
        <!-- Header comentarii -->
        <div class="comments-header" style="background: linear-gradient(135deg, var(--light-bg), #ffffff); padding: 2rem; border-radius: 15px; margin-bottom: 2rem; text-align: center; border-left: 4px solid var(--bitcoin-orange);">
            <h3 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.8rem; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                💬 
                <?php
                $comment_count = get_comments_number();
                if ($comment_count == 1) {
                    echo '1 comentariu';
                } else {
                    echo $comment_count . ' comentarii';
                }
                ?>
            </h3>
            <p style="color: var(--text-secondary); margin: 0; font-size: 1rem;">
                Participă la discuția despre Bitcoin și criptomonede! Împărtășește experiența ta cu comunitatea.
            </p>
        </div>

        <!-- Lista comentariilor -->
        <ol class="comment-list" style="list-style: none; padding: 0; margin: 0;">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'bitcoinul_ro_comment_template'
            ));
            ?>
        </ol>

        <!-- Navigația comentariilor -->
        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" style="margin: 2rem 0; text-align: center;">
                <div class="nav-links" style="display: flex; justify-content: space-between; align-items: center; gap: 1rem;">
                    <?php
                    if ($prev_link = get_previous_comments_link('← Comentarii anterioare')) {
                        echo '<div class="nav-previous" style="flex: 1; text-align: left;">' . $prev_link . '</div>';
                    } else {
                        echo '<div class="nav-previous" style="flex: 1;"></div>';
                    }
                    ?>
                    
                    <div class="comment-pages" style="color: var(--text-secondary); font-size: 0.9rem;">
                        Pagina <?php echo get_query_var('cpage') ? get_query_var('cpage') : 1; ?> din <?php echo get_comment_pages_count(); ?>
                    </div>
                    
                    <?php
                    if ($next_link = get_next_comments_link('Comentarii următoare →')) {
                        echo '<div class="nav-next" style="flex: 1; text-align: right;">' . $next_link . '</div>';
                    } else {
                        echo '<div class="nav-next" style="flex: 1;"></div>';
                    }
                    ?>
                </div>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <!-- Formularul de comentarii -->
    <?php if (comments_open()) : ?>
        
        <div class="comment-form-container" style="background: var(--white); padding: 2rem; border-radius: 15px; box-shadow: var(--shadow); margin-top: 2rem; border-left: 4px solid var(--bitcoin-orange);">
            
            <h3 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                ✍️ Lasă un comentariu
            </h3>
            
            <p style="color: var(--text-secondary); margin-bottom: 2rem; line-height: 1.6;">
                Ai o întrebare despre Bitcoin sau vrei să împărtășești experiența ta cu exchange-urile? 
                Comentariile tale ajută comunitatea să învețe mai multe!
            </p>

            <?php
            $comment_form_args = array(
                'title_reply' => '',
                'title_reply_to' => 'Răspunde la %s',
                'title_reply_before' => '',
                'title_reply_after' => '',
                'cancel_reply_link' => 'Anulează răspunsul',
                'cancel_reply_before' => ' <small>',
                'cancel_reply_after' => '</small>',
                'label_submit' => 'Publică comentariul',
                'submit_button' => '<button type="submit" name="%1$s" id="%2$s" class="%3$s" style="background: linear-gradient(135deg, var(--bitcoin-orange), var(--bitcoin-dark)); color: white; padding: 1rem 2rem; border: none; border-radius: 25px; font-weight: 600; cursor: pointer; font-size: 1rem; transition: all 0.3s ease; min-width: 200px;">%4$s</button>',
                'comment_field' => '<div style="margin-bottom: 1.5rem;">
                    <label for="comment" style="display: block; color: var(--text-primary); font-weight: 600; margin-bottom: 0.5rem;">
                        Comentariul tău <span style="color: var(--warning-red);">*</span>
                    </label>
                    <textarea id="comment" name="comment" rows="6" required style="width: 100%; padding: 1rem; border: 2px solid var(--border-light); border-radius: 10px; font-family: inherit; font-size: 1rem; line-height: 1.6; resize: vertical; outline: none; transition: border-color 0.3s ease;" placeholder="Scrie aici întrebarea sau experiența ta cu Bitcoin și exchange-urile..." onfocus="this.style.borderColor=\'var(--bitcoin-orange)\'" onblur="this.style.borderColor=\'var(--border-light)\'"></textarea>
                    <small style="color: var(--text-secondary); font-size: 0.9rem;">
                        💡 Sfat: Fii specific și constructiv în comentarii. Evită promovarea de scam-uri sau linkuri suspecte.
                    </small>
                </div>',
                'fields' => array(
                    'author' => '<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <div>
                            <label for="author" style="display: block; color: var(--text-primary); font-weight: 600; margin-bottom: 0.5rem;">
                                Numele tău <span style="color: var(--warning-red);">*</span>
                            </label>
                            <input id="author" name="author" type="text" required style="width: 100%; padding: 0.8rem; border: 2px solid var(--border-light); border-radius: 10px; font-size: 1rem; outline: none; transition: border-color 0.3s ease;" placeholder="Ex: Andrei" onfocus="this.style.borderColor=\'var(--bitcoin-orange)\'" onblur="this.style.borderColor=\'var(--border-light)\'">
                        </div>',
                    'email' => '<div>
                            <label for="email" style="display: block; color: var(--text-primary); font-weight: 600; margin-bottom: 0.5rem;">
                                Email-ul tău <span style="color: var(--warning-red);">*</span>
                            </label>
                            <input id="email" name="email" type="email" required style="width: 100%; padding: 0.8rem; border: 2px solid var(--border-light); border-radius: 10px; font-size: 1rem; outline: none; transition: border-color 0.3s ease;" placeholder="Ex: andrei@email.com" onfocus="this.style.borderColor=\'var(--bitcoin-orange)\'" onblur="this.style.borderColor=\'var(--border-light)\'">
                            <small style="color: var(--text-secondary); font-size: 0.8rem;">Nu va fi afișat public</small>
                        </div>
                    </div>',
                    'url' => '<div style="margin-bottom: 1.5rem;">
                        <label for="url" style="display: block; color: var(--text-primary); font-weight: 600; margin-bottom: 0.5rem;">
                            Site-ul tău (opțional)
                        </label>
                        <input id="url" name="url" type="url" style="width: 100%; padding: 0.8rem; border: 2px solid var(--border-light); border-radius: 10px; font-size: 1rem; outline: none; transition: border-color 0.3s ease;" placeholder="https://example.com" onfocus="this.style.borderColor=\'var(--bitcoin-orange)\'" onblur="this.style.borderColor=\'var(--border-light)\'">
                    </div>',
                ),
                'comment_notes_before' => '<div style="background: rgba(247, 147, 26, 0.1); padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem; border-left: 4px solid var(--bitcoin-orange);">
                    <h4 style="color: var(--bitcoin-orange); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                        📋 Reguli pentru comentarii
                    </h4>
                    <ul style="color: var(--text-secondary); line-height: 1.6; margin: 0; padding-left: 1.5rem;">
                        <li>Respectă ceilalți membrii ai comunității</li>
                        <li>Nu posta linkuri către exchange-uri neautorizate</li>
                        <li>Evită promovarea de scheme Ponzi sau scam-uri</li>
                        <li>Comentariile cu spam vor fi șterse automat</li>
                        <li>Fii constructiv și ajută comunitatea să învețe</li>
                    </ul>
                </div>',
                'comment_notes_after' => '<div style="margin-top: 1rem;">
                    <small style="color: var(--text-secondary); line-height: 1.6;">
                        🔒 <strong>Confidențialitate:</strong> Email-ul tău nu va fi afișat public și nu va fi partajat cu terți. 
                        Folosim aceste informații doar pentru a-ți răspunde la comentarii.
                    </small>
                </div>',
            );
            
            comment_form($comment_form_args);
            ?>
            
        </div>

    <?php elseif (!comments_open() && have_comments()) : ?>
        
        <!-- Mesaj când comentariile sunt închise -->
        <div style="background: var(--light-bg); padding: 2rem; border-radius: 15px; text-align: center; margin-top: 2rem; border-left: 4px solid var(--text-secondary);">
            <div style="font-size: 2rem; margin-bottom: 1rem;">🔒</div>
            <h3 style="color: var(--text-primary); margin-bottom: 1rem;">Comentariile sunt închise</h3>
            <p style="color: var(--text-secondary); margin: 0;">
                Comentariile pentru acest articol au fost dezactivate, dar poți citi cele existente mai sus.
            </p>
        </div>

    <?php endif; ?>

</div><!-- #comments -->

<?php
/**
 * Template personalizat pentru afișarea comentariilor individuale
 */
function bitcoinul_ro_comment_template($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>
    
    <li <?php comment_class('comment-item'); ?> id="comment-<?php comment_ID(); ?>" style="margin-bottom: 2rem; background: var(--white); border-radius: 15px; box-shadow: var(--shadow); overflow: hidden; border-left: 4px solid <?php echo $depth > 1 ? 'var(--success-green)' : 'var(--bitcoin-orange)'; ?>;">
        
        <article class="comment-body" style="padding: 2rem;">
            
            <!-- Header comentariu -->
            <header class="comment-meta" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap;">
                
                <!-- Avatar -->
                <div class="comment-avatar" style="flex-shrink: 0;">
                    <?php 
                    $avatar = get_avatar($comment, 50, '', '', array(
                        'style' => 'border-radius: 50%; border: 3px solid var(--bitcoin-orange);'
                    ));
                    echo $avatar ?: '<div style="width: 50px; height: 50px; background: var(--bitcoin-orange); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 1.2rem;">' . strtoupper(substr(get_comment_author(), 0, 1)) . '</div>';
                    ?>
                </div>
                
                <!-- Info autor -->
                <div class="comment-author-info" style="flex: 1;">
                    <div class="comment-author" style="font-weight: 600; color: var(--text-primary); font-size: 1.1rem;">
                        <?php
                        $author_url = get_comment_author_url();
                        if ($author_url) {
                            echo '<a href="' . esc_url($author_url) . '" target="_blank" rel="noopener" style="color: inherit; text-decoration: none;">' . get_comment_author() . '</a>';
                        } else {
                            echo get_comment_author();
                        }
                        ?>
                        
                        <!-- Badge pentru autor articol -->
                        <?php if (get_comment_author_email() == get_the_author_meta('email')) : ?>
                            <span style="background: var(--bitcoin-orange); color: white; padding: 0.2rem 0.6rem; border-radius: 10px; font-size: 0.7rem; margin-left: 0.5rem; text-transform: uppercase; font-weight: 600;">
                                ✍️ Autor
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="comment-metadata" style="color: var(--text-secondary); font-size: 0.9rem; display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                        <time datetime="<?php comment_time('c'); ?>" style="display: flex; align-items: center; gap: 0.3rem;">
                            🕒 
                            <?php
                            $time_diff = human_time_diff(get_comment_time('U'), current_time('timestamp'));
                            echo sprintf('acum %s', $time_diff);
                            ?>
                        </time>
                        
                        <?php if ($depth > 1) : ?>
                            <span style="display: flex; align-items: center; gap: 0.3rem; color: var(--success-green); font-weight: 500;">
                                ↳ Răspuns
                            </span>
                        <?php endif; ?>
                        
                        <!-- Status comentariu -->
                        <?php if ($comment->comment_approved == '0') : ?>
                            <span style="color: var(--warning-red); font-weight: 500; display: flex; align-items: center; gap: 0.3rem;">
                                ⏳ În așteptare moderare
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Acțiuni comentariu -->
                <div class="comment-actions" style="display: flex; gap: 0.5rem;">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => '💬',
                        'before' => '',
                        'after' => ''
                    )), $comment->comment_ID);
                    ?>
                    
                    <?php if (current_user_can('moderate_comments')) : ?>
                        <a href="<?php echo admin_url('comment.php?action=editcomment&c=' . $comment->comment_ID); ?>" 
                           style="color: var(--text-secondary); text-decoration: none; padding: 0.3rem; border-radius: 3px; transition: background 0.3s ease;"
                           title="Editează comentariul">
                            ✏️
                        </a>
                    <?php endif; ?>
                </div>
                
            </header>
            
            <!-- Conținutul comentariului -->
            <div class="comment-content" style="color: var(--text-primary); line-height: 1.6; font-size: 1rem;">
                <?php comment_text(); ?>
            </div>
            
            <!-- Footer comentariu cu acțiuni suplimentare -->
            <footer class="comment-footer" style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
                
                <div class="comment-reply" style="flex: 1;">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => 'Răspunde la acest comentariu',
                        'before' => '',
                        'after' => ''
                    )), $comment->comment_ID);
                    ?>
                </div>
                
                <!-- Permalink către comentariu -->
                <div class="comment-permalink">
                    <a href="<?php echo get_comment_link(); ?>" 
                       style="color: var(--text-secondary); text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 0.3rem;"
                       title="Link permanent către acest comentariu">
                        🔗 Link
                    </a>
                </div>
                
            </footer>
            
        </article>
        
    <?php
    // Nu închidem </li> aici pentru că WordPress se ocupă de asta
}
?>

<!-- CSS pentru comentarii -->
<style>
/* Stiluri pentru formularul de comentarii */
.comment-form button:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(247, 147, 26, 0.4);
}

/* Stiluri pentru comentariile threaded */
.comment-list .children {
    margin-top: 1rem;
    margin-left: 2rem;
    padding-left: 1rem;
    border-left: 2px solid var(--border-light);
}

.comment-list .children .comment-item {
    border-left-color: var(--success-green) !important;
}

/* Hover effects pentru comentarii */
.comment-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
}

.comment-actions a {
    padding: 0.3rem;
    border-radius: 3px;
    transition: background 0.3s ease;
}

.comment-actions a:hover {
    background: rgba(247, 147, 26, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .comment-list .children {
        margin-left: 1rem !important;
        padding-left: 0.5rem !important;
    }
    
    .comment-meta {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 0.5rem !important;
    }
    
    .comment-footer {
        flex-direction: column !important;
        align-items: flex-start !important;
    }
    
    .comment-form-container {
        padding: 1.5rem !important;
    }
}

@media (max-width: 480px) {
    .comment-item {
        margin-bottom: 1.5rem !important;
    }
    
    .comment-body {
        padding: 1.5rem !important;
    }
    
    .comment-author-info .comment-metadata {
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 0.3rem !important;
    }
}
</style>