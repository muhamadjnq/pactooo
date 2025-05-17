@extends('layouts.main')
@section('seo')
<title>پکتو | دیجیتال مارکتینگ و سوشیال مدیا</title>
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
<div class="swiper mySwiper ">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img class="object-cover w-full" src="/assets/img/slider-2.jpg" alt="">
			</div>
		</div>
		<div class="swiper-pagination"></div>
</div>
</section>

<section class="my-20 px-4">
<div class="container mx-auto max-w-screen-xl">
		<div class="text-center mb-10">
				<h2 class="text-3xl font-YekanBakh-ExtraBlack">خدمات تبلیغاتی پکتو</h2>
		</div>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
						</svg>
						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">تبلیغات در شبکه های اجتماعی</h3>
						<p class="mt-2">انجام تبلیغات در یوتیوب , تیک تاک , اینستاگرام , توئیتر , لینکدین , تلگرام , فیسبوک</p>
				</div>
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
						</svg>
						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">طراحی سایت و اپلیکیشن</h3>
						<p class="mt-2">برنامه نویس و طراحی سایت , بازی , هوش مصنوعی , NFT , بلاکچین , بیگ دیتا و ساخت اپلیکیشن های اندروید و ios</p>
				</div>
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
							</svg>

						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">تبلیغات رسانه</h3>
						<p class="mt-2">تبلیغات در صدا سیما و رادیو به همراه تولید تیزر تبلیغاتی و انیمیشن</p>
				</div>
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
							</svg>
						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">تبلیغات محیطی</h3>
						<p class="mt-2">تبلیغات در سطح شهر بصورت بیلبورد ها , پل های هوایی , مترو , اتوبوس ها همراه با چاپ بنر تبلیغاتی</p>
				</div>
		</div>
		<br>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
						</svg>
						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">استراتژی و برندینگ</h3>
						<p class="mt-2">اجرای فرآیندهایی همچون برندینگ، تحلیل ارزش کنونی برند، تحلیل بازار، تحلیل محصول یا خدمات و ارزیابی جایگاه محصول دربازار</p>
				</div>
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
							</svg>
						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">رسانه ورزشی</h3>
						<p class="mt-2">انجام تبلیغات در محیط فوتبال , والیبال , کشتی و بصورت اسپانسری ورزشی</p>
				</div>
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
						</svg>
						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">دیجیتال مارکتینگ</h3>
						<p class="mt-2">انجام خدمات سئو سایت , ایمیل مارکتینگ , تبلیغات گوگل , تبلیغات در سایت های پر مخاطب و غیره</p>
				</div>
				<div class="bg-white p-4 flex items-center justify-center flex-col leading-8 rounded-2xl">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 pb-3">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
								</svg>
						<h3 class="border-t-4 border-yellow-400 pt-3 font-YekanBakh-Bold text-sm">تیزر و گرافیک</h3>
						<p class="mt-2">طراحی و اجرا کلیه خدمات ساخت تیزر تبلیغاتی , موشن گرافیک , انیمیشن , کارهای چاپ گرافیکی و</p>
				</div>
		</div>
</div>
</section>
@endsection
