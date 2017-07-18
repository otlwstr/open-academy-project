<?php /* save this file as searchform.php in you theme folder

place this code anywhere you want the search form to appear
<?php get_search_form() ;?> */
;?>
<form id="searchBox" role=”search” method=”get” class=’form-inline navbar-search searchform’ action=”<?php echo home_url( ‘/’ ); ?>”>
<div class=”input-append”>
<input type=”text” class=”span8″ name=”s” id=”search” placeholder=”Search…” value=”<?php the_search_query(); ?>” />
<button class=”btn” type=”submit”>Go!</button>
</div>
</form>