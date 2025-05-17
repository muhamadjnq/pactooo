@extends('layouts.main')
@section('seo')
<title>پکتو | طراحی و برنامه نویسی سایت و اپلیکیشن</title>
<meta data-rh="true" name="description" content="آژانس تبلیغاتی پکتو خدمات برندینگ و بازاریابی، تبلیغات، خدمات ارتباطی، طراحی کمپین بازاریابی دیجیتال، تبلیغات محیطی، تولید تبلیغات تلویزیونی و بازاریابی دیجیتال و برنامه نویسی را ارائه می دهد." />
<meta data-rh="true" name="keywords" content="پکتو, کانون تبلیغات پکتو, شرکت تبلیغاتی, کانون تبلیغات, آژانس تبلیغاتی, آژانس تبلیغاتی پکتو, شرکت تبلیغاتی پکتو, تبلیغات محیطی, کمپین 360, اجرای کمپین تبلیغاتی, تیزر تلویزیونی, بیلبورد, رسانه محیطی, بازاریابی, بازاریابی جامع, تبلیغات, دیجیتال بازاریابی تبلیغات آنلاین، کمپین تبلیغاتی، برندسازی، برندسازی، بازاریابی بصری" />
<link data-rh="true" rel="canonical" href="https://adpacto.com/" />
<meta data-rh="true" property="og:title" content="پکتو | آژانس تبلیغاتی پکتو" />
<meta data-rh="true" property="og:description" content="آژانس تبلیغاتی پکتو خدمات برندینگ و بازاریابی، تبلیغات، خدمات ارتباطی، طراحی کمپین بازاریابی دیجیتال، تبلیغات محیطی، تولید تبلیغات تلویزیونی و بازاریابی دیجیتال و برنامه نویسی را ارائه می دهد." />
<meta data-rh="true" property="og:url" content="https://adpacto.com/" />
<meta data-rh="true" property="og:type" content="website" />
<meta data-rh="true" property="og:image" content="/assets/img/favicon.png" />
<meta data-rh="true" property="og:site_name" content="Pacto" />
<meta data-rh="true" property="og:locale" content="en_us" />
<meta data-rh="true" name="twitter:title" content="پکتو | آژانس تبلیغاتی پکتو" />
<meta data-rh="true" name="twitter:description" content="آژانس تبلیغاتی پکتو خدمات برندینگ و بازاریابی، تبلیغات، خدمات ارتباطی، طراحی کمپین بازاریابی دیجیتال، تبلیغات محیطی، تولید تبلیغات تلویزیونی و بازاریابی دیجیتال و برنامه نویسی را ارائه می دهد." />
<meta data-rh="true" name="twitter:site" content="@adpacto" />
<meta name="google" content="nositelinkssearchbox" />
<script type="application/ld+json" class="aioseo-schema">
			{"@context":"https:\/\/schema.org","@graph":[{"@type":"WebSite","@id":"https:\/\/adpacto.com\/#website","url":"https:\/\/adpacto.com\/","name":"\u0622\u0698\u0627\u0646\u0633 \u062a\u0628\u0644\u06cc\u063a\u0627\u062a\u06cc \u0645\u0627\u062a","description":"\u0622\u0698\u0627\u0646\u0633 \u0641\u0648\u0644 \u0633\u0631\u0648\u06cc\u0633 \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u062a\u0628\u0644\u06cc\u063a\u0627\u062a \u0648 \u0628\u0631\u0646\u062f","publisher":{"@id":"https:\/\/adpacto.com\/#organization"}},{"@type":"Organization","@id":"https:\/\/adpacto.com\/#organization","name":"\u0622\u0698\u0627\u0646\u0633 \u062a\u0628\u0644\u06cc\u063a\u0627\u062a\u06cc \u0645\u0627\u062a","url":"https:\/\/adpacto.com\/"},{"@type":"BreadcrumbList","@id":"https:\/\/adpacto.com\/#breadcrumblist","itemListElement":[{"@type":"ListItem","@id":"https:\/\/adpacto.com\/#listItem","position":"1","item":{"@type":"WebPage","@id":"https:\/\/adpacto.com\/","name":"\u062e\u0627\u0646\u0647","description":"\u0622\u0698\u0627\u0646\u0633 \u062a\u0628\u0644\u06cc\u063a\u0627\u062a \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u0648 \u0628\u0631\u0646\u062f \u0645\u0627\u062a \u0627\u0631\u0627\u0626\u0647 \u062f\u0647\u0646\u062f\u0647 \u062e\u062f\u0645\u0627\u062a \u062a\u0628\u0644\u06cc\u063a\u0627\u062a\u06cc \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u0648 \u0627\u0631\u062a\u0628\u0627\u0637\u06cc \u0637\u0631\u0627\u062d\u06cc \u06a9\u0645\u067e\u06cc\u0646 \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u062f\u06cc\u062c\u06cc\u062a\u0627\u0644 \u062a\u0628\u0644\u06cc\u063a\u0627\u062a \u0645\u062d\u06cc\u0637\u06cc \u0648 \u062a\u0648\u0644\u06cc\u062f \u0622\u06af\u0647\u06cc \u062a\u0644\u0648\u06cc\u0632\u06cc\u0648\u0646\u06cc","url":"https:\/\/adpacto.com\/"}}]},{"@type":"WebPage","@id":"https:\/\/adpacto.com\/#webpage","url":"https:\/\/adpacto.com\/","name":"\u0622\u0698\u0627\u0646\u0633 \u062a\u0628\u0644\u06cc\u063a\u0627\u062a \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u0648 \u0628\u0631\u0646\u062f \u0645\u0627\u062a","description":"\u0622\u0698\u0627\u0646\u0633 \u062a\u0628\u0644\u06cc\u063a\u0627\u062a \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u0648 \u0628\u0631\u0646\u062f \u0645\u0627\u062a \u0627\u0631\u0627\u0626\u0647 \u062f\u0647\u0646\u062f\u0647 \u062e\u062f\u0645\u0627\u062a \u062a\u0628\u0644\u06cc\u063a\u0627\u062a\u06cc \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u0648 \u0627\u0631\u062a\u0628\u0627\u0637\u06cc \u0637\u0631\u0627\u062d\u06cc \u06a9\u0645\u067e\u06cc\u0646 \u0628\u0627\u0632\u0627\u0631\u06cc\u0627\u0628\u06cc \u062f\u06cc\u062c\u06cc\u062a\u0627\u0644 \u062a\u0628\u0644\u06cc\u063a\u0627\u062a \u0645\u062d\u06cc\u0637\u06cc \u0648 \u062a\u0648\u0644\u06cc\u062f \u0622\u06af\u0647\u06cc \u062a\u0644\u0648\u06cc\u0632\u06cc\u0648\u0646\u06cc","inLanguage":"fa-IR","isPartOf":{"@id":"https:\/\/adpacto.com\/#website"},"breadcrumb":{"@id":"https:\/\/adpacto.com\/#breadcrumblist"},"datePublished":"2020-09-01T08:20:29+04:30","dateModified":"2021-04-04T09:21:15+04:30"}]}
		</script>
