<?php


/**
 * get abbreviations and stuff
 */
class UnicodeInfo {
    protected $categories = array(
        'cp' => 'Codepoint',
        'age' => 'Age',
        'na' => 'Unicode Name',
        'na1' => 'Unicode 1 Name',
        'gc' => 'General Category',
        'ccc' => 'Combining Class',
        'bc' => 'Bidirectional Category',
        'Bidi_M' => 'Bidi Mirrored',
        'bmg' => 'Bidi Mirrored Glyph',
        'Bidi_C' => 'Bidi Control',
        'dt' => 'Decomposition Type',
        'dm' => 'Decomposition Mapping',
        'CE' => 'Composition Exclusion',
        'Comp_Ex' => 'Full Composition Exclusion',
        'NFC_QC' => 'NFC Quick Check',
        'NFD_QC' => 'NFD Quick Check',
        'NFKC_QC' => 'NFKC Quick Check',
        'NFKD_QC' => 'NFKD Quick Check',
        'XO_NFC' => 'Expands On NFC',
        'XO_NFD' => 'Expands On NFD',
        'XO_NFKC' => 'Expands On NFKC',
        'XO_NFKD' => 'Expands On NFKD',
        'FC_NFKC' => 'FC NFKC Closure',
        'nt' => 'Numeric Type',
        'nv' => 'Numeric Value',
        'jt' => 'Joining Class',
        'jg' => 'Joining Group',
        'Join_C' => 'Join Control',
        'lb' => 'Line Break',
        'ea' => 'East Asian Width',
        'Upper' => 'Uppercase',
        'Lower' => 'Lowercase',
        'OUpper' => 'Other Uppercase',
        'OLower' => 'Other Lowercase',
        'suc' => 'Simple Uppercase Mapping',
        'slc' => 'Simple Lowercase Mapping',
        'stc' => 'Simple Titlecase Mapping',
        'uc' => 'Uppercase Mapping',
        'lc' => 'Lowercase Mapping',
        'tc' => 'Titlecase Mapping',
        'scf' => 'Simple Case Folding',
        'cf' => 'Case Folding',
        'CI' => 'Case Ignorable',
        'Cased' => 'Cased',
        'CWCF' => 'Changes When Casefolded',
        'CWCM' => 'Changes When Casemapped',
        'CWL' => 'Changes When Lowercased',
        'CWKCF' => 'Changes When NFKC Casefolded',
        'CWT' => 'Changes When Titlecased',
        'CWU' => 'Changes When Uppercased',
        'NFKC_CF' => 'NKFC Casefold',
        'sc' => 'Script',
        'isc' => 'ISO 10646 Comment',
        'hst' => 'Hangul Syllable Type',
        'JSN' => 'Jamo Short Name',
        'InSC' => 'Indic Syllabic Category',
        'InMC' => 'Indic Matra Category',
        'IDS' => 'ID Start',
        'OIDS' => 'Other ID Start',
        'XIDS' => 'XID Start',
        'IDC' => 'ID Continue',
        'OIDC' => 'Other ID Continue',
        'XIDC' => 'XID Continue',
        'Pat_Syn' => 'Pattern Syntax',
        'Pat_WS' => 'Pattern White Space',
        'Dash' => 'Dash',
        'Hyphen' => 'Hyphen',
        'QMark' => 'Quotation Mark',
        'Term' => 'Terminal Punctuation',
        'STerm' => 'STerm',
        'Dia' => 'Diacritic',
        'Ext' => 'Extender',
        'SD' => 'Soft Dotted',
        'Alpha' => 'Alphabetic',
        'OAlpha' => 'Other Alphabetic',
        'Math' => 'Math',
        'OMath' => 'Other Math',
        'Hex' => 'Hex Digit',
        'AHex' => 'ASCII Hex Digit',
        'DI' => 'Default Ignorable Code Point',
        'ODI' => 'Other Default Ignorable Code Point',
        'LOE' => 'Logical Order Exception',
        'WSpace' => 'White Space',
        'Gr_Base' => 'Grapheme Base',
        'Gr_Ext' => 'Grapheme Extend',
        'OGr_Ext' => 'Other Grapheme Extend',
        'Gr_Link' => 'Grapheme Link',
        'GCB' => 'Grapheme Cluster Break',
        'WB' => 'Word Break',
        'SB' => 'Sentence Break',
        'Ideo' => 'Ideographic',
        'UIdeo' => 'Unified Ideograph',
        'IDSB' => 'IDS Binary Operator',
        'IDST' => 'IDS Trinary Operator and ',
        'Radical' => 'Radical',
        'Dep' => 'Deprecated',
        'VS' => 'Variation Selector',
        'NChar' => 'Noncharacter Code Point',
        'kAccountingNumeric' => 'Accounting Numeric Value',
        'kAlternateHanYu' => '',
        'kAlternateJEF' => '',
        'kAlternateKangXi' => '',
        'kAlternateMorohashi' => '',
        'kBigFive' => '',
        'kCCCII' => '',
        'kCNS1986' => '',
        'kCNS1992' => '',
        'kCangjie' => '',
        'kCantonese' => '',
        'kCheungBauer' => '',
        'kCheungBauerIndex' => '',
        'kCihaiT' => '',
        'kCompatibilityVariant' => 'Compatibility Variant',
        'kCowles' => '',
        'kDaeJaweon' => '',
        'kDefinition' => 'Unihan Definition',
        'kEACC' => '',
        'kFenn' => '',
        'kFennIndex' => '',
        'kFourCornerCode' => '',
        'kFrequency' => '',
        'kGB0' => '',
        'kGB1' => '',
        'kGB3' => '',
        'kGB5' => '',
        'kGB7' => '',
        'kGB8' => '',
        'kGradeLevel' => '',
        'kGSR' => '',
        'kHangul' => '',
        'kHanYu' => '',
        'kHanyuPinlu' => '',
        'kHanyuPinyin' => '',
        'kHDZRadBreak' => '',
        'kHKGlyph' => '',
        'kHKSCS' => '',
        'kIBMJapan' => '',
        'kIICore' => '',
        'kIRGDaeJaweon' => '',
        'kIRGDaiKanwaZiten' => '',
        'kIRGHanyuDaZidian' => '',
        'kIRGKangXi' => '',
        'kIRG_GSource' => '',
        'kIRG_HSource' => '',
        'kIRG_JSource' => '',
        'kIRG_KPSource' => '',
        'kIRG_KSource' => '',
        'kIRG_MSource' => '',
        'kIRG_TSource' => '',
        'kIRG_USource' => '',
        'kIRG_VSource' => '',
        'kJHJ' => '',
        'kJIS0213' => '',
        'kJapaneseKun' => '',
        'kJapaneseOn' => '',
        'kJis0' => '',
        'kJis1' => '',
        'kKPS0' => '',
        'kKPS1' => '',
        'kKSC0' => '',
        'kKSC1' => '',
        'kKangXi' => '',
        'kKarlgren' => '',
        'kKorean' => '',
        'kLau' => '',
        'kMainlandTelegraph' => '',
        'kMandarin' => '',
        'kMatthews' => '',
        'kMeyerWempe' => '',
        'kMorohashi' => '',
        'kNelson' => '',
        'kOtherNumeric' => 'Other Numeric Value',
        'kPhonetic' => '',
        'kPrimaryNumeric' => 'Primary Numeric Value',
        'kPseudoGB1' => '',
        'kRSAdobe_Japan1_6' => 'Radical Stroke Count (Adobe Japan 1-6)',
        'kRSJapanese' => 'Radical Stroke Count (Japanese)',
        'kRSKanWa' => 'Radical Stroke Count (Morohashi)',
        'kRSKangXi' => 'Radical Stroke Count (KangXi)',
        'kRSKorean' => 'Radical Stroke Count (Korean)',
        'kRSMerged' => '',
        'kRSUnicode' => 'Radical Stroke Count (Unicode)',
        'kSBGY' => '',
        'kSemanticVariant' => 'Semantic Variant',
        'kSimplifiedVariant' => 'Simplified Variant',
        'kSpecializedSemanticVariant' => 'Specialized Semantic Variant',
        'kTaiwanTelegraph' => '',
        'kTang' => '',
        'kTotalStrokes' => 'Stroke Number',
        'kTraditionalVariant' => 'Traditional Variant',
        'kVietnamese' => '',
        'kXHC1983' => '',
        'kWubi' => '',
        'kXerox' => '',
        'kZVariant' => 'z Variant',
        'blk' => 'Block',
        'scx' => 'Script Extension',
    );

