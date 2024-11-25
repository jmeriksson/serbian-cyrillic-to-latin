<?php
/*
 * Plugin Name: Serbian Cyrillic to Latin
 * Plugin URI: https://github.com/jmeriksson/serbian-cyrillic-to-latin
 * Description: Converts Serbian Cyrillic characters to Latin characters.
 * Author: Mikael Eriksson
 * Author URI: https://mikaeleriksson.nu
 * Version: 1.0.0
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

namespace SCTL;

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access is not allowed.' );
}

class Serbian_Cyrillic_To_Latin {
    /**
     * Array of Serbian Cyrillic characters and their Latin counterparts.
     */
    public array $replace = array(
        "А" => "A",
        "Б" => "B",
        "В" => "V",
        "Г" => "G",
        "Д" => "D",
        "Ђ" => "Đ",
        "Е" => "E",
        "Ж" => "Ž",
        "З" => "Z",
        "И" => "I",
        "Ј" => "J",
        "К" => "K",
        "Л" => "L",
        "Љ" => "Lj",
        "М" => "M",
        "Н" => "N",
        "Њ" => "Nj",
        "О" => "O",
        "П" => "P",
        "Р" => "R",
        "С" => "S",
        "Т" => "T",
        "Ћ" => "Ć",
        "У" => "U",
        "Ф" => "F",
        "Х" => "H",
        "Ц" => "C",
        "Ч" => "Č",
        "Џ" => "Dž",
        "Ш" => "Š",
        "а" => "a",
        "б" => "b",
        "в" => "v",
        "г" => "g",
        "д" => "d",
        "ђ" => "đ",
        "е" => "e",
        "ж" => "ž",
        "з" => "z",
        "и" => "i",
        "ј" => "j",
        "к" => "k",
        "л" => "l",
        "љ" => "lj",
        "м" => "m",
        "н" => "n",
        "њ" => "nj",
        "о" => "o",
        "п" => "p",
        "р" => "r",
        "с" => "s",
        "т" => "t",
        "ћ" => "ć",
        "у" => "u",
        "ф" => "f",
        "х" => "h",
        "ц" => "c",
        "ч" => "č",
        "џ" => "dž",
        "ш" => "š",
    );

    public function __construct() {
        add_action( 'gettext', array($this, 'convert_serbian_cyrillic_to_latin'), 10, 1 );
        add_action( 'gettext_with_context', array($this, 'convert_serbian_cyrillic_to_latin'), 10, 1 );
        add_action( 'ngettext', array($this, 'convert_serbian_cyrillic_to_latin'), 10, 1 );
        add_action( 'ngettext_with_context', array($this, 'convert_serbian_cyrillic_to_latin'), 10, 1 );
    }

    /**
     * Converts Serbian Cyrillic characters to Latin characters.
     */
    public function convert_serbian_cyrillic_to_latin( string $translation) : string {
        if ( ! $this->is_serbian_locale() ) {
            return $translation;
        }
        return strtr( $translation, $this->replace );
    }

    /**
     * Checks if the current locale is Serbian.
     */
    public function is_serbian_locale() : bool {
        return get_locale() === 'sr_RS';
    }
}

$sctl = new Serbian_Cyrillic_To_Latin();
