<?php

function vistro_default_footer() {
    ?>
	 <footer class="vst-footer-1-area bg-default tx-footer">
		<div class="vst-footer-1-copyright">
			<span class="text"><?php if(function_exists('vistro_copyright_text')) {vistro_copyright_text();} ?></span>
		</div>
    </footer>
<?php

}