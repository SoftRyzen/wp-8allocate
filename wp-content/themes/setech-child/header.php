<?php
defined('ABSPATH') or die();
global $post, $wp_query;

$site_classes[] = sprintf('desktop-menu-%s', get_theme_mod('menu_mode'));

$is_default_sb = (is_home() || is_front_page() || (class_exists('WooCommerce') && is_shop())) || !SETECH__ACTIVE;

$custom_sidebar = rb_get_metabox('page_sidebar');
$custom_sidebar_pos = rb_get_metabox('sidebar_pos');

$sidebar = $is_default_sb ? setech__get_sidebar(get_queried_object_id()) : setech__get_sidebar(get_queried_object_id(), $custom_sidebar, $custom_sidebar_pos);
$tb_sidebar = get_theme_mod('icon_custom_sb') ? setech__get_sidebar(get_queried_object_id(), get_theme_mod('custom_sidebar'), 'right', get_theme_mod('custom_sidebar'), true) : '';
//console_log(get_post_meta($post->ID, _aioseop_title, true));
?>

<!DOCTYPE html>
<html <?php language_attributes() ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php if ($post->ID === 251 || $post->ID === 3580) {
        echo '<meta name="robots" content="noindex, follow" />';
    } ?>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>"/>

    <?php wp_head() ?>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-MQNRZWZ');</script>
    <!-- End Google Tag Manager -->
    <style>
        .breadcrumbs-custom {
            padding: 10px 2px;
            font-size: 12px;
        }
        .breadcrumbs-custom span:nth-of-type(1) {
            margin-left: 0!important;
        }
        .breadcrumbs-custom span:nth-child(even) {
            margin: 0 8px;
        }
        .breadcrumbs-custom a, .breadcrumbs-custom .current-item {
            font-family: Inter;
            font-style: normal;
            font-weight: normal;
            font-size: 14px!important;
            line-height: 16px;
            color: #000000;
        }
        .breadcrumbs-custom .current-item {
            opacity: 0.5;
        }
    </style>
    <?php
    $current_url = home_url($_SERVER['REQUEST_URI']);
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(5));
    $site_title = get_bloginfo('name');
    ?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "<?php echo $site_title; ?>",
            "url": "<?php echo $current_url ?>",
            "logo": "<?php echo $image[0] ?>",
            "contactPoint": [
                {
                    "@type": "ContactPoint",
                    "telephone": "<?php echo get_group_field('contact_block', 'ua', 5) ?>",
                    "contactType": "customer service",
                    "areaServed": "ua"
                },
                {
                    "@type": "ContactPoint",
                    "telephone": "<?php echo get_group_field('contact_block', 'uk', 5) ?>",
                    "contactType": "customer service",
                    "areaServed": "uk"
                },
                {
                    "@type": "ContactPoint",
                    "telephone": "<?php echo get_group_field('contact_block', 'us', 5) ?>",
                    "contactType": "customer service",
                    "areaServed": "us"
                },
                {
                    "@type": "ContactPoint",
                    "telephone": "<?php echo get_group_field('contact_block', 'il', 5) ?>",
                    "contactType": "customer service",
                    "areaServed": "il"
                },
                {
                    "@type": "ContactPoint",
                    "telephone": "<?php echo get_group_field('contact_block', 'ee', 5) ?>",
                    "contactType": "customer service",
                    "areaServed": "ee"
                }
            ],
            "sameAs": [
                "<?php echo get_group_field('contact_block', 'facebook', 5) ?>",
                "<?php echo get_group_field('contact_block', 'linkedin', 5) ?>",
                "<?php echo get_group_field('contact_block', 'twitter', 5) ?>",
                "<?php echo get_group_field('contact_block', 'instagram', 5) ?>"
            ]
        }







    </script>

    <?php
    global $post;
    $descr = get_post_meta($post->ID, "_aioseop_description", true);
    $author_id = $post->post_author;
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_url = get_the_author_meta('user_url', $author_id);
    $author_logo = get_avatar_url($author_id);
    $post_image_url = get_the_post_thumbnail_url($post->ID);
    if ($post->post_type === 'post') {
        echo '
            <script type="application/ld+json">
            {
                "@context": "http://schema.org",
                "@type": "Article",
                "mainEntityOfPage": {
                    "@type": "WebPage",
                    "@id": "' . $post->post_title . '"
                },
                "headline": "' . $post->post_title . '",
                "image": "",
                "datePublished": "' . $post->post_date . '",
                "dateModified": "' . $post->post_modified . '",
                "author": {
                    "@type": "Person",
                    "sameAs": "' . $author_url . '",
                    "image": "' . $author_logo . '",
                    "name": "' . $author_name . '"
                },
                "publisher": {
                    "@type": "Organization",
                    "sameAs": "' . $author_url . '",
                    "image": "' . $author_logo . '",
                    "name": "' . $author_name . '"
                },
                "description": "' . $descr . '",
                "alternativeHeadline": "' . $post->post_title . '",
                "articleBody": {
                    "image": "' . $post_image_url . '",
                }
            }
            </script> ';
    }
    if ($wp_query->post->ID === 5) {
        echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{
        "@type": "Question",
        "name": "What services your IT outsourcing company can take over?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a1",
          "text": "We have a broad experience of both building digital solutions from scratch as a product development team and joining project to complete our clients’ squads. We can drive you through initial analysis and discovery, development, support and scaling stages, as well as extend your team during your active hiring or transition period. Our developers obtained a deep expertise in several niches, so, besides development, we can provide consultancy on technical and business sides. We can also handle project management"
        }
      }, {
        "@type": "Question",
        "name": "What are the benefits and risks of offshore IT outsourcing services for our company?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a2",
          "text": "Firstly, outsourcing companies that specialize in several domains and constantly help clients build, launch or improve their products possess deep expertise, which they will apply to your project. Secondly, with such services, you can control your expenses easier than in case if you hire an in-house team, and the process of scaling up and down is painless. And, of course, in most cases, it’s cheaper to outsource some of your activities. Risks usually are related to time zone, the abscence of experience managing remote/dedicated teams, and the depth of domain expertise."}
        }]
      }, {
        "@type": "Question",
        "name": "What process do you use as an IT outsourcing services provider?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a3",
          "text": "We start with initial discovery and requirements gathering and prepare an estimate. After that, we clarify requirements, create a proposal, and sign a contract. At this point, we are ready to start development — during that process, we keep everything transparent and provide clear reporting, so we are always on the same page with the client. After everything is deployed and you accept results, we can help you with product support or scaling."}
        }]
    }
    </script>';
    }

    if ($wp_query->post->ID === 2258) {
        echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{
        "@type": "Question",
        "name": "What is a dedicated development team?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a1",
          "text": "It’s a squad of versatile engineering professionals that are dedicated to a single project (regularly, a long-term one) and acts as an external engineering unit. It may also include a project manager or may be managed by your management professionals."
        }
      }, {
        "@type": "Question",
        "name": "Is it cost-efficient to use dedicated development team services?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a2",
          "text": "Comparing to creating an in-house squad of professionals, you don’t need to spend money on recruiting developers, and, in most cases, it’s way more cost-efficient to hire a dedicated team. Also, you can scale your team up or down to maximize your cost-efficiency."}
        }]
      }, {
        "@type": "Question",
        "name": "For how long can I hire a dedicated development company?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a3",
          "text": "We strive to help our clients at every stage of their product creation process and don’t mind assisting them with our support and optimization services after the product is launched and gets "}
        }]
    }
    </script>';
    }

    if ($wp_query->post->ID === 373) {
        echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{
        "@type": "Question",
        "name": "What are the IT managed support services?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a1",
          "text": "Under such services usually imply a set of functions focused on maintenance, support, and ensuring flawless routine operations execution. The set of services may include security monitoring and management, network & servers monitoring and management, data backups and recovery, data analytics, cloud administration, and consultancy services. Managed services may be especially beneficial when you have no resources or desire to build an in-house support unit."
        }
      }, {
        "@type": "Question",
        "name": "How can my business benefit from your managed IT services and support?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a2",
          "text": "One of the most essential benefits is cost savings — you don’t spend money on recruitment, such services cost less than having an in-house team, and you can easily cut your team in case your needs decreased. Besides this, managed teams often have broad experience dealing with issues that may arise since they accomplished project for other clients."}
        }]
      }, {
        "@type": "Question",
        "name": "How do you provide IT managed services and support?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a3",
          "text": "We have a simple process that consists of three steps. Firstly, we conduct discovery to better understand your request and how we can help you. Secondly, we estimate the project, create a plan and create a proposal. Then we allocate resources — and that’s all!"}
        }]
    }
    </script>';
    }

	if ($wp_query->post->ID === 4309) {
		echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{
        "@type": "Question",
        "name": "What is the backend?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a1",
          "text": "While the front end covers what the human eye sees when interacting with the app, backend is responsible for operations under the hood. Backend serves the information requests, processes data, does authorization and interacts with integrations to retrieve or provide data (like payment information, for example)."
        }
      }, {
        "@type": "Question",
        "name": "What does the backend developer do?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a2",
          "text": "Our backend engineers build applications from very scratch — they put together business logic, databases, third-party services, and other things. They create a system and then support, maintain, optimize, and empower it with new features to keep the business running."}
        }]
      }, {
        "@type": "Question",
        "name": "Which programming languages are used by your developers for back-end development?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a3",
          "text": "Our crew has a strong experience with C#, PHP, as well as building native iOS and Android mobile apps. When there’s a need, we find an engineer with a strong knowledge of a specific tech stack to help our clients build exactly what they need."}
        }]
    }
    </script>';
	}

	if ($wp_query->post->ID === 4350) {
		echo '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [{
        "@type": "Question",
        "name": "What is the front-end?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a1",
          "text": "Front-end is the digital product side that has a graphical interface that end-users interact with — contrary to back-end, which means the server and database. Front-end displays data in a convenient and understandable way and allows to enter data that will be further processed by backend."
        }
      }, {
        "@type": "Question",
        "name": "What does a front-end developer in your company do?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a2",
          "text": "Our professionals make it easy and fast for users to interact with your product. They develop and maintain the interface, do optimization for different browsers as well as desktop, tablet, and mobile views, and improve usability."}
        }]
      }, {
        "@type": "Question",
        "name": "What language would you use for front-end development?",
        "acceptedAnswer": {
          "@type": "Answer",
          "@id":"a3",
          "text": "As JavaScript is an industry standard, we apply its capabilities to create interfaces. Also, we take advantage of a number of frameworks such as React, Vue.JS, Angular, and others. As one of top front-end development companies, we handpick the stack in accordance with your exact requirements."}
        }]
    }
    </script>';
	}
    ?>

