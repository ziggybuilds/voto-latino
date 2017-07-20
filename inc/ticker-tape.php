<?php
/* 
* 
* ticker-tape template file
*
*
*/
?>

<div class="ticker-tape" id="tickerTape">
	<div class="ticker-text">
		<?php if( get_field('ticker_tape_text', 'options') ): ?>
			<p><?php the_field('ticker_tape_text', 'options'); ?></p>
		<?php endif; ?>
	</div>
	<div class="ticker-close" id="tickerHide">
		<i class="fa fa-times" aria-hidden="true"></i>
	</div>
</div>