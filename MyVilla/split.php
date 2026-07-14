<?php
$cssFile = 'c:\\laragon\\www\\MyVilla\\MyVilla\\public\\css\\HomePage.css';
$cssContent = file_get_contents($cssFile);

// Extract Navbar CSS
$navRegex = '/\/\* =========================================\s*NAVBAR\s*========================================= \*\/(.*?)(\/\* =========================================\s*HERO\s*========================================= \*\/)/s';
if (preg_match($navRegex, $cssContent, $navMatch)) {
    file_put_contents('c:\\laragon\\www\\MyVilla\\MyVilla\\public\\css\\header.css', trim($navMatch[1]));
    $cssContent = str_replace($navMatch[0], $navMatch[2], $cssContent);
}

// Extract Footer CSS
$footerRegex = '/\/\* =========================================\s*FOOTER\s*========================================= \*\/(.*?)(\/\* =========================================\s*ANIMATIONS\s*========================================= \*\/)/s';
if (preg_match($footerRegex, $cssContent, $footerMatch)) {
    file_put_contents('c:\\laragon\\www\\MyVilla\\MyVilla\\public\\css\\footers.css', trim($footerMatch[1]));
    $cssContent = str_replace($footerMatch[0], $footerMatch[2], $cssContent);
}

file_put_contents($cssFile, $cssContent);

$jsFile = 'c:\\laragon\\www\\MyVilla\\MyVilla\\public\\js\\HomePage.js';
$jsContent = file_get_contents($jsFile);

// Extract Header JS (toggleMenu)
$headerJsRegex = '/\/\/ Mobile menu(.*?)function toggleMenu\(\) \{.*?\}\s*(?=\/\/ Gallery filter)/s';
if (preg_match($headerJsRegex, $jsContent, $headerJsMatch)) {
    file_put_contents('c:\\laragon\\www\\MyVilla\\MyVilla\\public\\js\\header.js', trim($headerJsMatch[0]));
    $jsContent = str_replace($headerJsMatch[0], '', $jsContent);
}
file_put_contents($jsFile, $jsContent);

echo "Split successfully.";
