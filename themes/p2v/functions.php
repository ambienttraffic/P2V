<?php 
function typekit_ref() { ?>
 
  	<script type="text/javascript" src="http://use.typekit.com/lpk3tpj.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
<?php }
 
add_action('wp_head', 'typekit_ref');
?>