<?php session_start(); /* Starts the session */

	if(!isset($_SESSION['UserData']['Username'])){
		header("location:login.php");
		exit;
	}

	# Get the pagelist
	$pagelist_href = $_SERVER["DOCUMENT_ROOT"]."/tnphp/php/content/pagelist.xml";
	$pagelist = simplexml_load_file($pagelist_href);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>

	<link rel="stylesheet" href="css/admin.css"/>
</head>

<body>
	<header class="content-width">
		<h1>Hey, there!</h1>
		<h2>Welcome to your admin panel!</h2>
		<hr>
	</header>

	<main class="content-width">
		<form action="" method="get">
			<select name="page">
				<?php
					foreach($pagelist->children() as $child) {
						echo '<option value="'.$child->content.'">'.$child->name.'</option>';
					}
				?>
			</select>
			<input type="submit" value="Edit"/>
		</form>

		<form action="" method="post">
			<?php
				# Content has been submitted. Put it before editing again.
				if (isset($_POST["content"])) {
					file_put_contents($_SERVER["DOCUMENT_ROOT"]."/tnphp".$_GET["page"], $_POST["content"]);
					print("Content edited! Check out your page <a href=''>here</a>!");
				} 

				# If no page is set for editing, announce that
				if (!isset($_GET["page"])) {
					echo "You haven't chosen a page you want to edit, yet! Select one of them from the dropdown and hit 'Edit'.";
				} 

				# Edit content
				else {
					# Get the page content
					$content = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/tnphp".$_GET["page"])
					or print (
						"<br>Couldn't read the content file, oh no! 
						You should definitely contact me about this.
						<br>Email: <a href='mailto:jack@thatnaughtypanda.com?subject=Admin Panel Unable to Read File'>jack@thatnaughtypanda.com</a><br><br>"
					);

					# Create a textarea with that content in place ?>
					<textarea name="content"><?php echo $content; ?></textarea><br>
					<input type="submit" value="Set"/>
			<?php } ?>
		</form>

		<!-- Helpful editing information -->
		<hr>
		<h3>How to Edit Your Content</h3>
		<p>
			The content of your page is made up of HTML code. Most of this code I've written for you as the design of your site, but certain bits of it you may want to change.<br>
			In this section I'll guide you through doing some minimalist HTML code editing.
		</p>
		<p>
			To make certain text look a certain way, you need to surround it in "tags."<br>
			These include:
			&lt;p&gt; for paragraphs,
			&lt;h1&gt; for big heading-text
			etc. Whichever you choose, you use them like this:<br><br>
			&lt;p&gt;This is paragraph text!&lt;/p&gt;<br><br>
			Below I'll show you what each tag makes text look like. Generally, you'll just need to use the p tag.<br>
			Get as fancy as you want. Just be sure to keep checking up on your website to make sure it looks okay!<br>
			If ever you get into trouble and want to reset back into what it originally was, hit the reset button and it'll go back to what I made it in the first place.
		</p>
	</main>
	
	<footer class="content-width">
		<hr>
		<a href="logout.php">Logout</a><br><br>
		Support Email: <a href="mailto:jack@thatnaughtypanda.com?subject=Admin Panel Support">jack@thatnaughtypanda.com</a>
	</footer>
</body>

</html>