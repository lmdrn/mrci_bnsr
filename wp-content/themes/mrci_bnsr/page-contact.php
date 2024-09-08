<?php 

/**
 * Template Name: Page type contact
 **/

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="ortho-contact-location">
        <div class="di__container-big di__padding-small di__flex-start-center">
            <?php
                if( have_rows('pointer_list') ): $i = 0;
                    while( have_rows('pointer_list') ) : the_row();  ?>
                    <div class="el__canton">
                        <?php
                            if( $posts ): $i++; ?>
                                <div class="canton ortho-contact-location-link <?php echo $i; ?>">
                                   <a href="#address" class="ge__turquoise-link"><?= get_sub_field('location'); ?></a> 
                                </div> 
                        <?php endif; ?>
                        <div class="succursales">
                            <?php
                            if( have_rows('succursales') ): 
                                while( have_rows('succursales') ) : the_row();  ?>
                                    <div class="ortho-contact-location-link" >
                                    <p><?= get_sub_field('adresse'); ?></p> 
                                    </div> 
                                <?php endwhile;
                            endif;
                            ?> 
                        </div>
                    </div>
                    <?php endwhile;
                endif;
            ?> 
        </div>
        <div  id="address" class="ortho-contact-location-map">
            <div id='map' style='width: 100%; height: 560px;'></div>
        </div>
        <div class="succursale-container active">
            <?php
            if( have_rows('succursales_infos') ):
                while( have_rows('succursales_infos') ) : the_row();  ?>
            <div class="di__section-accent mb-1 succursales-contact <?= get_sub_field('canton'); ?>">
                <div class="di__container-small ortho-contact-infos" style="padding-top: 30px;">
                    <div class="ortho-contact-infos-adress">
                        <p style="font-weight:bold;">Orthoconcept <span style="font-size:10px;color:var(--accent-color);"><?php the_sub_field("old_name_seo") ?></span></p>
                        <?php 
                            $adresse = get_sub_field('adresse');
                            if( $adresse ) {
                                echo the_sub_field('adresse');
                            } 
                        ?> 
                    </div>
                    <div class="ortho-contact-infos-contact">
                            <div class="ortho-contact-infos-schedules">
                                <?php 
                                    $horaires = get_sub_field('horaires');
                                    if( $horaires ) {
                                        echo the_sub_field('horaires');
                                    } 
                                ?> 
                            </div>
                            <div class="ortho-contact-infos-rdv">
                                <?php 
                                    $link = get_sub_field('rdv_btn');
                                        if( $link ): 
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="el__btn el__btn-main" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                <?php endif; ?>
                            </div>
                    </div>
                    <div class="ortho-contact-infos-services">
                        <?php $services = get_sub_field('services'); ?>
                        <?php if( $services && in_array('ortho', $services) ) :
                            if (get_locale() == 'de_DE') { ?>
                                <a class="ortho-contact-picto" href="<?php echo site_url('/de/service/orthopaedie/'); ?>">
                                    <div class="contact-img di__flex-center">
                                        <img src="<?= get_template_directory_uri()?>/assets/imgs/ortho.png" alt="orthopédie">
                                    </div>
                                </a>
                            <?php } else { ?>
                                <a class="ortho-contact-picto" href="<?php echo site_url('/service/orthopedie/'); ?>">
                                    <div class="contact-img di__flex-center">
                                        <img src="<?= get_template_directory_uri()?>/assets/imgs/ortho.png" alt="orthopédie">
                                    </div>
                                </a>
                            <?php } ?>
                        <?php endif; ?>
                        <?php $services = get_sub_field('services'); ?>
                        <?php if( $services && in_array('rehab', $services) ) :
                            if (get_locale() == 'de_DE') { ?>
                                <a class="ortho-contact-picto"  href="<?php echo site_url('/de/service/rehabilitation/'); ?>">
                                    <div class="contact-img di__flex-center">
                                        <img src="<?= get_template_directory_uri()?>/assets/imgs/rehab_logo.png" alt="rehabilitation">
                                    </div>
                                </a>
                            <?php } else { ?>
                                <a class="ortho-contact-picto"  href="<?php echo site_url('/service/rehabilitation/'); ?>">
                                    <div class="contact-img di__flex-center">
                                        <img src="<?= get_template_directory_uri()?>/assets/imgs/rehab_logo.png" alt="rehabilitation">
                                    </div>
                                </a>
                            <?php } ?>
                        <?php endif; ?>
                        <?php $services = get_sub_field('services'); ?>
                        <?php if( $services && in_array('pied', $services) ) :
                            if (get_locale() == 'de_DE') { ?>
                                <a class="ortho-contact-picto"  href="<?php echo site_url('/de/service/fuesse-schuhe/'); ?>">
                                    <div class="contact-img di__flex-center">
                                        <img src="<?= get_template_directory_uri()?>/assets/imgs/pied_logo.png" alt="pied/chaussure">
                                    </div>
                                </a>
                            <?php } else { ?>
                                    <a class="ortho-contact-picto"  href="<?php echo site_url('/service/pied-chaussure/'); ?>">
                                        <div class="contact-img di__flex-center">
                                            <img src="<?= get_template_directory_uri()?>/assets/imgs/pied_logo.png" alt="pied/chaussure">
                                        </div>
                                    </a>
                            <?php } ?>
                        <?php endif; ?>
                        <?php $services = get_sub_field('services'); ?>
                        <?php if( $services && in_array('comp', $services) ) :
                            if (get_locale() == 'de_DE') { ?>
                                <a class="ortho-contact-picto" href="<?php echo site_url('/de/service/kompressionstherapie'); ?>">
                                    <div class="contact-img di__flex-center">
                                        <img src="<?= get_template_directory_uri()?>/assets/imgs/comp.png" alt="compression">
                                    </div>
                                </a>
                            <?php } else { ?>
                                <a class="ortho-contact-picto" href="<?php echo site_url('/service/compression-medicale/'); ?>">
                                    <div class="contact-img di__flex-center">
                                        <img src="<?= get_template_directory_uri()?>/assets/imgs/comp.png" alt="compression">
                                    </div>
                                </a>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
                    <?php endwhile;
                endif;
                ?> 
            </div>
        </div>
    </div>
    <div class="di__container-small di__padding-basic">
        <div class="ortho-contact-form" id="form">
            <?php
                // Returns an Form Model for Form ID 1
                 Ninja_Forms()->display(2);
            ?>
        </div>
    </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
