<div class="social share">
    <button class="label">Share</button>
    <ul class="social-menu">
        <li class="menu-item"><a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><span class="visually-hide-text">Facebook</span><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
        <li class="menu-item"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>" target="_blank"><span class="visually-hide-text">Twitter</span><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
        <li class="menu-item"><a href="mailto:?subject=<?php the_title(); ?>&body=Check this out! <?php the_permalink(); ?>" target="_blank" title="Send email"><span class="visually-hide-text">Email</span><i class="fas fa-envelope" aria-hidden="true"></i></a></li>
    </ul>
</div>