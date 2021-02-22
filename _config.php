<?php

namespace Signify\Factory;

use SilverStripe\Core\Manifest\ModuleLoader;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;

// Set HTMLEditorField configurations
$tableTinyMCE = TinyMCEConfig::get('tableTinyMCE');
//$tableTinyMCE->setContentCSS(['themes/kaingaora/dist/editor.min.css']);
$tableTinyMCE->setOptions([
    'skin'                => 'silverstripe',
    'force_br_newlines'   => false,
    'force_p_newlines'    => true,
    'forced_root_block'   => '',
    'default_link_target' => '_blank',
    'valid_elements'      => "br,"
        . "p[class],"
        . "h3[class],"
        . "h4[class],"
        . "-a[class|href|target],"
        . "-em[class],"
        . "-strong[class],"
        . "-span[class],"
        . "ul[class],"
        . "ol[class],"
        . "li[class]",
    'block_formats'       => 'Paragraph=p;Heading=h3;SubHeading=h4;',
    'browser_spellcheck'  => true,
    'importcss_append'    => true,
]);
$tableTinyMCE->removeButtons(
    'blockquote',
    'indent',
    'outdent',
    'table',
    'underline',
    'alignleft',
    'aligncenter',
    'alignright',
    'alignjustify',
    'formatselect',
    'styleselect',
    'paste',
    'pastetext',
    'sslink',
    'code'
);
$tableTinyMCE->insertButtonsBefore('bold', 'formatselect');
$tableTinyMCE->enablePlugins('charmap')
    ->setOption('charmap_append', [
        ['256', 'A - macron'],
        ['274', 'E - macron'],
        ['298', 'I - macron'],
        ['332', 'O - macron'],
        ['362', 'U - macron'],
        ['257', 'a - macron'],
        ['275', 'e - macron'],
        ['299', 'i - macron'],
        ['333', 'o - macron'],
        ['363', 'u - macron']
    ]);
$cmsModule = ModuleLoader::inst()->getManifest()->getModule('silverstripe/cms');
$adminModule = ModuleLoader::inst()->getManifest()->getModule('silverstripe/admin');
$assetsModule = ModuleLoader::inst()->getManifest()->getModule('silverstripe/asset-admin');
$tableTinyMCE->enablePlugins([
    'sslink' => $adminModule->getResource('client/dist/js/TinyMCE_sslink.js'),
    'sslinkemail' => $adminModule->getResource('client/dist/js/TinyMCE_sslink-email.js'),
    'sslinkfile' => $assetsModule->getResource('client/dist/js/TinyMCE_sslink-file.js'),
    'sslinkinternal' => $cmsModule->getResource('client/dist/js/TinyMCE_sslink-internal.js'),
    'sslinkexternal' => $adminModule->getResource('client/dist/js/TinyMCE_sslink-external.js'),
])->setOption('contextmenu', 'sslink');
$tableTinyMCE->addButtonsToLine(1, 'sslink', 'charmap', 'paste', 'pastetext');

// Set HTMLEditorField configurations
$cellTinyMCE = TinyMCEConfig::get('cellTinyMCE');
$cellTinyMCE->setOptions([
    'skin'                => 'silverstripe',
    'force_br_newlines'   => false,
    'force_p_newlines'    => true,
    'forced_root_block'   => '',
    'default_link_target' => '_blank',
    'valid_elements'      => "br,"
        . "p[class],"
        . "h4[class],"
        . "h5[class],"
        . "h6[class],"
        . "img[src|class|alt|width|height|data-id|data-shortcode],"
        . "-a[class|href|target],"
        . "-em[class],"
        . "-strong[class],"
        . "-span[class],"
        . "ul[class],"
        . "ol[class],"
        . "li[class]",
    'block_formats'       => 'Paragraph=p;Heading=h4;SubHeading=h5;LowestHeading=h6;',
    'browser_spellcheck'  => true,
    'importcss_append'    => true,
]);
$cellTinyMCE->removeButtons(
    'blockquote',
    'indent',
    'outdent',
    'table',
    'underline',
    'alignleft',
    'aligncenter',
    'alignright',
    'alignjustify',
    'formatselect',
    'styleselect',
    'paste',
    'pastetext',
    'sslink',
    'code'
);
$cellTinyMCE->insertButtonsBefore('bold', 'formatselect');
$cellTinyMCE->enablePlugins('charmap')
    ->setOption('charmap_append', [
        ['256', 'A - macron'],
        ['274', 'E - macron'],
        ['298', 'I - macron'],
        ['332', 'O - macron'],
        ['362', 'U - macron'],
        ['257', 'a - macron'],
        ['275', 'e - macron'],
        ['299', 'i - macron'],
        ['333', 'o - macron'],
        ['363', 'u - macron']
    ]);
$cmsModule = ModuleLoader::inst()->getManifest()->getModule('silverstripe/cms');
$adminModule = ModuleLoader::inst()->getManifest()->getModule('silverstripe/admin');
$assetsModule = ModuleLoader::inst()->getManifest()->getModule('silverstripe/asset-admin');
$cellTinyMCE->enablePlugins([
    'sslink' => $adminModule->getResource('client/dist/js/TinyMCE_sslink.js'),
    'sslinkemail' => $adminModule->getResource('client/dist/js/TinyMCE_sslink-email.js'),
    'sslinkfile' => $assetsModule->getResource('client/dist/js/TinyMCE_sslink-file.js'),
    'sslinkinternal' => $cmsModule->getResource('client/dist/js/TinyMCE_sslink-internal.js'),
    'sslinkexternal' => $adminModule->getResource('client/dist/js/TinyMCE_sslink-external.js'),
])->setOption('contextmenu', 'sslink');
$cellTinyMCE->enablePlugins([
    'ssmedia' => $assetsModule->getResource('client/dist/js/TinyMCE_ssmedia.js'),
])->setOption('contextmenu', 'ssmedia');
$cellTinyMCE->addButtonsToLine(1, 'sslink', 'ssmedia', 'charmap', 'paste', 'pastetext');
