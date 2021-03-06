<?php
return array(
    'ctrl' => array(
        'title' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection',
        'label' => 'title',
        'label_alt' => 'address',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'default_sortby' => 'ORDER BY title',
        'type' => 'collection_type',
        'versioningWS' => 2,
        'versioning_followPages' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'title,pois',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('maps2') . 'Resources/Public/Icons/tx_maps2_domain_model_poicollection.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, collection_type, title, address, latitude, longitude, latitude_orig, longitude_orig, configuration_map, pois, stroke_color, stroke_opacity, stroke_weight, fill_color, fill_opacity, info_window_content',
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_maps2_domain_model_poicollection',
                'foreign_table_where' => 'AND tx_maps2_domain_model_poicollection.pid=###CURRENT_PID### AND tx_maps2_domain_model_poicollection.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'collection_type' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection.collectionType',
            'config' =>array(
                'type' => 'select',
                'default' => 'Empty',
                'eval' => 'required',
                'items' => array(
                    array(
                        'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection.collectionType.empty',
                        'Empty'
                    ),
                    array(
                        'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection.collectionType.point',
                        'Point',
                        'EXT:maps2/Resources/Public/Icons/TypeSelectPointSmall.png'
                    ),
                    array(
                        'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection.collectionType.area',
                        'Area',
                        'EXT:maps2/Resources/Public/Icons/TypeSelectAreaSmall.png'
                    ),
                    array(
                        'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection.collectionType.route',
                        'Route',
                        'EXT:maps2/Resources/Public/Icons/TypeSelectRouteSmall.png'
                    ),
                    array(
                        'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection.collectionType.radius',
                        'Radius',
                        'EXT:maps2/Resources/Public/Icons/TypeSelectRadiusSmall.png'
                    ),
                ),
            ),
        ),
        'title' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xlf:tx_maps2_domain_model_poicollection.title',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'address' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.address',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'wizards' => array(
                    'searchAddress' => array(
                        'type' => 'userFunc',
                        'userFunc' => 'JWeiland\\Maps2\\Tca\\SearchAddress->searchAddress',
                    ),
                ),
            ),
        ),
        'latitude' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.latitude',
            'config' => array(
                'type' => 'input',
                'size' => 12,
                'eval' => 'JWeiland\\Maps2\\Tca\\Type\\Float',
            ),
        ),
        'longitude' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.longitude',
            'config' => array(
                'type' => 'input',
                'size' => 12,
                'eval' => 'JWeiland\\Maps2\\Tca\\Type\\Float',
            ),
        ),
        'latitude_orig' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.latitudeOrig',
            'config' => array(
                'type' => 'input',
                'size' => 12,
                'readOnly' => true,
            ),
        ),
        'longitude_orig' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.longitudeOrig',
            'config' => array(
                'type' => 'input',
                'size' => 12,
                'readOnly' => true,
            ),
        ),
        'configuration_map' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.configuration_map',
            'config' => array(
                'type' => 'user',
                'userFunc' => 'JWeiland\\Maps2\\Tca\\GoogleMaps->render',
            ),
        ),
        'radius' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.radius',
            'config' => array(
                'type' => 'input',
                'size' => 12,
                'eval' => 'trim,int',
            ),
        ),
        'pois' => array(
            'exclude' => 1,
            'config' => array(
                'type' => 'passthrough',
                'foreign_table' => 'tx_maps2_domain_model_poi',
                'foreign_field' => 'poicollection',
            ),
        ),
        'stroke_color' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.stroke_color',
            'config' => array(
                'type' => 'input',
                'size' => 7,
                'eval' => 'trim',
            ),
        ),
        'stroke_opacity' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.stroke_opacity',
            'config' => array(
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim',
            ),
        ),
        'stroke_weight' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.stroke_weight',
            'config' => array(
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim',
            ),
        ),
        'fill_color' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.fill_color',
            'config' => array(
                'type' => 'input',
                'size' => 7,
                'eval' => 'trim',
            ),
        ),
        'fill_opacity' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.fill_opacity',
            'config' => array(
                'type' => 'input',
                'size' => 5,
                'eval' => 'trim',
            ),
        ),
        'info_window_content' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.info_window_content',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ),
            'defaultExtras' => 'richtext[]',
        ),
    ),
    'types' => array(
        'Empty' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden, collection_type, title,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
        'Point' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden, collection_type, title, address;;1, configuration_map, pois,--div--;LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.info_window,info_window_content;;;richtext[]:rte_transform[mode=ts_css],--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
        'Area' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden, collection_type, title, latitude, longitude, configuration_map, pois,--div--;LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.style, stroke_color, stroke_opacity, stroke_weight, fill_color, fill_opacity,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
        'Route' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden, collection_type, title, latitude, longitude, configuration_map, pois,--div--;LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.style, stroke_color, stroke_opacity, stroke_weight, fill_color, fill_opacity,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
        'Radius' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden, collection_type, title, address;;2, configuration_map, pois,--div--;LLL:EXT:maps2/Resources/Private/Language/locallang_db.xml:tx_maps2_domain_model_poicollection.style, stroke_color, stroke_opacity, stroke_weight, fill_color, fill_opacity,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
    ),
    'palettes' => array(
        '1' => array('showitem' => 'latitude, longitude, --linebreak--, latitude_orig, longitude_orig'),
        '2' => array('showitem' => 'latitude, longitude, radius, --linebreak--, latitude_orig, longitude_orig'),
    ),
);
