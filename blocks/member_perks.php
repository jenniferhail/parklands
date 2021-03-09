<?php //include(locate_template('blocks/modules/layout_spacing.php')); ?>
<?php 

    $member_names = array();
    // get the textarea value from options page without any formatting
    $member_levels = get_field('member_levels', 'option', false);
    foreach($member_levels as $member_level) {
        foreach($member_level as $level => $value) {
            if($level == 'field_5fa596d88fa04') {
                array_push($member_names, strip_tags($value));
            }
        }
    }

?>

<section id="<?php the_field( 'member_perks_block_id', 'option' ); ?>" class="block chart">
    <div class="wrapper">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <?php if ( have_rows( 'member_levels', 'option' ) ) : ?>
                            <?php while ( have_rows( 'member_levels', 'option' ) ) : the_row(); ?>
                                <th>
                                    <h2 class="title"><?php the_sub_field( 'title' ); ?></h2>
                                    <span class="subtitle"><?php the_sub_field( 'subtitle' ); ?></span>
                                </th>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                <?php if ( have_rows( 'member_perks', 'option' ) ) : ?>
                    <?php while ( have_rows( 'member_perks', 'option' ) ) : the_row(); ?>
                        <tr>
                            <th><?php the_sub_field( 'perk_name' ); ?></th>
                            <?php $member_perk = get_sub_field( 'member_perk' ); ?>
                            <?php if ( $member_perk ) : ?>
                                <?php foreach( $member_names as $name) : ?>
                                    <?php if(!in_array($name, $member_perk)) : ?>
                                        <td></td>
                                    <?php else : ?>
                                        
                                            <td><span class="visually-hide-text"><?php echo strip_tags(get_sub_field( 'perk_name' )); ?></span><img class="img" src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/leaf.png" alt="Leaf"></td>
                                        
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                </tbody>
            </table>
            <?php if(get_field('footnotes', 'option')) : ?>
                <div class="footnotes">
                    <?php the_field('footnotes', 'option'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>