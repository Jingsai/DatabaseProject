<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Schneider Electric');

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
  <title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Html->meta(array('name'=>'viewport', 'content'=>'width=device-width, initial-scale=1.0')); ?>
	<?php echo $this->Html->meta(array('name'=>'description', 'content'=>'jQuery Responsive Carousel - Owl Carusel')); ?>
    <link rel="shortcut icon" href="image/favicon.ico">

	<?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700'); ?>
	<?php echo $this->Html->css('bootstrapTheme'); ?>
	<!--<?php echo $this->Html->css('custom'); ?>-->

	<!-- Owl Carousel Assets -->
	<?php echo $this->Html->css('owl.carousel'); ?>
	<?php echo $this->Html->css('owl.theme'); ?>
	<!--<?php echo $this->Html->css('prettify'); ?>-->
</head>
<div id="top-nav" class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li>
                <?php if (AuthComponent::user('id')): ?>
                  <?php echo $this->Html->link(AuthComponent::user('username'),array('controller' => 'staticPages','action' => 'index'));?>
                  <?php else: ?>
                  <?php echo $this->Html->link('Login',array('controller' => 'users','action' => 'login'));?>
                <?php endif ?>
              </li>
              <li>
                <?php $group = json_decode(AuthComponent::user('group'));
                if (AuthComponent::user('id') && in_array("admin", $group)): ?>
                  <?php echo $this->Html->link('View Groups',array('controller' => 'users','action' => 'index'));?>
              <?php endif ?>
              </li>
              <li>
                <?php $group = json_decode(AuthComponent::user('group'));
                if (AuthComponent::user('id') && in_array("admin", $group)): ?>
                  <?php echo $this->Html->link('View Log', array('controller' => 'logs', 'action' => 'index')); ?>
                <?php endif ?>
              </li>
              <li>
                <?php $group = json_decode(AuthComponent::user('group'));
                if (AuthComponent::user('id') && (in_array("tagmembers", $group) || in_array("user", $group) || in_array("oe", $group))): ?>
                <?php echo $this->Html->link('View Tags',array('controller' => 'revisions','action' => 'index'));?>
              <?php endif ?>
              </li>
              <li>
                <?php if (AuthComponent::user('id')): ?>
                  <?php echo $this->Html->link('Logout',array('controller' => 'users','action' => 'Logout'));?>
                <?php endif ?>
              </li>
              <li>
                <?php if (AuthComponent::user('id')): ?>
                  <?php echo $this->Html->link('Print',array('controller' => 'prints','action' => 'printpage'));?>
                <?php endif ?>
              </li>
            </ul>
            <!--<ul class="nav pull-left">
            	<li><?php echo $this->Html->image('se_logo.gif'); ?></li>
            </ul>-->
            </div>
          </div>
        </div>
</div>

    <div id="container">
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
    </div>
	<?php echo $this->Html->script('jquery-1.9.1.min')?>
  <?php echo $this->Html->script('owl.carousel')?>

	<style>
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    </style>

    
    <script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
      navigation : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true
      });
    });
    </script>
    <?php echo $this->Html->script('bootstrap-collapse')?>
    <?php echo $this->Html->script('bootstrap-transition')?>
    <?php echo $this->Html->script('bootstrap-tab')?>
    <!--<?php echo $this->Html->script('prettify')?>-->
    <!--<?php echo $this->Html->script('application')?>-->

    <div id="footer">

      <footer style="text-align: center;">
        <p>&copy; 2014 Company, Inc. &middot; <a href="#" style="color:#32cd32">Privacy</a> &middot; <a href="#" style="color:#32cd32">Terms</a></p>
      </footer>
      
    </div> 
	<!--if you do not want to experience sql log, please uncomment the next line, by Jingsai-->
	<!--<?php echo $this->element('sql_dump'); ?>-->
</html>
