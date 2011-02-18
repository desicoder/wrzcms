<?php $this->load->view('scherzo/header'); ?>
  <title><?=$post['title'];?></title>
</head>
<div id="wrapper">
	
			<header id="site-header" role="banner">
			
				<hgroup id="branding">
					
					<h1 id="site-title"><a href=".." rel="index" title="Go to home page"><?php echo $maintitle; ?></a></h1>				
					<h2 id="tag"><?php echo $maindescription; ?></h2>

					
				</hgroup>
				
			</header>
<div id="content" role="main">
<article class="post-<?=$post['id'];?> post type-post hentr">
		<header class="entry-header">
			<h1 class="entry-title"><?=$post['title'];?></h1>
			<div class="entry-meta">

				<p><time datetime="<?php echo $post['pubdate'];?>" pubdate><?php echo $post['pubdate'];?></time>. <a href="#comments">Comments</a>.</p>
				
			</div>
			
		</header>
			
		<div class="entry-content">
	<p>	
<?=$post['body'];?>
</p>
<p>
<?=$post['filehosts'];?>
<p>
</div>
<footer class="entry-footer">
			<p></p>
				
			</nav>

			<nav class="pagination">
							
						
					
			</nav>



<div id="comments">
			
							
				

							</div><!-- #respond -->
										
			</div>
			
		</footer>
		
	</article>

	

</div> <!-- end content -->
		<?php $this->load->view('scherzo/postsidebar'); ?>

		<?php $this->load->view('scherzo/footer'); ?>
		
		</div> <!-- end wrapper ID -->
		
				
	</body>
	
</html>
