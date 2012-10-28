<?php
/**
 * @package    Joomla.UnitTest
 *
 * @copyright  Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

include_once JPATH_PLATFORM . '/platform.php';

/**
 * JPlatformTest
 *
 * Test class for JPlatform.
 * Generated by PHPUnit on 2009-10-08 at 21:36:41.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Utilities
 * @since       11.1
 */
class JPlatformTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var    JPlatform
	 */
	protected $object;

	protected $PRODUCT = 'Joomla!';

	protected $RELEASE = '12.23';

	protected $DEV_STATUS = 'Testing';

	protected $DEV_LEVEL = '999';

	protected $BUILD = '99999';

	protected $CODENAME = 'Desperation';

	protected $RELDATE = '22-June-3109';

	protected $RELTIME = '13:13';

	protected $RELTZ = 'CDT';

	protected $COPYRIGHT = 'Copyright (C) 2005 - 3109 Open Source Matters. All rights reserved.';

	protected $URL = '<a href="http://www.joomla.org">Joomla!</a> is Free Software released under the GNU General Public License.';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{

	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 *
	 * @return void
	 */
	protected function tearDown()
	{
	}

	/**
	 * This checks for the correct Short Version.
	 *
	 * @return void
	 */
	public function testGetShortVersion()
	{
		$this->markTestSkipped('The platform version number is not tested');
	}

	/**
	 * Compatibility test cases
	 *
	 * @return array
	 */
	function casesCompatibility()
	{
		return array(
			'wrong' => array(
				'0.3',
				false,
				'Should not be compatible with 0.3',
			),
			'empty' => array(
				'',
				false,
				'Should not be compatible with empty string',
			),
			'null' => array(
				null,
				false,
				'Should not be compatible with null',
			),
			'itself' => array(
				JPlatform::RELEASE . '.' . JPlatform::MAINTENANCE,
				true,
				'Should be compatible with itself',
			),
			'version 1.5.22' => array(
				'1.5.22',
				false,
				'Should not be compatible with 1.5.22',
			),
			'version 1.7.0' => array(
				'1.7.0',
				false,
				'Should not be compatible with 1.7.0',
			),
		);

	}

	/**
	 * This checks the compatibility testing method.
	 *
	 * @param   string  $input    Version
	 * @param   bool    $expect   expected result of version check
	 * @param   string  $message  Test failure message
	 *
	 * @dataProvider casesCompatibility
	 * @return void
	 */
	public function testIsCompatible($input, $expect, $message)
	{
		$this->assertThat(
			$expect,
			$this->equalTo(JPlatform::isCompatible($input)),
			$message
		);
	}

	/**
	 * This checks for correct operation of the __set_state() magic function, if it exists.
	 *
	 * @return void
	 */
	public function testSetState()
	{
		if (method_exists('JPlatform', '__set_state'))
		{
			$testData = array(
				'PRODUCT' => 'Joomla!',
				'RELEASE' => '1.6',
				'DEV_STATUS' => 'Alpha',
				'DEV_LEVEL' => '0',
				'BUILD' => '',
				'CODENAME' => 'Hope',
				'RELDATE' => '22-June-2009',
				'RELTIME' => '23:00',
				'RELTZ' => 'GMT',
				'COPYRIGHT' => 'Copyright (C) 2005 - 2012 Open Source Matters. All rights reserved.',
				'URL' => '<a href="http://www.joomla.org">Joomla!</a> is Free Software released under the GNU General Public License.'
			);

			$testInstance = $this->object->__set_state($testData);

			foreach ($testData as $key => $value)
			{
				$this->assertThat(
					$testInstance->$key,
					$this->equalTo($value)
				);
			}
			$this->assertThat(
				$testInstance,
				$this->isInstanceOf('JPlatform')
			);
		}
	}
}
