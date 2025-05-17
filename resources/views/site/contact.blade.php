@extends('layouts.main')
@section('seo')
<title>پکتو | تماس با ما</title>
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
<section class="bg-half bg-light d-table w-100" style="background: url('images/contact-detail.jpg') center center;">
            <div class="bg-overlay bg-overlay-white"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title">تماس با ما </h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="/">تبلیغات پکتو </a></li>
                                        <li class="breadcrumb-item active" aria-current="page">تماس با ما</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="row">
                    <div class="col-lg-4 col-md-6  mt-4 pt-2">
                        <div class="card shadow rounded border-0">
                            <div class="card-body py-5">
                                <h4 class="card-title">در تماس باشید !</h4>
                                <div class="custom-form mt-3">
                                    <form method="post" name="myForm" onsubmit="return validateForm()">
                                        <p id="error-msg" class="mb-0"></p>
                                        <div id="simple-msg"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">نام شما <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input name="name" id="name" type="text" class="form-control ps-5" placeholder="نام :">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ایمیل شما <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input name="email" id="email" type="email" class="form-control ps-5" placeholder="ایمیل :">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">موضوع </label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="book" class="fea icon-sm icons"></i>
                                                        <input name="subject" id="subject" class="form-control ps-5" placeholder="موضوع  :">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">نظرات  <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                        <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="پیام :"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" id="submit" name="send" class="btn btn-primary">ارسال پیام</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 ps-md-3 pe-md-3 mt-4 pt-2">
                        <div class="card map map-height-two rounded map-gray border-0">
                            <div class="card-body p-0">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7915.525673176609!2d46.32542404246615!3d38.06389198146334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDAzJzUzLjgiTiA0NsKwMTknMzkuNCJF!5e0!3m2!1sen!2s!4v1545664085241" style="border:0" class="rounded" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-100 mt-60">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center features feature-clean">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="fw-bold">تلفن </h5>
                                <a href="tel:+989102680637" class="text-primary">شماره همراه : 09102680637</a><br>
																<a href="tel:+982634656234" class="text-primary">شماره تماس : 02634656234</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-clean">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="fw-bold">ایمیل </h5>
                                <a href="mailto:info@adpacto.com" class="text-primary">info@adpacto.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-clean">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="fw-bold">آدرس </h5>
                                    <p class="text-muted"> البرز کرج جهانشهر نبش بلوار ماهان پلاک 378 طبقه 1</p>
                                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7915.525673176609!2d46.32542404246615!3d38.06389198146334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDAzJzUzLjgiTiA0NsKwMTknMzkuNCJF!5e0!3m2!1sen!2s!4v1545664085241" data-type="iframe" class="video-play-icon text-primary lightbox">نمایش در گوگل</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
