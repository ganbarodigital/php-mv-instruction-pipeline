<?php

/**
 * Copyright (c) 2016-present Ganbaro Digital Ltd
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category  Libraries
 * @package   InstructionPipeline/Requirements
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2016-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-instruction-pipeline
 */

namespace GanbaroDigitalTest\InstructionPipeline\V1\Requirements;

use GanbaroDigital\InstructionPipeline\V1\Requirements\RequireValidInstructionBuilderClass;
use GanbaroDigital\InstructionPipeline\V1\InstructionBuilders\InstructionBuilder;
use GanbaroDigital\Defensive\V1\Interfaces\Requirement;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass GanbaroDigital\InstructionPipeline\V1\Requirements\RequireValidInstructionBuilderClass
 */
class RequireValidInstructionBuilderClassTest extends PHPUnit_Framework_TestCase
{
    /**
     * @coversNothing
     */
    public function testCanInstantiate()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new RequireValidInstructionBuilderClass();

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(RequireValidInstructionBuilderClass::class, $unit);
    }

    /**
     * @coversNothing
     */
    public function test_is_Requirement()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new RequireValidInstructionBuilderClass();

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(Requirement::class, $unit);
    }

    /**
     * @covers ::apply
     * @covers ::to
     */
    public function test_accepts_InstructionBuilder_class_name()
    {
        // ----------------------------------------------------------------
        // setup your test

        $item = RequireValidInstructionBuilderClass_InstructionBuilder::class;

        // ----------------------------------------------------------------
        // perform the change

        RequireValidInstructionBuilderClass::apply()->to($item);

        // ----------------------------------------------------------------
        // test the results
        //
        // there should be no results - we should not get an exception
    }

    /**
     * @covers ::apply
     * @covers ::to
     * @dataProvider provideNonStrings
     * @expectedException GanbaroDigital\InstructionPipeline\V1\Exceptions\UnsupportedType
     */
    public function test_throws_UnsupportedType_for_non_strings($item)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        RequireValidInstructionBuilderClass::apply()->to($item);

        // ----------------------------------------------------------------
        // test the results
        //
        // there should be no results; we should get an exception
    }

    /**
     * @covers ::apply
     * @covers ::to
     * @dataProvider provideMissingClasses
     * @expectedException GanbaroDigital\InstructionPipeline\V1\Exceptions\CannotFindInstructionBuilder
     */
    public function test_throws_CannotFindInstructionBuilder_for_missing_classes($item)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        RequireValidInstructionBuilderClass::apply()->to($item);

        // ----------------------------------------------------------------
        // test the results
        //
        // there should be no results; we should get an exception
    }
    /**
     * @covers ::apply
     * @covers ::to
     * @dataProvider provideNonInstructionBuilders
     * @expectedException GanbaroDigital\InstructionPipeline\V1\Exceptions\NotAnInstructionBuilder
     */
    public function test_throws_NotAnInstructionBuilder_for_objects_that_are_not_InstructionBuilder($item)
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        RequireValidInstructionBuilderClass::apply()->to($item);

        // ----------------------------------------------------------------
        // test the results
        //
        // there should be no results; we should get an exception
    }

    public function provideNonStrings()
    {
        return [
            "null" => [ null ],
            "empty array" => [ [] ],
            "simple array" => [ 1,2,3,4 ],
            "array of instructions" => [ [new RequireValidInstructionBuilderClass_InstructionBuilder] ],
            "bool true" => [ true ],
            "bool false" => [ false ],
            "callable" => [ function(){} ],
            "double 0" => [ 0.0 ],
            "negative double" => [ -3.1415927 ],
            "positive double" => [ 3.1415927 ],
            "int 0" => [ 0 ],
            "negative int" => [ -100 ],
            "positive int" => [ 100 ],
            "object" => [ (object)[] ],
            "resource" => [ STDIN ],
        ];
    }

    public function provideMissingClasses()
    {
        return [
            "DoesNotExist" => [ "DoesNotExist" ],
        ];
    }

    public function provideNonInstructionBuilders()
    {
        return [
            "stdClass" => [ 'stdClass' ],
        ];
    }
}

class RequireValidInstructionBuilderClass_InstructionBuilder implements InstructionBuilder
{
}
