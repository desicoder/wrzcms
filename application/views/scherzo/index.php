<?php $this->load->view('scherzo/header'); ?>
<title>{maintitle}</title>	
</head>
	<body class="home blog">
	
		<div id="wrapper">
	
			<header id="site-header" role="banner">
				<hgroup id="branding">
					
					<h1 id="site-title">{maintitle}</h1>					
					<h2 id="tag">{maindescription}</h2>
					
				</hgroup>
				
			</header>
			<div id="content" role="main">

{index}
<article class="post-{id} post type-post hentry">
<header class="entry-header">
<h1 class="entry-title"><a href="<?php $this->config->site_url();?>/download/{permaurl}" rel="archive">{title}</a></h1>				
<div class="entry-meta">	
<p><time datetime="{pubdate}" pubdate>{pubdate}</time></p>
</div>	
</header>
<div class="entry-summary"><p></p>	
</div>		
</article>
{/index}


<nav class="pagination">

	<?echo $this->pagination->create_links();	?>	       
	    <p class="next"></p>
	    <p class="previous"></p>
   
</nav>
</div> <!-- end content -->


<?php $this->load->view('scherzo/indexsidebar'); ?>
<?php $this->load->view('scherzo/footer'); ?>