    protected $boolean = array( 'Bidi_M', 'Bidi_C', 'CE', 'Comp_Ex', 'XO_NFC',
    'XO_NFD', 'XO_NFKC', 'XO_NFKD', 'Join_C', 'Upper', 'Lower', 'OUpper',
    'OLower', 'CI', 'Cased', 'CWCF', 'CWCM', 'CWL', 'CWKCF', 'CWT', 'CWU',
    'IDS', 'OIDS', 'XIDS', 'IDC', 'OIDC', 'XIDC', 'Pat_Syn', 'Pat_WS', 'Dash',
    'Hyphen', 'QMark', 'Term', 'STerm', 'Dia', 'Ext', 'SD', 'Alpha', 'OAlpha',
    'Math', 'OMath', 'Hex', 'AHex', 'DI', 'ODI', 'LOE', 'WSpace', 'Gr_Base',
    'Gr_Ext', 'OGr_Ext', 'Gr_Link', 'Ideo', 'UIdeo', 'IDSB', 'IDST',
    'Radical', 'Dep', 'VS', 'NChar');

    protected $legend = array(

        'gc' => array(
            'Lu' => 'Uppercase Letter',
            'Ll' => 'Lowercase Letter',
            'Lt' => 'Titlecase Letter',
            'Lm' => 'Modifier Letter',
            'Lo' => 'Other Letter',
            'Mn' => 'Nonspacing Mark',
            'Mc' => 'Spacing Mark',
            'Me' => 'Enclosing Mark',
            'Nd' => 'Decimal Number',
            'Nl' => 'Letter Number',
            'No' => 'Other Number',
            'Pc' => 'Connector Punctuation',
            'Pd' => 'Dash Punctuation',
            'Ps' => 'Open Punctuation',
            'Pe' => 'Close Punctuation',
            'Pi' => 'Initial Punctuation',
            'Pf' => 'Final Punctuation',
            'Po' => 'Other Punctuation',
            'Sm' => 'Math Symbol',
            'Sc' => 'Currency Symbol',
            'Sk' => 'Modifier Symbol',
            'So' => 'Other Symbol',
            'Zs' => 'Space Separator',
            'Zl' => 'Line Separator',
            'Zp' => 'Paragraph Separator',
            'Cc' => 'Control',
            'Cf' => 'Format',
            'Cs' => 'Surrogate',
            'Co' => 'Private Use',
            'Cn' => 'Unassigned',
        ),

        'bc' => array(
            'L' =>   'Left To Right',
            'LRE' => 'Left To Right Embedding',
            'LRO' => 'Left To Right Override',
            'R' =>   'Right To Left',
            'AL' =>  'Arabic Letter',
            'RLE' => 'Right To Left Embedding',
            'RLO' => 'Right To Left Override',
            'PDF' => 'Pop Directional Format',
            'EN' =>  'European Number',
            'ES' =>  'European Separator',
            'ET' =>  'European Terminator',
            'AN' =>  'Arabic Number',
            'CS' =>  'Common Separator',
            'NSM' => 'Nonspacing Mark',
            'BN' =>  'Boundary Neutral',
            'B' =>   'Paragraph Separator',
            'S' =>   'Segment Separator',
            'WS' =>  'White Space',
            'ON' =>  'Other Neutral',
        ),

        'ccc' => array(
            '0' =>   array('Not Reordered',        'Spacing and enclosing marks; also many vowel and consonant signs, even if nonspacing'),
            '1' =>   array('Overlay',              'Marks which overlay a base letter or symbol'),
            '7' =>   array('Nukta',                'Diacritic nukta marks in Brahmi-derived scripts'),
            '8' =>   array('Kana Voicing',         'Hiragana/Katakana voicing marks'),
            '9' =>   array('Virama',               'Viramas'),
            '10' =>  array('',                     'Start of fixed position classes'),
            '199' => array('',                     'End of fixed position classes'),
            '200' => array('Attached Below Left',  'Marks attached at the bottom left'),
            '202' => array('Attached Below',       'Marks attached directly below'),
            '204' => array('',                     'Marks attached at the top right'),
            '208' => array('',                     'Marks attached to the left'),
            '210' => array('',                     'Marks attached to the right'),
            '212' => array('',                     'Marks attached at the top left'),
            '214' => array('Attached Above',       'Marks attached directly above'),
            '216' => array('Attached Above Right', 'Marks attached at the top right'),
            '218' => array('Below Left',           'Distinct marks at the bottom left'),
            '220' => array('Below',                'Distinct marks directly below'),
            '222' => array('Below Right',          'Distinct marks at the bottom right'),
            '224' => array('Left',                 'Distinct marks to the left'),
            '226' => array('Right',                'Distinct marks to the right'),
            '228' => array('Above Left',           'Distinct marks at the top left'),
            '230' => array('Above',                'Distinct marks directly above'),
            '232' => array('Above Right',          'Distinct marks at the top right'),
            '233' => array('Double Below',         'Distinct marks subtending two bases'),
            '234' => array('Double Above',         'Distinct marks extending above two bases'),
            '240' => array('Iota Subscript',       'Greek iota subscript only'),
        ),

        'dt' => array(
            'can' => 'Canonical',
            'com' => 'Compat',
            'enc' => 'Circle',
            'fin' => 'Final',
            'font' => 'Font',
            'fra' => 'Fraction',
            'init' => 'Initial',
            'iso' => 'Isolated',
            'med' => 'Medial',
            'nar' => 'Narrow',
            'nb' => 'Nobreak',
            'none' => 'None',
            'sml' => 'Small',
            'sqr' => 'Square',
            'sub' => 'Sub',
            'sup' => 'Super',
            'vert' => 'Vertical',
            'wide' => 'Wide',
        ),

        'nt' => array(
            'De' => 'Decimal',
            'Di' => 'Digit',
            'None' => 'None',
            'Nu' => 'Numeric',
        ),

        'lb' => array(
            'AI' => 'Ambiguous',
            'AL' => 'Alphabetic',
            'B2' => 'Break Both',
            'BA' => 'Break After',
            'BB' => 'Break Before',
            'BK' => 'Mandatory Break',
            'CB' => 'Contingent Break',
            'CJ' => 'Conditional Japanese Starter',
            'CL' => 'Close Punctuation',
            'CM' => 'Combining Mark',
            'CP' => 'Close Parenthesis',
            'CR' => 'Carriage Return',
            'EX' => 'Exclamation',
            'GL' => 'Glue',
            'H2' => 'H2',
            'H3' => 'H3',
            'HL' => 'Hebrew Letter',
            'HY' => 'Hyphen',
            'ID' => 'Ideographic',
            'IN' => 'Inseparable',
            'IS' => 'Infix Numeric',
            'JL' => 'JL',
            'JT' => 'JT',
            'JV' => 'JV',
            'LF' => 'Line Feed',
            'NL' => 'Next Line',
            'NS' => 'Nonstarter',
            'NU' => 'Numeric',
            'OP' => 'Open Punctuation',
            'PO' => 'Postfix Numeric',
            'PR' => 'Prefix Numeric',
            'QU' => 'Quotation',
            'SA' => 'Complex Context',
            'SG' => 'Surrogate',
            'SP' => 'Space',
            'SY' => 'Break Symbols',
            'WJ' => 'Word Joiner',
            'XX' => 'Unknown',
            'ZW' => 'ZWSpace',
        ),

        'ea' => array(
            'A' => 'Ambiguous',
            'F' => 'Fullwidth',
            'H' => 'Halfwidth',
            'N' => 'Neutral',
            'Na'=> 'Narrow',
            'W' => 'Wide',
        ),

        'sc' => array(
            'Arab' => 'Arabic',
            'Armi' => 'Imperial Aramaic',
            'Armn' => 'Armenian',
            'Avst' => 'Avestan',
            'Bali' => 'Balinese',
            'Bamu' => 'Bamum',
            'Batk' => 'Batak',
            'Beng' => 'Bengali',
            'Bopo' => 'Bopomofo',
            'Brah' => 'Brahmi',
            'Brai' => 'Braille',
            'Bugi' => 'Buginese',
            'Buhd' => 'Buhid',
            'Cakm' => 'Chakma',
            'Cans' => 'Canadian Aboriginal',
            'Cari' => 'Carian',
            'Cham' => 'Cham',
            'Cher' => 'Cherokee',
            'Copt' => 'Coptic',
            'Cprt' => 'Cypriot',
            'Cyrl' => 'Cyrillic',
            'Deva' => 'Devanagari',
            'Dsrt' => 'Deseret',
            'Egyp' => 'Egyptian Hieroglyphs',
            'Ethi' => 'Ethiopic',
            'Geor' => 'Georgian',
            'Glag' => 'Glagolitic',
            'Goth' => 'Gothic',
            'Grek' => 'Greek',
            'Gujr' => 'Gujarati',
            'Guru' => 'Gurmukhi',
            'Hang' => 'Hangul',
            'Hani' => 'Han',
            'Hano' => 'Hanunoo',
            'Hebr' => 'Hebrew',
            'Hira' => 'Hiragana',
            'Hrkt' => 'Katakana Or Hiragana',
            'Ital' => 'Old Italic',
            'Java' => 'Javanese',
            'Kali' => 'Kayah Li',
            'Kana' => 'Katakana',
            'Khar' => 'Kharoshthi',
            'Khmr' => 'Khmer',
            'Knda' => 'Kannada',
            'Kthi' => 'Kaithi',
            'Lana' => 'Tai Tham',
            'Laoo' => 'Lao',
            'Latn' => 'Latin',
            'Lepc' => 'Lepcha',
            'Limb' => 'Limbu',
            'Linb' => 'Linear B',
            'Lisu' => 'Lisu',
            'Lyci' => 'Lycian',
            'Lydi' => 'Lydian',
            'Mand' => 'Mandaic',
            'Merc' => 'Meroitic Cursive',
            'Mero' => 'Meroitic Hieroglyphs',
            'Mlym' => 'Malayalam',
            'Mong' => 'Mongolian',
            'Mtei' => 'Meetei Mayek',
            'Mymr' => 'Myanmar',
            'Nkoo' => 'Nko',
            'Ogam' => 'Ogham',
            'Olck' => 'Ol Chiki',
            'Orkh' => 'Old Turkic',
            'Orya' => 'Oriya',
            'Osma' => 'Osmanya',
            'Phag' => 'Phags Pa',
            'Phli' => 'Inscriptional Pahlavi',
            'Phnx' => 'Phoenician',
            'Plrd' => 'Miao',
            'Prti' => 'Inscriptional Parthian',
            'Rjng' => 'Rejang',
            'Runr' => 'Runic',
            'Samr' => 'Samaritan',
            'Sarb' => 'Old South Arabian',
            'Saur' => 'Saurashtra',
            'Shaw' => 'Shavian',
            'Shrd' => 'Sharada',
            'Sinh' => 'Sinhala',
            'Sora' => 'Sora Sompeng',
            'Sund' => 'Sundanese',
            'Sylo' => 'Syloti Nagri',
            'Syrc' => 'Syriac',
            'Tagb' => 'Tagbanwa',
            'Takr' => 'Takri',
            'Tale' => 'Tai Le',
            'Talu' => 'New Tai Lue',
            'Taml' => 'Tamil',
            'Tavt' => 'Tai Viet',
            'Telu' => 'Telugu',
            'Tfng' => 'Tifinagh',
            'Tglg' => 'Tagalog',
            'Thaa' => 'Thaana',
            'Thai' => 'Thai',
            'Tibt' => 'Tibetan',
            'Ugar' => 'Ugaritic',
            'Vaii' => 'Vai',
            'Xpeo' => 'Old Persian',
            'Xsux' => 'Cuneiform',
            'Yiii' => 'Yi',
            'Zinh' => 'Inherited',
            'Zyyy' => 'Common',
            'Zzzz' => 'Unknown',
        ),

        'GCB' => array( # tr29
            'CN' => 'Control',
            'CR' => 'CR',
            'EX' => 'Extend',
            'L' => 'L',
            'LF' => 'LF',
            'LV' => 'LV',
            'LVT' => 'LVT',
            'PP' => 'Prepend',
            'SM' => 'SpacingMark',
            'T' => 'T',
            'V' => 'V',
            'XX' => 'Any',
        ),

        'SB' => array( # tr29
            'AT' => 'ATerm',
            'CL' => 'Close',
            'CR' => 'CR',
            'EX' => 'Extend',
            'FO' => 'Format',
            'LE' => 'OLetter',
            'LF' => 'LF',
            'LO' => 'Lower',
            'NU' => 'Numeric',
            'SC' => 'SContinue',
            'SE' => 'Sep',
            'SP' => 'Sp',
            'ST' => 'STerm',
            'UP' => 'Upper',
            'XX' => 'Other',
        ),

        'WB' => array( # tr29
            'CR' => 'CR',
            'EX' => 'ExtendNumLet',
            'Extend' => 'Extend',
            'FO' => 'Format',
            'KA' => 'Katakana',
            'LE' => 'ALetter',
            'LF' => 'LF',
            'MB' => 'MidNumLet',
            'ML' => 'MidLetter',
            'MN' => 'MidNum',
            'NL' => 'Newline',
            'NU' => 'Numeric',
            'XX' => 'Other',
        ),

        'jt' => array(
            'R' => 'Right Joining',
            'L' => 'Left Joining',
            'D' => 'Dual Joining',
            'C' => 'Join Causing',
            'U' => 'Non Joining',
            'T' => 'Transparent',
        ),

        'hst' => array(
            'L' =>   'Leading Jamo',
            'LV' =>  'LV Syllable',
            'LVT' => 'LVT Syllable',
            'NA' =>  'Not Applicable',
            'T' =>   'Trailing Jamo',
            'V' =>   'Vowel Jamo',
        ),

        'NFC_QC' => array(
            'M' => 'Maybe',
            'N' => 'No',
            'Y' => 'Yes',
        ),

        'NFD_QC' => array(
            'N' => 'No',
            'Y' => 'Yes',
        ),

        'NFKC_QC' => array(
            'M' => 'Maybe',
            'N' => 'No',
            'Y' => 'Yes',
        ),

        'NFKD_QC' => array(
            'N' => 'No',
            'Y' => 'Yes',
        ),

        'blk' => array(
            'basic_latin' => 'Basic Latin',
            'latin-1_supplement' => 'Latin-1 Supplement',
            'latin_extended-a' => 'Latin Extended-A',
            'latin_extended-b' => 'Latin Extended-B',
            'ipa_extensions' => 'IPA Extensions',
            'spacing_modifier_letters' => 'Spacing Modifier Letters',
            'combining_diacritical_marks' => 'Combining Diacritical Marks',
            'greek_and_coptic' => 'Greek and Coptic',
            'cyrillic' => 'Cyrillic',
            'cyrillic_supplement' => 'Cyrillic Supplement',
            'armenian' => 'Armenian',
            'hebrew' => 'Hebrew',
            'arabic' => 'Arabic',
            'syriac' => 'Syriac',
            'arabic_supplement' => 'Arabic Supplement',
            'thaana' => 'Thaana',
            'nko' => 'NKo',
            'samaritan' => 'Samaritan',
            'mandaic' => 'Mandaic',
            'arabic_extended-a' => 'Arabic Extended-A',
            'devanagari' => 'Devanagari',
            'bengali' => 'Bengali',
            'gurmukhi' => 'Gurmukhi',
            'gujarati' => 'Gujarati',
            'oriya' => 'Oriya',
            'tamil' => 'Tamil',
            'telugu' => 'Telugu',
            'kannada' => 'Kannada',
            'malayalam' => 'Malayalam',
            'sinhala' => 'Sinhala',
            'thai' => 'Thai',
            'lao' => 'Lao',
            'tibetan' => 'Tibetan',
            'myanmar' => 'Myanmar',
            'georgian' => 'Georgian',
            'hangul_jamo' => 'Hangul Jamo',
            'ethiopic' => 'Ethiopic',
            'ethiopic_supplement' => 'Ethiopic Supplement',
            'cherokee' => 'Cherokee',
            'unified_canadian_aboriginal_syllabics' => 'Unified Canadian Aboriginal Syllabics',
            'ogham' => 'Ogham',
            'runic' => 'Runic',
            'tagalog' => 'Tagalog',
            'hanunoo' => 'Hanunoo',
            'buhid' => 'Buhid',
            'tagbanwa' => 'Tagbanwa',
            'khmer' => 'Khmer',
            'mongolian' => 'Mongolian',
            'unified_canadian_aboriginal_syllabics_extended' => 'Unified Canadian Aboriginal Syllabics Extended',
            'limbu' => 'Limbu',
            'tai_le' => 'Tai Le',
            'new_tai_lue' => 'New Tai Lue',
            'khmer_symbols' => 'Khmer Symbols',
            'buginese' => 'Buginese',
            'tai_tham' => 'Tai Tham',
            'balinese' => 'Balinese',
            'sundanese' => 'Sundanese',
            'batak' => 'Batak',
            'lepcha' => 'Lepcha',
            'ol_chiki' => 'Ol Chiki',
            'sundanese_supplement' => 'Sundanese Supplement',
            'vedic_extensions' => 'Vedic Extensions',
            'phonetic_extensions' => 'Phonetic Extensions',
            'phonetic_extensions_supplement' => 'Phonetic Extensions Supplement',
            'combining_diacritical_marks_supplement' => 'Combining Diacritical Marks Supplement',
            'latin_extended_additional' => 'Latin Extended Additional',
            'greek_extended' => 'Greek Extended',
            'general_punctuation' => 'General Punctuation',
            'superscripts_and_subscripts' => 'Superscripts and Subscripts',
            'currency_symbols' => 'Currency Symbols',
            'combining_diacritical_marks_for_symbols' => 'Combining Diacritical Marks for Symbols',
            'letterlike_symbols' => 'Letterlike Symbols',
            'number_forms' => 'Number Forms',
            'arrows' => 'Arrows',
            'mathematical_operators' => 'Mathematical Operators',
            'miscellaneous_technical' => 'Miscellaneous Technical',
            'control_pictures' => 'Control Pictures',
            'optical_character_recognition' => 'Optical Character Recognition',
            'enclosed_alphanumerics' => 'Enclosed Alphanumerics',
            'box_drawing' => 'Box Drawing',
            'block_elements' => 'Block Elements',
            'geometric_shapes' => 'Geometric Shapes',
            'miscellaneous_symbols' => 'Miscellaneous Symbols',
            'dingbats' => 'Dingbats',
            'miscellaneous_mathematical_symbols-a' => 'Miscellaneous Mathematical Symbols-A',
            'supplemental_arrows-a' => 'Supplemental Arrows-A',
            'braille_patterns' => 'Braille Patterns',
            'supplemental_arrows-b' => 'Supplemental Arrows-B',
            'miscellaneous_mathematical_symbols-b' => 'Miscellaneous Mathematical Symbols-B',
            'supplemental_mathematical_operators' => 'Supplemental Mathematical Operators',
            'miscellaneous_symbols_and_arrows' => 'Miscellaneous Symbols and Arrows',
            'glagolitic' => 'Glagolitic',
            'latin_extended-c' => 'Latin Extended-C',
            'coptic' => 'Coptic',
            'georgian_supplement' => 'Georgian Supplement',
            'tifinagh' => 'Tifinagh',
            'ethiopic_extended' => 'Ethiopic Extended',
            'cyrillic_extended-a' => 'Cyrillic Extended-A',
            'supplemental_punctuation' => 'Supplemental Punctuation',
            'cjk_radicals_supplement' => 'CJK Radicals Supplement',
            'kangxi_radicals' => 'Kangxi Radicals',
            'ideographic_description_characters' => 'Ideographic Description Characters',
            'cjk_symbols_and_punctuation' => 'CJK Symbols and Punctuation',
            'hiragana' => 'Hiragana',
            'katakana' => 'Katakana',
            'bopomofo' => 'Bopomofo',
            'hangul_compatibility_jamo' => 'Hangul Compatibility Jamo',
            'kanbun' => 'Kanbun',
            'bopomofo_extended' => 'Bopomofo Extended',
            'cjk_strokes' => 'CJK Strokes',
            'katakana_phonetic_extensions' => 'Katakana Phonetic Extensions',
            'enclosed_cjk_letters_and_months' => 'Enclosed CJK Letters and Months',
            'cjk_compatibility' => 'CJK Compatibility',
            'cjk_unified_ideographs_extension_a' => 'CJK Unified Ideographs Extension A',
            'yijing_hexagram_symbols' => 'Yijing Hexagram Symbols',
            'cjk_unified_ideographs' => 'CJK Unified Ideographs',
            'yi_syllables' => 'Yi Syllables',
            'yi_radicals' => 'Yi Radicals',
            'lisu' => 'Lisu',
            'vai' => 'Vai',
            'cyrillic_extended-b' => 'Cyrillic Extended-B',
            'bamum' => 'Bamum',
            'modifier_tone_letters' => 'Modifier Tone Letters',
            'latin_extended-d' => 'Latin Extended-D',
            'syloti_nagri' => 'Syloti Nagri',
            'common_indic_number_forms' => 'Common Indic Number Forms',
            'phags-pa' => 'Phags-pa',
            'saurashtra' => 'Saurashtra',
            'devanagari_extended' => 'Devanagari Extended',
            'kayah_li' => 'Kayah Li',
            'rejang' => 'Rejang',
            'hangul_jamo_extended-a' => 'Hangul Jamo Extended-A',
            'javanese' => 'Javanese',
            'cham' => 'Cham',
            'myanmar_extended-a' => 'Myanmar Extended-A',
            'tai_viet' => 'Tai Viet',
            'meetei_mayek_extensions' => 'Meetei Mayek Extensions',
            'ethiopic_extended-a' => 'Ethiopic Extended-A',
            'meetei_mayek' => 'Meetei Mayek',
            'hangul_syllables' => 'Hangul Syllables',
            'hangul_jamo_extended-b' => 'Hangul Jamo Extended-B',
            'high_surrogates' => 'High Surrogates',
            'high_private_use_surrogates' => 'High Private Use Surrogates',
            'low_surrogates' => 'Low Surrogates',
            'private_use_area' => 'Private Use Area',
            'cjk_compatibility_ideographs' => 'CJK Compatibility Ideographs',
            'alphabetic_presentation_forms' => 'Alphabetic Presentation Forms',
            'arabic_presentation_forms-a' => 'Arabic Presentation Forms-A',
            'variation_selectors' => 'Variation Selectors',
            'vertical_forms' => 'Vertical Forms',
            'combining_half_marks' => 'Combining Half Marks',
            'cjk_compatibility_forms' => 'CJK Compatibility Forms',
            'small_form_variants' => 'Small Form Variants',
            'arabic_presentation_forms-b' => 'Arabic Presentation Forms-B',
            'halfwidth_and_fullwidth_forms' => 'Halfwidth and Fullwidth Forms',
            'specials' => 'Specials',
            'linear_b_syllabary' => 'Linear B Syllabary',
            'linear_b_ideograms' => 'Linear B Ideograms',
            'aegean_numbers' => 'Aegean Numbers',
            'ancient_greek_numbers' => 'Ancient Greek Numbers',
            'ancient_symbols' => 'Ancient Symbols',
            'phaistos_disc' => 'Phaistos Disc',
            'lycian' => 'Lycian',
            'carian' => 'Carian',
            'old_italic' => 'Old Italic',
            'gothic' => 'Gothic',
            'ugaritic' => 'Ugaritic',
            'old_persian' => 'Old Persian',
            'deseret' => 'Deseret',
            'shavian' => 'Shavian',
            'osmanya' => 'Osmanya',
            'cypriot_syllabary' => 'Cypriot Syllabary',
            'imperial_aramaic' => 'Imperial Aramaic',
            'phoenician' => 'Phoenician',
            'lydian' => 'Lydian',
            'meroitic_hieroglyphs' => 'Meroitic Hieroglyphs',
            'meroitic_cursive' => 'Meroitic Cursive',
            'kharoshthi' => 'Kharoshthi',
            'old_south_arabian' => 'Old South Arabian',
            'avestan' => 'Avestan',
            'inscriptional_parthian' => 'Inscriptional Parthian',
            'inscriptional_pahlavi' => 'Inscriptional Pahlavi',
            'old_turkic' => 'Old Turkic',
            'rumi_numeral_symbols' => 'Rumi Numeral Symbols',
            'brahmi' => 'Brahmi',
            'kaithi' => 'Kaithi',
            'sora_sompeng' => 'Sora Sompeng',
            'chakma' => 'Chakma',
            'sharada' => 'Sharada',
            'takri' => 'Takri',
            'cuneiform' => 'Cuneiform',
            'cuneiform_numbers_and_punctuation' => 'Cuneiform Numbers and Punctuation',
            'egyptian_hieroglyphs' => 'Egyptian Hieroglyphs',
            'bamum_supplement' => 'Bamum Supplement',
            'miao' => 'Miao',
            'kana_supplement' => 'Kana Supplement',
            'byzantine_musical_symbols' => 'Byzantine Musical Symbols',
            'musical_symbols' => 'Musical Symbols',
            'ancient_greek_musical_notation' => 'Ancient Greek Musical Notation',
            'tai_xuan_jing_symbols' => 'Tai Xuan Jing Symbols',
            'counting_rod_numerals' => 'Counting Rod Numerals',
            'mathematical_alphanumeric_symbols' => 'Mathematical Alphanumeric Symbols',
            'arabic_mathematical_alphabetic_symbols' => 'Arabic Mathematical Alphabetic Symbols',
            'mahjong_tiles' => 'Mahjong Tiles',
            'domino_tiles' => 'Domino Tiles',
            'playing_cards' => 'Playing Cards',
            'enclosed_alphanumeric_supplement' => 'Enclosed Alphanumeric Supplement',
            'enclosed_ideographic_supplement' => 'Enclosed Ideographic Supplement',
            'miscellaneous_symbols_and_pictographs' => 'Miscellaneous Symbols And Pictographs',
            'emoticons' => 'Emoticons',
            'transport_and_map_symbols' => 'Transport And Map Symbols',
            'alchemical_symbols' => 'Alchemical Symbols',
            'cjk_unified_ideographs_extension_b' => 'CJK Unified Ideographs Extension B',
            'cjk_unified_ideographs_extension_c' => 'CJK Unified Ideographs Extension C',
            'cjk_unified_ideographs_extension_d' => 'CJK Unified Ideographs Extension D',
            'cjk_compatibility_ideographs_supplement' => 'CJK Compatibility Ideographs Supplement',
            'tags' => 'Tags',
            'variation_selectors_supplement' => 'Variation Selectors Supplement',
            'supplementary_private_use_area-a' => 'Supplementary Private Use Area-A',
            'supplementary_private_use_area-b' => 'Supplementary Private Use Area-B',
        ),

    );

