<?php /** @package WordPress @subpackage Default_Theme  **/
header("Access-Control-Allow-Origin: *"); 
?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>eBook Catalog</title>
      <meta name="description" content="Website description">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />
      <?php wp_head();?>
    </head>
  <body>
    <div class="header-container">
      <header class="wrapper clearfix">
        <h1 class="title">eBook Catalog</h1>      
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Books</a></li>
            <li><a href="#">About</a></li>
          </ul>
        </nav>
      </header>
    </div>
    
    <section id="welcome">				
		<div>					
			<span class="title">Welcome to eBook Catalog</span>
			<p class="textPara">
	Choose among free epub and Kindle eBooks, download them or read them online. <br>
	You will find the world's great literature here, with focus on older works <br>
	for which U.S. copyright has expired. <br> 
			</p>
		</div> 
	</section>