<script async src="https://www.google-analytics.com/analytics.js"></script>
<meta name='robots' content='max-image-preview:large' />
<link rel='dns-prefetch' href='//maps.google.com' />
<link rel='dns-prefetch' href='//fonts.googleapis.com' />
<link rel='dns-prefetch' href='//s.w.org' />
<link rel="alternate" type="application/rss+xml" title="Pactoا &raquo; feed" href="https://adpacto.com/feed/" />
<link rel="alternate" type="application/rss+xml" title="Pactoا &raquo; feed comments" href="https://adpacto.com/comments/feed/" />
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
						new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
						j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
						'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
						})(window,document,'script','dataLayer','GTM-5XWMWLB');</script>
<script type="application/ld+json">{
                            "@context": "http://schema.org",
                            "@type": "Organization",
                            "name": "Pacto",
                            "legalName": "Pacto",
                            "url": "http://adpacto.com/",
                            "logo": "http://adpacto.com/assets/img/favicon.png",
                            "address": {
                              "@type": "PostalAddress",
                              "streetAddress": "",
                              "addressLocality": "california",
                              "postalCode": "",
                              "addressCountry": "united states"
                            },
                            "contactPoint": {
                              "@type": "ContactPoint",
                              "contactType": "customer support",
                              "telephone": "",
                              "email": "info@adpacto.com"
                            },
                            "sameAs" : [
                              "https://www.linkedin.com/company/adpacto",
                              "https://instagram.com/adpacto",
                              "https://twitter.com/adpacto",
                              "https://facebook.com/adpacto"
                            ]
                          }</script>
