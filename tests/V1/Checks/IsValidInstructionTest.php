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
 * @package   InstructionPipeline/Checks
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2016-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-instruction-pipeline
 */

namespace GanbaroDigitalTest\InstructionPipeline\V1\Checks;

use GanbaroDigital\InstructionPipeline\V1\Checks\IsValidInstruction;
use GanbaroDigital\InstructionPipeline\V1\Instruction;
use GanbaroDigital\MissingBits\Checks\Check;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass GanbaroDigital\InstructionPipeline\V1\Checks\IsValidInstruction
 */
class IsValidInstructionTest extends PHPUnit_Framework_TestCase
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

        $unit = new IsValidInstruction();

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(IsValidInstruction::class, $unit);
    }

    /**
     * @coversNothing
     */
    public function test_is_Check()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new IsValidInstruction();

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(Check::class, $unit);
    }

    /**
     * @covers ::check
     * @covers ::inspect
     */
    public function test_accepts_Instruction_instances()
    {
        // ----------------------------------------------------------------
        // setup your test

        $item = new IsValidInstructionTest_Instruction();
        $unit = new IsValidInstruction();

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = $unit->inspect($item);

        // ----------------------------------------------------------------
        // test the results

        $this->assertTrue($actualResult);
    }

    /**
     * @covers ::check
     * @covers ::inspect
     * @dataProvider provideNonInstructions
     */
    public function test_rejects_everything_else($item)
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new IsValidInstruction();

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = $unit->inspect($item);

        // ----------------------------------------------------------------
        // test the results

        $this->assertFalse($actualResult);
    }

    public function provideNonInstructions()
    {
        return [
            "null" => [ null ],
            "empty array" => [ [] ],
            "simple array" => [ 1,2,3,4 ],
            "array of instructions" => [ [new IsValidInstructionTest_Instruction] ],
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
            "string" => [ "hello, world!" ],
        ];
    }
}

class IsValidInstructionTest_Instruction implements Instruction
{
    public function process($params)
    {
        // do nothing
    }
}
