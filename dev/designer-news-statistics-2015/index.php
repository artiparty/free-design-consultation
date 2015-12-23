<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Designer News Statistics of 2015</title>
	<meta name="viewport" content="width=980">

	<link rel="stylesheet" href="main.css">

</head>
<body>

<?php

include('functions.php');

?>

<div class="wrapper">

	<header class="header">

		<h1 class="logo"><span class="logo__inner"><img src="img/logo.png" alt="Designer News Statistics" class="logo__image"></span></h1>

		<p class="updated">Updated 20.12.15</p><!-- .updated -->

		<h1 class="site-title">Designer News Statistics of 2015</h1><!-- .site-title -->

		<p class="text">
			<a href="https://www.designernews.co">Designer News</a> is my main source of professional news and my favourite community. My <a href="http://dashinsky.com/designer-news-statistics/">statistics for DN</a> got lots of love so I decided to make a short report about what and who was hot on DN in 2015. Thanks for being part of DN!
		</p><!-- .text -->

	</header><!-- .header -->

	<div class="main">

		<section class="section">
			<h2 class="section__title"><span class="section__title-inner">DN Overview of 2015</span></h2>

			<div class="section__content">
				<ul class="overview">
					<li class="overview__item">
						<span class="overview__item-icon overview__item-icon--posts"></span>
						<span class="overview__count" id="overview-posts" data-count="18439">0</span>
						<span class="overview__name">new posts<br>(61042 total)</span>
					</li>
					<li class="overview__item">
						<span class="overview__item-icon overview__item-icon--users"></span>
						<span class="overview__count" id="overview-users" data-count="18901">0</span>
						<span class="overview__name">new users<br>(36606 total)</span>
					</li>
					<li class="overview__item">
						<span class="overview__item-icon overview__item-icon--upvotes"></span>
						<span class="overview__count" id="overview-upvotes" data-count="109474">0</span>
						<span class="overview__name">upvotes</span>
					</li>
					<li class="overview__item">
						<span class="overview__item-icon overview__item-icon--upvotes"></span>
						<span class="overview__count" id="overview-comments" data-count="6">0</span>
						<span class="overview__name">upvotes/post</span>
					</li>
				</ul>
			</div>
		</section>

		<section class="section">
			<h2 class="section__title"><span class="section__title-inner">The Most Popular Stories of 2015</span></h2>

			<div class="section__content">
				<div class="tabs">
					<ul class="tabs__labels tabs__labels--with-badges">
						<li class="tabs__label is-current">All</li>
						<li class="tabs__label badge badge--discussion">Discussion</li>
						<li class="tabs__label badge badge--site-design">Site Design</li>
						<li class="tabs__label badge badge--show-dn">Show DN</li>
						<li class="tabs__label badge badge--talk">Talk</li>
						<li class="tabs__label badge badge--css">CSS</li>
						<li class="tabs__label badge badge--ask-dn">Ask DN</li>
						<li class="tabs__label badge badge--sketch">Sketch</li>
						<li class="tabs__label badge badge--apple">Apple</li>
						<li class="tabs__label badge badge--typography">Typography</li>
						<li class="tabs__label badge badge--ask-me-anything">Ask Me Anything</li>
					</ul>

					<div class="tabs__container">

						<?php

							$tabs = array(
								"top-upvotes",
								"top-discussion",
								"top-sitedesign",
								"top-show",
								"top-video",
								"top-css",
								"top-ask",
								"top-sketch",
								"top-apple",
								"top-type",
								"top-ama",
							);

						?>

						<?php foreach ($tabs as $tab => $tabname):?>
							<div class="tabs__tab<?php if ($tab == 0) echo ' is-visible'; ?>">

								<?php show_top_posts($tabname) ; ?>

							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</section>

		<section class="section">
			<h2 class="section__title"><span class="section__title-inner">Top Stories Sources</span></h2>

			<div class="section__content">
				<div class="tabs">
					<ul class="tabs__labels">
						<li class="tabs__label is-current">Medium</li>
						<li class="tabs__label">vimeo</li>
						<li class="tabs__label">youtube</li>
						<li class="tabs__label">Github</li>
						<li class="tabs__label">dribbble</li>
						<li class="tabs__label">twitter</li>
					</ul>

					<div class="tabs__container">

						<?php

							$tabs = array(
								"source-medium",
								"source-vimeo",
								"source-youtube",
								"source-github",
								"source-dribbble",
								"source-twitter",
							);

						?>

						<?php foreach ($tabs as $tab => $tabname):?>
							<div class="tabs__tab<?php if ($tab == 0) echo ' is-visible'; ?>">

								<?php show_source_posts($tabname) ; ?>

							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</section>

		<section class="section">
			<h2 class="section__title"><span class="section__title-inner">Top Users</span></h2>

			<div class="section__content">
				<div class="tabs">
					<ul class="tabs__labels">
						<li class="tabs__label is-current">karma</li>
						<li class="tabs__label">comments</li>
						<li class="tabs__label">stories</li>
					</ul>

					<div class="tabs__container">

						<?php

							$tabs = array(
								"users-karma",
								"users-comments",
								"users-posts",
							);

						?>

						<?php foreach ($tabs as $tab => $tabname):?>
							<div class="tabs__tab<?php if ($tab == 0) echo ' is-visible'; ?>">

								<?php show_users($tabname) ; ?>

							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</section>

	</div><!-- .main -->

	<footer class="footer">

		<div class="cards">
			<a href="http://design.lc" class="cards__card card">
				<span class="card__title">Created by</span>
				<span class="card__content">Artiom Dashinsky</span>
			</a>
			<a href="https://twitter.com/hvost" class="cards__card card">
				<span class="card__title">Follow me on Twitter</span>
				<span class="card__content">@hvost</span>
			</a>
		</div>

	</footer><!-- .footer -->

</div><!-- .wrapper -->

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/scripts.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-6464246-10', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
