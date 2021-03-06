--
-- set up font table
--
CREATE TABLE IF NOT EXISTS fonts (
    `id`      TEXT PRIMARY KEY,
    name      TEXT,
    author    TEXT,
    publisher TEXT,
    url       TEXT,
    copyright TEXT,
    license   TEXT
);


--
-- set up mapping table
--
CREATE TABLE IF NOT EXISTS codepoint_fonts (
    cp        INTEGER(7) REFERENCES codepoints,
    font      VARCHAR(255),
    `id`      VARCHAR(255), -- the font ID used as filename
    `primary` INTEGER(1) DEFAULT 0, -- used for rendering
    PRIMARY KEY (cp, font),
    INDEX codepoint_fonts_cp ( cp ),
    INDEX codepoint_fonts_cp_primary ( cp, `primary` )
);


--
-- insert font data
--
INSERT OR REPLACE INTO fonts
    (`id`,
        name, author, publisher, url, copyright, license)
VALUES
( 'Aegean', 'Aegean', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Aegyptus', 'Aegyptus', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Akkadian', 'Akkadian', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Amiri', 'Amiri', 'Khaled Hosny', '', 'http://www.amirifont.org/', 'OFL', 'http://scripts.sil.org/OFL'),
( 'Analecta', 'Analecta', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Anatolian', 'Anatolian', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Arimo', 'Arimo', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Arimo', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'BabelStone Han', 'BabelStone Han', 'BabelStone', 'BabelStone', 'http://www.babelstone.co.uk/Fonts/Han.html', 'Arphic Public License', 'http://ftp.gnu.org/non-gnu/chinese-fonts-truetype/LICENSE'),
( 'BabelStone Ogham', 'BabelStone Ogham', 'BabelStone', 'BabelStone', 'http://www.babelstone.co.uk/Fonts/Ogham.html', 'OFL', 'http://scripts.sil.org/OFL'),
( 'Charis SIL', 'Charis SIL', 'SIL', 'SIL', 'http://scripts.sil.org/charissilfont', 'OFL', 'http://scripts.sil.org/OFL'),
( 'Cousine', 'Cousine', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Cousine', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'DejaVu Sans', 'DejaVu Sans', 'Bitstream, DejaVu project', 'DejaVu project', 'http://dejavu-fonts.org/wiki/License', '', 'http://dejavu-fonts.org/wiki/License'),
( 'DejaVu Sans Condensed', 'DejaVu Sans Condensed', 'Bitstream, DejaVu project', 'DejaVu project', 'http://dejavu-fonts.org/wiki/License', '', 'http://dejavu-fonts.org/wiki/License'),
( 'DejaVu Sans Light', 'DejaVu Sans Light', 'Bitstream, DejaVu project', 'DejaVu project', 'http://dejavu-fonts.org/wiki/License', '', 'http://dejavu-fonts.org/wiki/License'),
( 'DejaVu Sans Mono', 'DejaVu Sans Mono', 'Bitstream, DejaVu project', 'DejaVu project', 'http://dejavu-fonts.org/wiki/License', '', 'http://dejavu-fonts.org/wiki/License'),
( 'DejaVu Serif', 'DejaVu Serif', 'Bitstream, DejaVu project', 'DejaVu project', 'http://dejavu-fonts.org/wiki/License', '', 'http://dejavu-fonts.org/wiki/License'),
( 'DejaVu Serif Condensed', 'DejaVu Serif Condensed', 'Bitstream, DejaVu project', 'DejaVu project', 'http://dejavu-fonts.org/wiki/License', '', 'http://dejavu-fonts.org/wiki/License'),
( 'Droid Arabic Kufi', 'Droid Arabic Kufi', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Arabic%20Kufi', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Arabic Naskh', 'Droid Arabic Naskh', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Arabic%20Naskh', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Naskh Shift Alt', 'Droid Naskh Shift Alt', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Naskh%20Shift%20Alt', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Sans', 'Droid Sans', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Sans', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Sans Arabic', 'Droid Sans Arabic', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Sans%20Arabic', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Sans Armenian', 'Droid Sans Armenian', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Sans%20Armenian', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Sans Ethiopic', 'Droid Sans Ethiopic', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Sans%20Ethiopic', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Sans Georgian', 'Droid Sans Georgian', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Sans%20Georgian', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Sans Hebrew', 'Droid Sans Hebrew', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Sans%20Hebrew', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Sans Mono', 'Droid Sans Mono', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Sans%20Mono', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Droid Serif', 'Droid Serif', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Droid%20Serif', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'FreeMono', 'GNU FreeFont', 'GNU', 'GNU', 'https://www.gnu.org/software/freefont/', 'GPL', 'http://www.gnu.org/copyleft/gpl.html'),
( 'FreeSans', 'GNU FreeFont', 'GNU', 'GNU', 'https://www.gnu.org/software/freefont/', 'GPL', 'http://www.gnu.org/copyleft/gpl.html'),
( 'FreeSerif', 'GNU FreeFont', 'GNU', 'GNU', 'https://www.gnu.org/software/freefont/', 'GPL', 'http://www.gnu.org/copyleft/gpl.html'),
( 'Gentium Plus', 'Gentium Plus', 'SIL', 'SIL', 'http://scripts.sil.org/gentium_download', 'OFL', 'http://scripts.sil.org/OFL'),
( 'HAN NOM A', 'Han Nom A', 'Viet Unicode', 'Viet Unicode', 'http://vietunicode.sourceforge.net/fonts/fonts_hannom.html', '', ''),
( 'HAN NOM B', 'Han Nom B', 'Viet Unicode', 'Viet Unicode', 'http://vietunicode.sourceforge.net/fonts/fonts_hannom.html', '', ''),
( 'IndUni-T', 'IndUni-T', 'URW++, John Smith', '', 'http://bombay.indology.info/software/fonts/induni/', 'GPL', 'http://www.gnu.org/copyleft/gpl.html'),
( 'Junicode', 'Junicode', 'Peter S. Baker', 'Junicode', 'http://junicode.sourceforge.net/', 'OFL', 'http://scripts.sil.org/OFL'),
( 'Manchu2005', 'Manchu2005', 'Manchu Group', 'Manchu Group', 'http://sourceforge.net/projects/manchufont/', 'GPL', 'http://www.gnu.org/copyleft/gpl.html'),
( 'Maya', 'Maya', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Miao Unicode', 'Miao Unicode', 'https://github.com/phjamr', '', 'http://phjamr.github.io/miao.html', 'OFL', 'http://scripts.sil.org/OFL'),
( 'MPH 2B Damase', 'MPH 2B Damase', 'Mark Williamson', 'WAZU JAPAN', 'http://www.wazu.jp/gallery/views/View_MPH2BDamase.html', '', ''),
( 'Musica', 'Musica', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Myanmar3', 'MyanMar NLP 3', 'MyanMar NLP', 'MyanMar NLP', 'http://code.google.com/p/myanmar3source/', 'CC BY 3.0', 'http://creativecommons.org/licenses/by/3.0/'),
( 'Noto Naskh', 'Noto Naskh', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Naskh UI', 'Noto Naskh UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans', 'Noto Sans', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Armenian', 'Noto Sans Armenian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Avestan', 'Noto Sans Avestan', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Balinese', 'Noto Sans Balinese', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Bamum', 'Noto Sans Bamum', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Batak', 'Noto Sans Batak', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Bengali', 'Noto Sans Bengali', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Bengali UI', 'Noto Sans Bengali UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Brahmi', 'Noto Sans Brahmi', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Buginese', 'Noto Sans Buginese', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Buhid', 'Noto Sans Buhid', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Canadian Aboriginal', 'Noto Sans Canadian Aboriginal', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Carian', 'Noto Sans Carian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Cham', 'Noto Sans Cham', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Cherokee', 'Noto Sans Cherokee', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Coptic', 'Noto Sans Coptic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Cypriot', 'Noto Sans Cypriot', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Deseret', 'Noto Sans Deseret', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Devanagari', 'Noto Sans Devanagari', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Devanagari UI', 'Noto Sans Devanagari UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Egyptian Hieroglyphs', 'Noto Sans Egyptian Hieroglyphs', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Ethiopic', 'Noto Sans Ethiopic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Georgian', 'Noto Sans Georgian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Glagolitic', 'Noto Sans Glagolitic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Gothic', 'Noto Sans Gothic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Gujarati', 'Noto Sans Gujarati', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Gujarati UI', 'Noto Sans Gujarati UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Gurmukhi', 'Noto Sans Gurmukhi', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Gurmukhi UI', 'Noto Sans Gurmukhi UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Hanunoo', 'Noto Sans Hanunoo', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Hebrew', 'Noto Sans Hebrew', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Imperial Aramaic', 'Noto Sans Imperial Aramaic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Javanese', 'Noto Sans Javanese', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Kaithi', 'Noto Sans Kaithi', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Kannada', 'Noto Sans Kannada', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Kannada UI', 'Noto Sans Kannada UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Kayah Li', 'Noto Sans Kayah Li', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Kharoshthi', 'Noto Sans Kharoshthi', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Khmer', 'Noto Sans Khmer', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Khmer UI', 'Noto Sans Khmer UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Kufi Arabic', 'Noto Sans Kufi Arabic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Lao', 'Noto Sans Lao', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Lao UI', 'Noto Sans Lao UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Lepcha', 'Noto Sans Lepcha', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Limbu', 'Noto Sans Limbu', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Linear B', 'Noto Sans Linear B', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Lisu', 'Noto Sans Lisu', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Lycian', 'Noto Sans Lycian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Lydian', 'Noto Sans Lydian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Malayalam', 'Noto Sans Malayalam', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Malayalam UI', 'Noto Sans Malayalam UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Mandaic', 'Noto Sans Mandaic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Meetei Mayek', 'Noto Sans Meetei Mayek', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Mongolian', 'Noto Sans Mongolian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Myanmar', 'Noto Sans Myanmar', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Myanmar UI', 'Noto Sans Myanmar UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans New Tai Lue', 'Noto Sans New Tai Lue', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans NKo', 'Noto Sans NKo', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Ogham', 'Noto Sans Ogham', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Ol Chiki', 'Noto Sans Ol Chiki', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Old Italic', 'Noto Sans Old Italic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Old Persian', 'Noto Sans Old Persian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Old South Arabian', 'Noto Sans Old South Arabian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Old Turkic', 'Noto Sans Old Turkic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Osmanya', 'Noto Sans Osmanya', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Pahlavi', 'Noto Sans Pahlavi', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Parthian', 'Noto Sans Parthian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Phags Pa', 'Noto Sans Phags Pa', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Phoenician', 'Noto Sans Phoenician', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Rejang', 'Noto Sans Rejang', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Runic', 'Noto Sans Runic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Samaritan', 'Noto Sans Samaritan', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Saurashtra', 'Noto Sans Saurashtra', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Shavian', 'Noto Sans Shavian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Sinhala', 'Noto Sans Sinhala', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Sumero Akkadian Cuneiform', 'Noto Sans Sumero Akkadian Cuneiform', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Sundanese', 'Noto Sans Sundanese', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Syloti Nagri', 'Noto Sans Syloti Nagri', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Symbols', 'Noto Sans Symbols', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Syriac Eastern', 'Noto Sans Syriac Eastern', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Syriac Estrangela', 'Noto Sans Syriac Estrangela', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Syriac Western', 'Noto Sans Syriac Western', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tagalog', 'Noto Sans Tagalog', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tagbanwa', 'Noto Sans Tagbanwa', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tai Le', 'Noto Sans Tai Le', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tai Tham', 'Noto Sans Tai Tham', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tai Viet', 'Noto Sans Tai Viet', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tamil', 'Noto Sans Tamil', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tamil UI', 'Noto Sans Tamil UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Telugu', 'Noto Sans Telugu', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Telugu UI', 'Noto Sans Telugu UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Thai', 'Noto Sans Thai', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Thai UI', 'Noto Sans Thai UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Tifinagh', 'Noto Sans Tifinagh', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Ugaritic', 'Noto Sans Ugaritic', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans UI', 'Noto Sans UI', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Vai', 'Noto Sans Vai', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Sans Yi', 'Noto Sans Yi', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Serif', 'Noto Serif', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Serif Armenian', 'Noto Serif Armenian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Serif Georgian', 'Noto Serif Georgian', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Serif Khmer', 'Noto Serif Khmer', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Serif Lao', 'Noto Serif Lao', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Noto Serif Thai', 'Noto Serif Thai', 'Google', 'Google', 'https://code.google.com/p/noto/', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Quivira', 'Quivira', 'Alexander Lange', '', 'http://www.quivira-font.com/', '', 'http://en.quivira-font.com/notes.php'),
( 'Roboto', 'Roboto', 'Christian Robertson', 'Google', 'http://www.google.com/fonts/specimen/Roboto', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Roboto Condensed', 'Roboto Condensed', 'Christian Robertson', 'Google', 'http://www.google.com/fonts/specimen/Roboto+Condensed', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'Source Code Pro', 'Source Code Pro', 'Adobe', 'Adobe', 'https://github.com/adobe/source-code-pro', 'OFL', 'http://scripts.sil.org/OFL'),
( 'Source Sans Pro', 'Source Sans Pro', 'Adobe', 'Adobe', 'https://github.com/adobe/source-sans-pro', 'OFL', 'http://scripts.sil.org/OFL'),
( 'STIX', 'STIX', 'STI Pub', 'STI Pub', 'http://www.stixfonts.org/', 'OFL', 'http://scripts.sil.org/OFL'),
( 'STIX Math', 'STIX Math', 'STI Pub', 'STI Pub', 'http://www.stixfonts.org/', 'OFL', 'http://scripts.sil.org/OFL'),
( 'Symbola', 'Symbola', 'George Douros', '', 'http://users.teilar.gr/~g1951d/', 'Fonts in this site are offered free for any use; they may be installed, embedded, opened, edited, modified, regenerated, posted, packaged and redistributed.', ''),
( 'Tibetan Machine Unicode', 'Tibetan Machine Unicode', 'Tony Duff, THL', '', 'https://collab.itc.virginia.edu/wiki/tibetan-script/Tibetan%20Machine%20Uni.html', 'GPL', 'http://www.gnu.org/copyleft/gpl.html'),
( 'Tinos', 'Tinos', 'Ascender Fonts', 'Google', 'https://www.google.com/fonts/specimen/Tinos', 'Apache License 2.0', 'http://www.apache.org/licenses/LICENSE-2.0.html'),
( 'UnBatang', 'UnBatang', 'KLDP', '', 'http://kldp.net/projects/unfonts/', 'GPL', 'http://www.gnu.org/copyleft/gpl.html'),
( 'UnDinaru', 'UnDinaru', 'KLDP', '', 'http://kldp.net/projects/unfonts/', 'GPL', 'http://www.gnu.org/copyleft/gpl.html');