    protected static $inst;

    protected function __construct() {}

    public static function get() {
        if (! self::$inst) {
            self::$inst = new self;
        }
        return self::$inst;
    }

    /**
     * get the list of all categories
     */
    public function getAllCategories() {
        return $this->categories;
    }

    /**
     * get all defined category fields
     */
    public function getCategoryKeys() {
        return array_keys($this->categories);
    }

    /**
     * get all category keys, that represent boolean values
     */
    public function getBooleanCategories() {
        return $this->boolean;
    }

    /**
     * get the full name for a category
     */
    public function getCategory($cat) {
        if (array_key_exists($cat, $this->categories) &&
            $this->categories[$cat]) {
            return $this->categories[$cat];
        }
        return $cat;
    }

    /**
     * get the full text label for an abbreviated key
     *
     * The key is qualified by the category (e.g., 'sc')
     */
    public function getLabel($cat, $abbr, $i=0) {
        if ($cat === 'cp') {
            return sprintf('%04X', intval($abbr));
        }
        if (array_key_exists($cat, $this->legend)) {
            if (array_key_exists($abbr, $this->legend[$cat])) {
                $r = $this->legend[$cat][$abbr];
                if (is_array($r)) {
                    return $r[min($i, count($r)-1)];
                }
                return $r;
            }
        }
        return $abbr;
    }

    /**
     * get all labels for a certain category
     */
    public function getLegendForCategory($cat) {
        if (array_key_exists($cat, $this->legend)) {
            return $this->legend[$cat];
        }
        return array();
    }

}


//__END__
