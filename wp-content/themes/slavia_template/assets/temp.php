<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'slavia_template' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="site-branding">
            <?php
            the_custom_logo();
            if ( is_front_page() && is_home() ) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
            endif;
            $slavia_template_description = get_bloginfo( 'description', 'display' );
            if ( $slavia_template_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $slavia_template_description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'slavia_template' ); ?></button>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