</head>
<body <?php body_class() ?> data-boxed="<?php echo get_theme_mod('boxed_layout') ? 'true' : 'false'; ?>"
                            data-default="<?php echo !SETECH__ACTIVE ? 'true' : 'false'; ?>" itemscope="itemscope"
                            itemtype="http://schema.org/WebPage">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQNRZWZ"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<script> (function () {
        window.ldfdr = window.ldfdr || {};
        (function (d, s, ss, fs) {
            fs = d.getElementsByTagName(s)[0];

            function ce(src) {
                var cs = d.createElement(s);
                cs.src = src;
                setTimeout(function () {
                    fs.parentNode.insertBefore(cs, fs)
                }, 1);
            }

            ce(ss);
        })(document, 'script', 'https://sc.lfeeder.com/lftracker_v1_bElvO73r9AE8ZMqj.js');
    })(); </script>
<?php do_action('theme/above_site_wrapper') ?>

<?php get_template_part('tmpl/header-search') ?>
	 	<div class="rb-blank-preloader"></div>
		<div class="body-overlay"></div>

<?php
if (get_theme_mod('icon_custom_sb') && !empty($tb_sidebar)) {
    echo "<div class='custom_sidebars_wrapper'>";
    echo sprintf('%s', $tb_sidebar);
    echo "</div>";
}
?>

