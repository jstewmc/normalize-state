<?php
/**
 * The file for the normalize-state service
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2017 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\NormalizeState;

/**
 * The normalize-state service
 *
 * I'll attempt to return a state in its downcase, long-form (in a case-, 
 * whitespace-, and trailing-period-insensitive way):
 *
 *     $service = new NormalizeState();
 *
 *     $service('CO');   // returns "colorado"
 *     $service('co');   // returns "colorado"
 *     $service('CO.');  // returns "colorado"
 * 
 * @since  0.1.0
 */
class NormalizeState
{
	/* !Constants */
	
	/**
	 * @var    string[]  an array of US states (including armed forces "states" 
	 *     indexed by abbreviation)
	 * @see    https://pe.usps.com/text/pub28/28apb.htm  a list of standard USPS
	 *     state and armed forces abbreviations (access May 29, 2017)
	 * @since  0.1.0
	 */ 
	const STATES = [
		// us states
		'al' => 'alabama',
		'ak' => 'alaska',
		'as' => 'american samoa',
		'az' => 'arizona',
		'ar' => 'arkansas',
		'ca' => 'california',
		'co' => 'colorado',
		'ct' => 'connecticut',
		'de' => 'delaware',
		'dc' => 'district of columbia',
		'fm' => 'federated states of micronesia',
		'fl' => 'florida',
		'ga' => 'georgia',
		'gu' => 'guam gu',
		'hi' => 'hawaii',
		'id' => 'idaho',
		'il' => 'illinois',
		'in' => 'indiana',
		'ia' => 'iowa',
		'ks' => 'kansas',
		'ky' => 'kentucky',
		'la' => 'louisiana',
		'me' => 'maine',
		'mh' => 'marshall islands',
		'md' => 'maryland',
		'ma' => 'massachusetts',
		'mi' => 'michigan',
		'mn' => 'minnesota',
		'ms' => 'mississippi',
		'mo' => 'missouri',
		'mt' => 'montana',
		'ne' => 'nebraska',
		'nv' => 'nevada',
		'nh' => 'new hampshire',
		'nj' => 'new jersey',
		'nm' => 'new mexico',
		'ny' => 'new york',
		'nc' => 'north carolina',
		'nd' => 'north dakota',
		'mp' => 'northern mariana islands',
		'oh' => 'ohio',
		'ok' => 'oklahoma',
		'or' => 'oregon',
		'pw' => 'palau',
		'pa' => 'pennsylvania',
		'pr' => 'puerto rico',
		'ri' => 'rhode island',
		'sc' => 'south carolina',
		'sd' => 'south dakota',
		'tn' => 'tennessee',
		'tx' => 'texas',
		'ut' => 'utah',
		'vt' => 'vermont',
		'vi' => 'virgin islands',
		'va' => 'virginia',
		'wa' => 'washington',
		'wv' => 'west virginia',
		'wi' => 'wisconsin',
		'wy' => 'wyoming',
		
		// armed forces "states"
		'aa' => 'armed forces americas (except canada)',		
		'ap' => 'armed forces pacific',
		'ae' => 'armed forces europe, the middle east, and canado'
	];
	
	
	/* !Magic methods */
	
	/**
	 * Called when the class is constructed
	 *
	 * @param  ExpandAbbreviations  $expandAbbreviations  an implementation of the
	 *     expand-abbreviations service interface (optional; if omitted, defaults to 
	 *     the DefaultExpandAbbreviations service)
	 * @since  0.1.0
	 */
	public function __construct(ExpandAbbreviations $expandAbbreviations = null)
	{
		if ( ! $expandAbbreviations) {
			$expandAbbreviations = new DefaultExpandAbbreviations(self::STATES);	
		}
		
		$this->expandAbbreviations = $expandAbbreviations;
	}
	
	/**
	 * Called when the class is treated like a function
	 *
	 * @param   string  $state  the state to normalize
	 * @return  string
	 * @since   0.1.0
	 */
	public function __invoke(string $state): string
	{
		// trim, lower-case, and expand the state name
		return ($this->expandAbbreviations)(strtolower(trim($state)));
	}
}
