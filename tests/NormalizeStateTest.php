<?php
/**
 * The file for the normalize-state tests
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2017 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\NormalizeState;

use Jstewmc\TestCase\TestCase;

/**
 * Tests for the normalize-state service
 */
class NormalizeStateTest extends TestCase
{
	/**
	 * __construct() should set the service's properties if the dependency is 
	 *     injected
	 */
	public function testConstructIfDependencyInjected(): void 
	{
		$expandAbbreviations = $this->createMock(ExpandAbbreviations::class);
		
		$service = new NormalizeState($expandAbbreviations);
		
		$this->assertSame(
			$expandAbbreviations, 
			$this->getProperty('expandAbbreviations', $service)
		);
		
		return;
	}
	
	/**
	 * __construct() should set the service's properties if the dependency is not 
	 *     injected
	 */
	public function testConstructIfDependencyNotInjected(): void
	{
		$service = new NormalizeState();
		
		$this->assertInstanceOf(
			DefaultExpandAbbreviations::class, 
			$this->getProperty('expandAbbreviations', $service)
		);
		
		return;
	}
	
	/**
	 * __invoke() should return string if state is abbreviation
	 */
	public function testInvokeReturnsStringIfStateIsAbbreviation(): void
	{
		$this->assertEquals('colorado', (new NormalizeState())('co'));
		
		return;
	}
	
	/**
	 * __invoke() should return string if state is not abbreviation
	 */
	public function testInvokeReturnsStringIfStateIsNotAbbreviation(): void
	{
		$this->assertEquals('colorado', (new NormalizeState())('colorado'));
		
		return;
	}
	
	/**
	 * __invoke() should return string if state has whitespace
	 */
	public function testInvokeReturnsStringIfStateHasWhitespace(): void
	{
		$this->assertEquals('colorado', (new NormalizeState())('   co   '));
		
		return;
	}
	
	/**
	 * __invoke() should return string if state has trailing period
	 */
	public function testInvokeReturnsStringIfStateHasTrailingPeriod(): void
	{
		$this->assertEquals('colorado', (new NormalizeState())('co.'));
		
		return;
	}
	
	/**
	 * __invoke() should return string if state has mixed case
	 */
	public function testInvokeReturnsStringIfStateHasMixedCase(): void
	{
		$this->assertEquals('colorado', (new NormalizeState())('CO'));
		
		return;
	}
}
