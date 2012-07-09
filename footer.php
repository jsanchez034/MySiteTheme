
  </div><!-- /#wrap -->

  <?php roots_footer_before(); ?>
  <footer id="content-info" class="<?php echo WRAP_CLASSES; ?>" role="contentinfo">
    <?php roots_footer_inside(); ?>
	<div class="row">
		<div class="span2">
			<div class="clearfix"><a href="http://twitter.com/#!/J_pizzl3/" target="_blank" rel="tooltip" class="socialm twit" data-original-title="@J_pizzl3">@J_pizzl3</a></div>
			<div><a href="http://plus.google.com/115727503355423083357" target="_blank" rel="tooltip" class="socialm gplus" data-original-title="JonPierre Sanchez">@J_pizzl3</a></div>
		</div>
		<div class="span4"><?php dynamic_sidebar('sidebar-footer-pri'); ?></div>
		<div class="span3"><?php dynamic_sidebar('sidebar-footer-sec'); ?></div>
		<div class="span3"><?php dynamic_sidebar('sidebar-footer-thd'); ?></div>
	</div>
	<div class="row clearfix">
		<p class="copy"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></small></p>
	</div>
  </footer>
  
  <div class="modal hide fade in" id="contactme">
    <div class="modal-header">
      <h3>Contact Me</h3>
	  <p>Please fill out the form below and hit send!</p>
    </div>
	<div class="modal-body">
	  <form id="contme" class="form-vertical">
	    <div class="control-group">
		  <label>Name</label>
	      <input name="name" type="text" class="span2" placeholder="Your Name">
		  <span class="help-inline hide"></span>
		</div>
		<div class="control-group">
	      <label>Email</label>
	      <input name="email" type="text" class="span3" placeholder="Your Email">
		  <span class="help-inline hide"></span>
		</div>
		<div class="control-group">
	      <label>Message</label>
	      <textarea name="message" class="input-xlarge" rows="4"></textarea>
		</div>
	  </form>
	</div>
	<div class="modal-footer">
		<button id="contsub" type="submit" class="btn btn-large btn-primary" data-loading-text="Sending...">Send</button>
		<button type="button" class="btn btn-large" data-dismiss="modal">Close</button>
	</div>
  </div>

  <?php roots_footer_after(); ?>

  <?php wp_footer(); ?>
  <?php roots_footer(); ?>

</body>
</html>