<?php
/**
 * The expand-abbreviations service interface
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2017 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\NormalizeState;

/**
 * The expand-abbreviations service interface
 *
 * The expand-abbreviations service should replace all occurrences of a list of 
 * abbreviations with their replacements in a string.
 *
 * For example, given a list of replacements ["foo" => "bar", "bar" => "baz"], the 
 * service should expand "foo bar baz" should "bar baz baz".
 * 
 * @since  0.1.0
 */
interface ExpandAbbreviations 
{
	/**
	 * Called when the service is treated as a function
	 *
	 * @param   string  $string  the string to expand
	 * @return  string
	 * @since   0.1.0
	 */
	public function __invoke(string $string): string;
}
