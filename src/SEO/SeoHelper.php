<?php
/**
 * AavivaCred - Technical SEO & JSON-LD Structured Data Engine
 */

namespace AavivaCred\SEO;

class SeoHelper {

    public static function renderTags(array $pageParams = []): string {
        $config = require dirname(__DIR__, 2) . '/config/seo.php';
        $defaults = $config['defaults'];

        $title       = !empty($pageParams['title']) ? $pageParams['title'] . ' | AavivaCred' : $defaults['title'] . ' | AavivaCred';
        $description = !empty($pageParams['description']) ? $pageParams['description'] : $defaults['description'];
        $keywords    = !empty($pageParams['keywords']) ? $pageParams['keywords'] : $defaults['keywords'];
        $canonical   = !empty($pageParams['canonical']) ? $pageParams['canonical'] : $defaults['canonical_base'] . ($_SERVER['REQUEST_URI'] ?? '');
        $ogImage     = !empty($pageParams['og_image']) ? $pageParams['og_image'] : $defaults['og_image'];
        $ogType      = !empty($pageParams['og_type']) ? $pageParams['og_type'] : $defaults['og_type'];
        $robots      = !empty($pageParams['robots']) ? $pageParams['robots'] : $defaults['robots'];

        $html = [];
        $html[] = sprintf('<title>%s</title>', htmlspecialchars($title, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta name="description" content="%s">', htmlspecialchars($description, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta name="keywords" content="%s">', htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta name="robots" content="%s">', htmlspecialchars($robots, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<link rel="canonical" href="%s">', htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'));

        // Open Graph
        $html[] = sprintf('<meta property="og:title" content="%s">', htmlspecialchars($title, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta property="og:description" content="%s">', htmlspecialchars($description, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta property="og:type" content="%s">', htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta property="og:url" content="%s">', htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta property="og:image" content="%s">', htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta property="og:site_name" content="AavivaCred">');

        // Twitter Cards
        $html[] = sprintf('<meta name="twitter:card" content="%s">', htmlspecialchars($defaults['twitter_card'], ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta name="twitter:site" content="%s">', htmlspecialchars($defaults['twitter_site'], ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta name="twitter:title" content="%s">', htmlspecialchars($title, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta name="twitter:description" content="%s">', htmlspecialchars($description, ENT_QUOTES, 'UTF-8'));
        $html[] = sprintf('<meta name="twitter:image" content="%s">', htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'));

        // Output JSON-LD Schemas
        $html[] = self::renderOrganizationSchema();
        $html[] = self::renderWebSiteSchema();

        if (!empty($pageParams['breadcrumbs']) && is_array($pageParams['breadcrumbs'])) {
            $html[] = self::renderBreadcrumbSchema($pageParams['breadcrumbs']);
        }

        if (!empty($pageParams['faqs']) && is_array($pageParams['faqs'])) {
            $faqHtml = self::renderFaqSchema($pageParams['faqs']);
            if (!empty($faqHtml)) {
                $html[] = $faqHtml;
            }
        }

        if (!empty($pageParams['loan_schema']) && is_array($pageParams['loan_schema'])) {
            $html[] = self::renderFinancialProductSchema($pageParams['loan_schema']);
        }

        if (!empty($pageParams['article_schema']) && is_array($pageParams['article_schema'])) {
            $html[] = self::renderArticleSchema($pageParams['article_schema']);
        }

        return implode("\n    ", array_filter($html));
    }

    public static function renderOrganizationSchema(): string {
        $config = require dirname(__DIR__, 2) . '/config/seo.php';
        return sprintf(
            '<script type="application/ld+json">%s</script>',
            json_encode($config['organization'], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    public static function renderWebSiteSchema(): string {
        $data = [
            '@context' => 'https://schema.org',
            '@type'    => 'WebSite',
            'name'     => 'AavivaCred',
            'url'      => 'https://aavivacred.com',
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => 'https://aavivacred.com/pages/services.php?q={search_term_string}',
                'query-input' => 'required name=search_term_string'
            ]
        ];
        return sprintf(
            '<script type="application/ld+json">%s</script>',
            json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    public static function renderBreadcrumbSchema(array $items): string {
        $list = [];
        foreach ($items as $idx => $item) {
            $name = $item['name'] ?? $item['title'] ?? $item['label'] ?? '';
            $url  = $item['url'] ?? $item['link'] ?? '';
            if ($name) {
                $list[] = [
                    '@type'    => 'ListItem',
                    'position' => $idx + 1,
                    'name'     => $name,
                    'item'     => $url
                ];
            }
        }
        if (empty($list)) return '';

        $data = [
            '@context'        => 'https://schema.org',
            '@type'           => 'BreadcrumbList',
            'itemListElement' => $list
        ];
        return sprintf(
            '<script type="application/ld+json">%s</script>',
            json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    public static function renderFaqSchema(array $faqs): string {
        $mainEntity = [];
        foreach ($faqs as $faq) {
            if (!is_array($faq)) continue;
            
            $question = $faq['question'] ?? $faq['q'] ?? $faq['title'] ?? null;
            $answer   = $faq['answer'] ?? $faq['a'] ?? $faq['desc'] ?? null;

            if (!empty($question) && !empty($answer)) {
                $mainEntity[] = [
                    '@type'          => 'Question',
                    'name'           => (string)$question,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => (string)$answer
                    ]
                ];
            }
        }

        if (empty($mainEntity)) {
            return '';
        }

        $data = [
            '@context'   => 'https://schema.org',
            '@type'      => 'FAQPage',
            'mainEntity' => $mainEntity
        ];
        return sprintf(
            '<script type="application/ld+json">%s</script>',
            json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    public static function renderFinancialProductSchema(array $loan): string {
        $data = [
            '@context'     => 'https://schema.org',
            '@type'        => 'FinancialProduct',
            'name'         => $loan['name'] ?? $loan['title'] ?? 'Loan Product',
            'description'  => $loan['description'] ?? '',
            'category'     => 'Loan',
            'amount'       => [
                '@type'    => 'MonetaryAmount',
                'currency' => 'INR',
                'minValue' => $loan['min_amount'] ?? 10000,
                'maxValue' => $loan['max_amount'] ?? 3500000
            ],
            'interestRate' => [
                '@type'    => 'QuantitativeValue',
                'minValue' => $loan['min_rate'] ?? 8.5,
                'maxValue' => $loan['max_rate'] ?? 24.0,
                'unitText' => 'ANNUAL'
            ],
            'provider'     => [
                '@type' => 'FinancialService',
                'name'  => 'AavivaCred'
            ]
        ];
        return sprintf(
            '<script type="application/ld+json">%s</script>',
            json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }

    public static function renderArticleSchema(array $article): string {
        $data = [
            '@context'         => 'https://schema.org',
            '@type'            => 'BlogPosting',
            'headline'         => $article['title'] ?? '',
            'description'      => $article['excerpt'] ?? '',
            'image'            => $article['image_url'] ?? '',
            'author'           => [
                '@type' => 'Person',
                'name'  => $article['author'] ?? 'AavivaCred Editorial Team'
            ],
            'publisher'        => [
                '@type' => 'Organization',
                'name'  => 'AavivaCred',
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => 'https://aavivacred.com/assets/images/aavivacred_light.png'
                ]
            ],
            'datePublished'    => $article['created_at'] ?? date('c'),
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id'   => 'https://aavivacred.com/pages/blog-post.php?slug=' . ($article['slug'] ?? '')
            ]
        ];
        return sprintf(
            '<script type="application/ld+json">%s</script>',
            json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
        );
    }
}
