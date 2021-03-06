<?php

namespace SilverStripe\Forms\Tests;


use Mockery;

use SilverStripe\Forms\SegmentFieldModifier\IDSegmentFieldModifier;
use stdClass;
use SilverStripe\Dev\SapphireTest;


/**
 * @cover IDSegmentFieldModifier
 */
class IDSegmentFieldModifierTest extends SapphireTest {
	/**
	 * @inheritdoc
	 */
	public function tearDown() {
		Mockery::close();

		parent::tearDown();
	}

	/**
	 * @test
	 */
	public function testGetPreview() {
		$modifier = new IDSegmentFieldModifier();

		$this->assertEquals('', $modifier->getPreview(''));

		$modifier->setForm($this->getNewFormMock());

		$this->assertEquals('123', $modifier->getPreview(''));
		$this->assertEquals('', $modifier->getSuggestion(''));
	}

	/**
	 * @return Form
	 */
	protected function getNewFormMock() {
		$record = new StdClass();
		$record->ID = 123;

		$mock = Mockery::mock('SilverStripe\\Forms\\Form');
		$mock->shouldReceive('getRecord')->andReturn($record);

		return $mock;
	}
}
