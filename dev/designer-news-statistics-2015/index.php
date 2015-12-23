<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Designer News Statistics of 2015</title>
	<meta name="viewport" content="width=980">

	<link rel="stylesheet" href="main.css">

	<script src="//use.typekit.net/dco3lkt.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>

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
			I love <a href="https://news.layervault.com/">Designer News</a>. It became my main source of information about design. <a href="https://layervault.com/">LayerVault</a> created a great community of designers and people who value design.<br>
			I collected some data from DN and organized it.<br>
			Enjoy.
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
						<li class="tabs__label">kickstarter</li>
						<li class="tabs__label">quora</li>
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
								"source-kickstarter",
								"source-quora",
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
								"users-ratio",
								"users-invited",
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

		<section class="section">
			<h2 class="section__title"><span class="section__title-inner">Top Companies</span></h2>

			<div class="section__content">
				<div class="tabs">
					<ul class="tabs__labels">
						<li class="tabs__label is-current">People</li>
						<li class="tabs__label">Posts</li>
					</ul>

					<div class="tabs__container">

						<?php

							$tabs = array(
								"companies-people",
								"companies-posts",
							);

						?>

						<?php foreach ($tabs as $tab => $tabname):?>
							<div class="tabs__tab<?php if ($tab == 0) echo ' is-visible'; ?>">

								<?php show_companies($tabname) ; ?>

							</div>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</section>

		<section class="section">
			<h2 class="section__title"><span class="section__title-inner">Top Job Title Keywords</span></h2>

			<div class="section__content">
				<ul class="items-list">
					<li class="items-list__item item">
						<span class="item__number">2418</span>

						<span class="item__title item__title--job">Design</span>

						<span class="item__bar is-hidden" style="width: 2418px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">553</span>

						<span class="item__title item__title--job">Developer</span>

						<span class="item__bar is-hidden" style="width: 553px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">393</span>

						<span class="item__title item__title--job">UX</span>

						<span class="item__bar is-hidden" style="width: 393px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">349</span>

						<span class="item__title item__title--job">Product</span>

						<span class="item__bar is-hidden" style="width: 349px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">327</span>

						<span class="item__title item__title--job">UI</span>

						<span class="item__bar is-hidden" style="width: 327px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">310</span>

						<span class="item__title item__title--job">Director</span>

						<span class="item__bar is-hidden" style="width: 310px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">303</span>

						<span class="item__title item__title--job">Founder</span>

						<span class="item__bar is-hidden" style="width: 303px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">189</span>

						<span class="item__title item__title--job">Creative</span>

						<span class="item__bar is-hidden" style="width: 189px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">184</span>

						<span class="item__title item__title--job">Art</span>

						<span class="item__bar is-hidden" style="width: 184px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">131</span>

						<span class="item__title item__title--job">Graphic</span>

						<span class="item__bar is-hidden" style="width: 131px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">128</span>

						<span class="item__title item__title--job">Engineer</span>

						<span class="item__bar is-hidden" style="width: 128px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">94</span>

						<span class="item__title item__title--job">Manager</span>

						<span class="item__bar is-hidden" style="width: 94px;"></span>
					</li>
					<li class="items-list__item item">
						<span class="item__number">58</span>

						<span class="item__title item__title--job">CEO</span>

						<span class="item__bar is-hidden" style="width: 58px;"></span>
					</li>
				</ul>

				<p class="text text--smaller text--jobs-note">* amount of people of 6,850 users</p>
			</div>
		</section>

		<section class="section">
			<h2 class="section__title"><span class="section__title-inner">How The Data Was Collected</span></h2>

			<div class="section__content">
				<p class="text">When I came up with this idea I was sure that I have to ask one of my programmers-friends to build a scraper that will collect all this data. But after some research I found a fantastic tool called <a href="https://import.io/">Import.io</a> that helped me to do it by myself without writing a line of code. It allows to collect data from websites and export it as CSV, JSON or HTML.</p>

				<p class="text text--smaller">Disclaimer: I’m not asocciated with <a href="https://import.io/">Import.io</a>, just wanted to thank them for their free tool.</p>
			</div>
		</section>

	</div><!-- .main -->

	<footer class="footer">

		<div class="cards">
			<a href="http://dashinsky.com/" class="cards__card card">
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

  ga('create', 'UA-6464246-4', 'dashinsky.com');
  ga('send', 'pageview');

</script>

</body>
</html>
