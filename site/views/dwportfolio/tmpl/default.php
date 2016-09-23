<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_dwportfolio
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file

defined('_JEXEC') or die('Restricted access');
?>

<?php
	$params  = $this->params;
	$cols = 4;
	$bt = 12/$cols;
?>

<div class="item-page" itemtype="https://schema.org/Article" itemscope="">
<meta content="en-GB" itemprop="inLanguage">
	<div itemprop="articleBody">
	
		<div class="spacer " style="height:40px;"></div>
		<div class="clearfix"></div>
		
		<?php if ($this->params->get('show_page_heading')) : ?>
			<h1 class="fancy-title text-center  animation fadeInUp animation-active">
				<span><?php echo $this->escape($this->params->get('page_heading')); ?></span>
			</h1>
		<?php endif; ?>

		<ul id="filters" class="option-set">
			<li>
				<a class="filter selected" data-filter="*" href="">All</a>
			</li>
			<?php foreach($this->filters as $filter): ?>
			<li>
				<a class="filter" data-filter=".<?php echo $filter->alias;?>" href=""><?php echo $filter->title;?></a>
			</li>	
			<?php endforeach;?>
		</ul>
		
		<div class="portfolio-grid portfolio-<?php echo $cols;?>-cols">
			<?php $items = array_chunk($this->items, $cols); ?>
			<?php $i = 0; ?>
			
			<?php foreach($items as $row): ?>
				
				<?php foreach($this->items as $item): ?>
					<?php $animation = ($i%2 == 0) ? 'fadeInLeft' : 'fadeInRight'; ?>
					<div class="element isotope-item <?php echo $item->category_alias;?> transition" data-category="<?php echo $item->category_alias;?>">
						<div class="element-inner animation fadeInLeft">
							<div class="overlay-wrapper">
								<img width="1200" height="900" alt="Portfolio 1" src="<?php echo $item->image;?>">                                  
                                   	<div class="overlay-wrapper-content">
                                	<div class="overlay-title"><h3><?php echo $item->title;?></h3></div>
                                   	<div class="overlay-details">
                                 		<a data-lightbox="image" href="#" class="color-white"><span class="livicon" data-n="plus"  data-color="#ffffff" data-hovercolor="#ffffff" data-op="1" data-onparent="true"></span></a>
										<a href="projects-single.html" class="color-white"><span class="livicon" data-n="more"  data-color="#ffffff" data-hovercolor="#ffffff" data-op="1" data-onparent="true"></span></a>                                    	
                                    </div>
                                 	<div class="overlay-bg"></div>
                               	</div>
                            </div>
						</div>
					</div>
				<?php endforeach;?>
				<?php $i++; ?>
			<?php endforeach;?>
		</div>

	</div>
</div>