<?php
/**
 * The default expand-abbreviations service
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2017 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\NormalizeState;

/**
 * The default expand-abbreviations service
 *
 * While you can inject any implementation of the expand-abbreviations service you'd
 * like into the normalize-state service, this library provides a sensible default, 
 * the Jstewmc\ExpandAbbreviations\ExpandAbbreviations.
 * 
 * @see    https://github.com/jstewmc/expand-abbreviations
 * @since  0.1.0
 */
class DefaultExpandAbbreviations 
	extends \Jstewmc\ExpandAbbreviations\ExpandAbbreviations 
	implements ExpandAbbreviations 
{
	// nothing yet
}
