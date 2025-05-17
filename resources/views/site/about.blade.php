@extends('layouts.main')
@section('seo')
<title>پکتو | درباره ما</title>
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
<section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title"> درباره ما  </h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="/">تبلیغات پکتو </a></li>
                                        <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section>
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
					</div>
					<section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="position-relative">
                            <img src="/assets/img/about.jpg" class="rounded img-fluid mx-auto d-block" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="section-title ms-lg-4">
                            <h4 class="title mb-4">داستان ما</h4>
                            <p class="text-muted">شرکت تبلیغاتی پکتو یک هلدینگ تبلیغاتی است که از سـال 1396 اقدام به فعالیت در زمینه تبلیغات در مترو نموده است.این شرکت در طول دوره فعالیت خود، مشاور و مجری تبلیغاتی شرکت¬ها، کارخانجات تولیدی و بازرگانی بوده است که بعضاً این خدمات تا به امروز ادامه یافته است. این شرکت، با توجه به بودجه تبلیغاتی مشتریان خود و با در نظر گرفتن شرایط فرهنگی و اقتصادی جامعه همواره توانسته است بسته¬ های تبلیغاتی مناسبی جهت ارتقاء بازار فروش محصولات و خدمات مشتریان فراهم آورد.</p>
														<p class="text-muted">ما در شرکت تبلیغاتی پکتو تلاش می‌کنیم تا با نوآوری و خلاقیت، بتوانیم بهترین ابزارها، امکانات و آموزش‌ها را برای کسب‌وکارهای بزرگ و کوچک فراهم کنیم. همکاران ما همواره به دنبال پیشرفت هستند و پویا بودن را می‌توان در تک‌ تک خدمات و پروژه های ما به وضوح دید. این پیشرفت فقط محدود به ما و افراد حاضر در پکتو نیست. ما باور داریم پیشرفت، مُسری است و اگر بخشی از جامعه پیشرفت کند، می‌تواند کمکی به رشد جامعه باشد. با این دیدگاه خوشحالیم که می‌توانیم تاثیری هر چند کوچک بر جامعه‌ی خود داشته باشیم.قصه‌ی ما را همین‌جا بخوانید. از کجا آمده‌ایم و به کجا رسیده‌ایم.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
				<hr>
				<section class="section">
					<div class="container">
							<div class="row justify-content-center">
									<div class="col-12 text-center">
											<div class="section-title mb-4 pb-2">
													<h4 class="title mb-4">خدمات شرکت تبلیغاتی پکتو</h4>
											</div>
									</div><!--end col-->
							</div><!--end row-->

							<div class="row">
									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
															<h5>تبلیغات در شبکه های اجتماعی</h5>
															<p class="text-muted mb-0">انجام تبلیغات در یوتیوب , تیک تاک , اینستاگرام , توئیتر , لینکدین , تلگرام , فیسبوک</p>
													</div>
											</div>
									</div><!--end col-->

									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
														<h5>دیجیتال مارکتینگ</h5>
														<p class="text-muted mb-0">انجام خدمات سئو سایت , ایمیل مارکتینگ , تبلیغات گوگل , تبلیغات در سایت های پر مخاطب و غیره</p>
													</div>
											</div>
									</div><!--end col-->

									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
														<h5>استراتژی و برندینگ</h5>
														<p class="text-muted mb-0">اجرای فرآیندهایی همچون برندینگ، تحلیل ارزش کنونی برند، تحلیل بازار، تحلیل محصول یا خدمات و ارزیابی جایگاه محصول دربازار</p>
													</div>
											</div>
									</div><!--end col-->

									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
														<h5>تبلیغات رسانه</h5>
														<p class="text-muted mb-0">تبلیغات در صدا سیما و رادیو و شبکه های نمایش خانگی به همراه تولید تیزر تبلیغاتی و انیمیشن</p>
													</div>
											</div>
									</div><!--end col-->

									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
														<h5>تبلیغات محیطی</h5>
														<p class="text-muted mb-0">تبلیغات در سطح شهر بصورت بیلبورد ها , پل های هوایی , مترو , اتوبوس ها همراه با چاپ بنر تبلیغاتی</p>
													</div>
											</div>
									</div><!--end col-->

									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
														<h5>رسانه ورزشی</h5>
														<p class="text-muted mb-0">انجام تبلیغات در محیط فوتبال , والیبال , کشتی و بصورت اسپانسری ورزشی</p>
													</div>
											</div>
									</div><!--end col-->
									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
														<h5>تیزر و گرافیک</h5>
														<p class="text-muted mb-0">طراحی و اجرا کلیه خدمات ساخت تیزر تبلیغاتی , موشن گرافیک , انیمیشن , کارهای چاپ گرافیکی</p>
													</div>
											</div>
									</div><!--end col-->
									<div class="col-md-3 col-12 mt-5">
											<div class="features text-center">
													<div class="image position-relative d-inline-block">
															<i class="uil uil-vector-square h1 text-primary"></i>
													</div>
													<div class="content mt-4">
														<h5>طراحی سایت و اپلیکیشن</h5>
														<p class="text-muted mb-0">برنامه نویس و طراحی سایت , بازی , هوش مصنوعی , NFT , بلاکچین , بیگ دیتا و ساخت اپلیکیشن های اندروید و ios</p>
													</div>
											</div>
									</div><!--end col-->
							</div><!--end row-->
					</div>
					</section>
@endsection