<div id="site" class="site wrap <?php echo esc_attr(join(' ', $site_classes)) ?>">
    <?php echo !empty($sidebar) && !is_attachment() ? '<div class="sidebar_trigger"><i></i></div>' : '' ?>

    <?php
    // Sticky
    if (get_theme_mod('custom_sticky_header') != 'disable') {
        if (has_action('rb_custom_sticky') && !empty(get_post_meta(get_the_id(), 'rbhf_mb_post', true)['sticky'])) {
            do_action('rb_custom_sticky');
        } else {
            if (function_exists('rb_hf_init')) {
                switch (rb_get_post_type()) {
                    case 'woo_single' :
                        rb_print_template('woo_single_custom_sticky_header', 'sticky');
                        break;
                    case 'woo_archive' :
                        rb_print_template('woo_custom_sticky_header', 'sticky');
                        break;
                    case 'staff_single' :
                        rb_print_template('rb_staff_single_custom_sticky_header', 'sticky');
                        break;
                    case 'staff_archive' :
                        rb_print_template('rb_staff_custom_sticky_header', 'sticky');
                        break;
                    case 'portfolio_single' :
                        rb_print_template('rb_portfolio_single_custom_sticky_header', 'sticky');
                        break;
                    case 'portfolio_archive' :
                        rb_print_template('rb_portfolio_custom_sticky_header', 'sticky');
                        break;
                    case 'case_study_single' :
                        rb_print_template('rb_case_study_single_custom_sticky_header', 'sticky');
                        break;
                    case 'case_study_archive' :
                        rb_print_template('rb_case_study_custom_sticky_header', 'sticky');
                        break;
                    case 'blog_single' :
                        rb_print_template('blog_single_custom_sticky_header', 'sticky');
                        break;
                    case 'blog_archive' :
                        rb_print_template('blog_custom_sticky_header', 'sticky');
                        break;
                    default :
                        if (get_theme_mod('custom_sticky') != 'default') {
                            rb_print_template('custom_sticky', 'sticky');
                        } else {
                            get_template_part('tmpl/sticky');
                        }
                        break;
                }
            } else {
                get_template_part('tmpl/sticky');
            }
        }
        get_template_part('tmpl/sticky-mobile');
    }

    // Header
    if (has_action('rb_custom_header') && !empty(get_post_meta(get_the_id(), 'rbhf_mb_post', true)['header'])) {
        do_action('rb_custom_header');
    } else {
        if (function_exists('rb_hf_init')) {
            switch (rb_get_post_type()) {
                case 'woo_single' :
                    rb_print_template('woo_single_custom_header', 'header');
                    break;
                case 'woo_archive' :
                    rb_print_template('woo_custom_header', 'header');
                    break;
                case 'staff_single' :
                    rb_print_template('rb_staff_single_custom_header', 'header');
                    break;
                case 'staff_archive' :
                    rb_print_template('rb_staff_custom_header', 'header');
                    break;
                case 'portfolio_single' :
                    rb_print_template('rb_portfolio_single_custom_header', 'header');
                    break;
                case 'portfolio_archive' :
                    rb_print_template('rb_portfolio_custom_header', 'header');
                    break;
                case 'case_study_single' :
                    rb_print_template('rb_case_study_single_custom_header', 'header');
                    break;
                case 'case_study_archive' :
                    rb_print_template('rb_case_study_custom_header', 'header');
                    break;
                case 'blog_single' :
                    rb_print_template('blog_single_custom_header', 'header');
                    break;
                case 'blog_archive' :
                    rb_print_template('blog_custom_header', 'header');
                    break;
                default :
                    if (get_theme_mod('custom_header') != 'default') {
                        rb_print_template('custom_header', 'header');
                    } else {
                        get_template_part('tmpl/header');
                    }
                    break;
            }
        } else {
            get_template_part('tmpl/header');
        }
    }
    // Mobile Header
    get_template_part('tmpl/header-mobile');
    ?>
    <?php if (!empty(rb_get_metabox('slider_shortcode'))) : ?>
        <div class="rb_rev_slider container">
            <?php echo do_shortcode(rb_get_metabox('slider_shortcode')) ?>
        </div>
    <?php endif; ?>

    <div id="site-content" class="site-content">
        <!-- The main content -->
        <?php
        if (class_exists('WooCommerce') && (is_shop() || is_product())) {
            echo '<div id="main-content" class="main-content container" itemprop="mainContentOfPage">';
        } else {
            echo '<main id="main-content" class="main-content container" itemprop="mainContentOfPage">';
        }
        ?>

        <?php
        $temp_check = !empty($sidebar) && !is_attachment();

        $sidebar_classes = $temp_check ? ' has_sb' : '';
        $sidebar_classes .= $temp_check && get_theme_mod('sticky_sidebars') ? ' sticky_sb' : '';
        ?>
        <div class="<?php echo sprintf('main-content-inner%s', $sidebar_classes); ?>">

            <?php
            echo !empty($sidebar) && !is_attachment() ? $sidebar : '';
            ?>

            <div class="main-content-inner-wrap post-type_<?php echo get_post_type() ?>">
                <div class="breadcrumbs-custom" typeof="BreadcrumbList" vocab="https://schema.org/">
                    <?php
                    if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </div>
