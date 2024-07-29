<?php ?>
<div class="sidebar-widget search">
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ) ?>">
    <input type="text" placeholder="поиск" class="form-control" value="<?php echo get_search_query() ?>" name="s" id="s">
<!--    <i class="fa fa-search"></i>-->
<!--<input type="submit" id="searchsubmit" class="form-control" value="найти" />-->
<button type="submit" class="searchform-button"><i class="fa fa-search"></i></button>
<!--    <i class="fa fa-search"></i>-->
</form>
</div>