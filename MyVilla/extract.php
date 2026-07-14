<?php
$file = 'c:\\laragon\\www\\MyVilla\\MyVilla\\resources\\views\\Homepage.blade.php';
$content = file_get_contents($file);

// Extract CSS
preg_match('/<style>(.*?)<\/style>/s', $content, $cssMatch);
if ($cssMatch) {
    $css = $cssMatch[1];
    file_put_contents('c:\\laragon\\www\\MyVilla\\MyVilla\\public\\css\\HomePage.css', trim($css));
    $content = str_replace($cssMatch[0], '<link rel="stylesheet" href="{{ asset(\'css/HomePage.css\') }}">', $content);
}

// Extract JS
preg_match('/<script>(.*?)<\/script>/s', $content, $jsMatch);
if ($jsMatch) {
    $js = $jsMatch[1];
    file_put_contents('c:\\laragon\\www\\MyVilla\\MyVilla\\public\\js\\HomePage.js', trim($js));
    $content = str_replace($jsMatch[0], '<script src="{{ asset(\'js/HomePage.js\') }}"></script>', $content);
}

// Extract Header
$headerRegex = '/<!-- ===== NAVBAR ===== -->(.*?)<!-- ===== HERO ===== -->/s';
preg_match($headerRegex, $content, $headerMatch);
if ($headerMatch) {
    file_put_contents('c:\\laragon\\www\\MyVilla\\MyVilla\\resources\\views\\header\\header.blade.php', trim($headerMatch[1]));
    $content = str_replace($headerMatch[0], "<!-- ===== NAVBAR ===== -->\n    @include('header.header')\n\n    <!-- ===== HERO ===== -->", $content);
}

// Extract Footer
$footerRegex = '/<!-- ===== FOOTER ===== -->(.*?)<!-- AOS JS -->/s';
preg_match($footerRegex, $content, $footerMatch);
if ($footerMatch) {
    file_put_contents('c:\\laragon\\www\\MyVilla\\MyVilla\\resources\\views\\footers\\footers.blade.php', trim($footerMatch[1]));
    $content = str_replace($footerMatch[0], "<!-- ===== FOOTER ===== -->\n    @include('footers.footers')\n\n    <!-- AOS JS -->", $content);
}

file_put_contents($file, $content);
echo "Extracted successfully.";
