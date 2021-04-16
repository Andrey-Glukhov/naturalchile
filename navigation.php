<div class="container-fluid">
    <div class="row">
        <div class="col-5">

        </div>
        <div class="col-2">
            <div class="label"><img
                    src="http://localhost:8888/naturalchile/wordpress/wp-content/uploads/2021/04/logo-10.png" />
            </div>
        </div>
        <div class="col-5">
            <nav class="navbar navbar-expand-md">
                <button class="navbar-toggler menu-btn" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <div class="navbar-toggler-icon animated-icon1"> <span></span><span></span><span></span> </div>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03" style="padding:0;">

                    <?php
              wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'navbar-nav menu_wraper',
                'items_wrap' => '<div id="%1$s" class="nav-item %2$s">%3$s</div>',
                'item_spacing' => 'preserve'
              )
            );
            ?>

                </div>
            </nav>


        </div>

    </div>

</div>