@endsection
@section('content')
<section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="./assets/img/bg1.jpg">
      <div class="container pt-19 pt-md-21 pb-18 pb-md-20 text-center">
        <div class="row">
          <div class="col-md-10 col-lg-8 col-xl-7 col-xxl-6 mx-auto">
            <h1 class="display-1 text-white mb-3">Website & Mobile Development</h1>
            <p class="lead fs-lg px-md-3 px-lg-7 px-xl-9 px-xxl-10">A full-cycle software and mobile app development company with a world-class team of innovators</p>
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container pt-14 pb-12 pt-md-16 pb-md-14">
        <div class="row gx-lg-8 gx-xl-12 gy-10 mb-lg-22 mb-xl-24 align-items-center">
          <div class="col-lg-7 order-lg-2">
            <div class="row gx-md-5 gy-5">
              <div class="col-md-5 offset-md-1 align-self-end">
                <div class="card bg-pale-yellow">
                  <div class="card-body">
                    <img src="./assets/img/telephone-3.svg" class="svg-inject icon-svg icon-svg-md text-yellow mb-3" alt="" />
                    <h4>24/7 Support</h4>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.card -->
              </div>
              <!--/column -->
              <div class="col-md-6 align-self-end">
                <div class="card bg-pale-red">
                  <div class="card-body">
                    <img src="./assets/img/shield.svg" class="svg-inject icon-svg icon-svg-md text-red mb-3" alt="" />
                    <h4>Secure Payments</h4>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.card -->
              </div>
              <!--/column -->
              <div class="col-md-5">
                <div class="card bg-pale-leaf">
                  <div class="card-body">
                    <img src="./assets/img/cloud-computing-3.svg" class="svg-inject icon-svg icon-svg-md text-leaf mb-3" alt="" />
                    <h4>Daily Updates</h4>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.card -->
              </div>
              <!--/column -->
              <div class="col-md-6 align-self-start">
                <div class="card bg-pale-primary">
                  <div class="card-body">
                    <img src="./assets/img/analytics.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                    <h4>Market Research</h4>
                  </div>
                  <!--/.card-body -->
                </div>
                <!--/.card -->
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!--/column -->
          <div class="col-lg-5">
            <h3 class="display-4 mb-5">We develop enterprise-grade software solutions for businesses.</h3>
            <p>Engage is a SaaS designed for coworking and flex office spaces to manage inventory, improve & retain members and automate time consuming tasks such as contracts, billing and support.</p>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-soft-primary">
      <div class="container py-14 pt-md-16 pt-lg-0 pb-md-16">
        <div class="row text-center">
          <div class="col-lg-10 mx-auto">
            <div class="mt-lg-n20 mt-xl-n22 position-relative">
              <div class="shape bg-dot red rellax w-16 h-18" data-rellax-speed="1" style="top: 1rem; left: -3.9rem;"></div>
              <div class="shape rounded-circle bg-line primary rellax w-18 h-18" data-rellax-speed="1" style="bottom: 2rem; right: -3rem;"></div>
              <video poster="./assets/img/movie.jpg" class="player" playsinline controls preload="none">
                <source src="./assets/media/movie.mp4" type="video/mp4">
                <source src="./assets/media/movie.webm" type="video/webm">
              </video>
            </div>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
        <div class="row text-center">
          <div class="col-lg-9 mx-auto">
            <h2 class="fs-15 text-uppercase text-muted mb-3 mt-12"></h2>
            <h3>Develop results-driven products for entrepreneurs, startups, and enterprises with a leading software development company.</h3>
            <div class="row gx-lg-8 gx-xl-12 process-wrapper text-center mt-9">
              <div class="col-md-4"> <img src="./assets/img/light-bulb.svg" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                <h4 class="mb-1">1. Concept</h4>
              </div>
              <!--/column -->
              <div class="col-md-4"> <img src="./assets/img/settings-3.svg" class="svg-inject icon-svg icon-svg-md text-red mb-3" alt="" />
                <h4 class="mb-1">2. Prepare</h4>
              </div>
              <!--/column -->
              <div class="col-md-4"> <img src="./assets/img/design.svg" class="svg-inject icon-svg icon-svg-md text-leaf mb-3" alt="" />
                <h4 class="mb-1">3. Run</h4>
              </div>
              <!--/column -->
            </div>
            <!--/.row -->
          </div>
          <!-- /column -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-light">
      <div class="container py-14 py-md-16">
				<div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-16 align-items-center">
          <div class="col-lg-7">
            <figure><img class="w-auto" src="/assets/img/services-page-one.jpg" srcset="/assets/img/services-page-one.jpg" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5">
            <h3 class="display-4 mb-6 pe-xxl-6">Ideation and evaluation</h3>
            <p class="mb-6">Enterprises are fast adopting technology to improve their productivity, bring efficiency, and remove barriers preventing free and timely flow of information within the enterprise.</p>
						<h6>Rapid Strategy Workshop™</h6>
						<h6>Define project value proposition</h6>
						<h6>Identify development and deployment requirements + constraints.</h6>
						<h6>Perform market research - comparative applications/products.</h6>
						<h6>Identify key opportunities for the feature set.</h6>
            <!-- /.progress-list -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
				<div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
          <div class="col-lg-7 order-lg-2">
            <figure><img class="w-auto" src="/assets/img/services-page-three.png" srcset="./assets/img/services-page-three.jpg" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5">
            <h3 class="display-4 mb-5">Product design</h3>
            <p class="mb-6">Our products undergo vigorous analysis to craft user-centric, result-driven, and industry-specific designs. We design to enhance user engagement and improve user experience, with intriguing concepts.</p>
						<h6>Conceptualization exercise with project stakeholders.</h6>
						<h6>Creating a project style guide.</h6>
						<h6>Developing user experience wireframes for key page types.</h6>
						<h6>User interface mockups based on approved wireframes.</h6>
						<h6>Building Clickable rapid prototyping.</h6>
						<h6>Creating user experience</h6>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
				<div class="row gx-lg-8 gx-xl-12 gy-10 mb-14 mb-md-16 align-items-center">
          <div class="col-lg-7">
            <figure><img class="w-auto" src="/assets/img/service-page-five.jpg" srcset="/assets/img/service-page-five.jpg" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5">
            <h3 class="display-4 mb-6 pe-xxl-6">Development</h3>
            <p class="mb-6">We leverage modern technologies and innovative minds to develop dynamic software solutions for multiple platforms, helping clients introduce a one-of-a-kind solution to the audience.</p>
						<h6>MOBILE APPs (iOS & Android)</h6>
						<h6>Game Development</h6>
						<h6>Web Development</h6>
						<h6>Business Intelligence</h6>
						<h6>Big Data</h6>
						<h6>Artificial Intelligence and Machine Learning</h6>
						<h6>Virtual Reality</h6>
						<h6>Augmented Reality</h6>
						<h6>SaaS Platforms Development</h6>
            <!-- /.progress-list -->
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
				<div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
          <div class="col-lg-7 order-lg-2">
            <figure><img class="w-auto" src="/assets/img/i2.png" srcset="./assets/img/i2.png" alt="" /></figure>
          </div>
          <!--/column -->
          <div class="col-lg-5">
            <h3 class="display-4 mb-5">Testing</h3>
            <p class="mb-6">We take Quality Assurance very seriously. Each project we take on goes through numerous iterations of testing to ensure smooth performance, user-friendliness, and bulletproof security.</p>
						<h6>Application Testing</h6>
						<h6>Load Testing</h6>
						<h6>API Testing</h6>
						<h6>Version Control</h6>
						<h6>Test Automation</h6>
						<h6>Security Testing</h6>
						<h6>Usability Testing</h6>
          </div>
          <!--/column -->
        </div>
        <!--/.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /section -->
		<section class="wrapper bg-soft-primary">
      <div class="container pt-14 pb-18 pt-md-16 pb-md-22 text-center"></div>
      <!-- /.container -->
    </section>
    <!-- /section -->
@endsection
