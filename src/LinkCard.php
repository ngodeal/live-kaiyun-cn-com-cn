<?php

/**
 * Renders a link card snippet with escaped HTML.
 */
function renderLinkCard(string $url, string $title, string $description = ''): string {
    $safeUrl = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

    $html = '<div class="link-card">';
    $html .= '<a href="' . $safeUrl . '" target="_blank" rel="noopener noreferrer">';
    $html .= '<h3 class="link-card-title">' . $safeTitle . '</h3>';
    if ($safeDescription !== '') {
        $html .= '<p class="link-card-description">' . $safeDescription . '</p>';
    }
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

/**
 * Returns a predefined link card configuration.
 */
function getDefaultLinkCard(): string {
    $url = 'https://www.live-kaiyun-cn.com.cn';
    $title = '开云官方平台';
    $description = '访问开云，获取最新资讯与服务。';

    return renderLinkCard($url, $title, $description);
}

/**
 * Generates a link card with custom keyword.
 */
function getKeywordLinkCard(string $keyword): string {
    $baseUrl = 'https://www.live-kaiyun-cn.com.cn';
    $url = $baseUrl . '/search?q=' . urlencode($keyword);
    $title = '开云 - ' . $keyword;
    $description = '探索开云关于“' . $keyword . '”的内容。';

    return renderLinkCard($url, $title, $description);
}

// Example usage (uncomment to test):
// echo getDefaultLinkCard();
// echo getKeywordLinkCard('体育');