<?php if(ALETHEME_DESIGN_STYLE == 'bebe'){ ?>
    <form id="search" method="get" action="<?php echo esc_url(site_url());?>">
                <input class="search-inp" type="text" name="s" id="s" value="<?php echo get_search_query(); ?>" size="21" maxlength="120" placeholder="<?php esc_attr_e('Search', 'ale')?>">
                <input class="search-btn" type="submit" value="">
    </form>
<?php } else { ?>
    <form class="search"method="get" id="searchform" action="<?php echo esc_url(site_url());?>" >
        <fieldset>
            <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Type here...', 'ale')?>" />
            <input type="submit" id="searchsubmit" class="headerfont" value="<?php esc_attr_e('Search', 'ale')?>" />
        </fieldset>
    </form>
<?php } ?>