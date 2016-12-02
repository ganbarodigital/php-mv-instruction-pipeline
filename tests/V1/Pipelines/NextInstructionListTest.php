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
 * @package   InstructionPipeline/Pipelines
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2016-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-instruction-pipeline
 */

namespace GanbaroDigitalTest\InstructionPipeline\V1\Pipelines;

use GanbaroDigital\InstructionPipeline\V1\interfaces\NextInstruction;
use GanbaroDigital\InstructionPipeline\V1\Pipelines\NextInstructionList;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass GanbaroDigital\InstructionPipeline\V1\Pipelines\NextInstructionList
 */
class NextInstructionListTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     */
    public function testCanInstantiate()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new NextInstructionList([]);

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(NextInstructionList::class, $unit);
    }

    /**
     * @covers ::__construct
     */
    public function test_is_NextInstruction()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new NextInstructionList([]);

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(NextInstruction::class, $unit);
    }

    /**
     * @covers ::__invoke
     */
    public function test___invoke_calls_instructions_in_order()
    {
        // ----------------------------------------------------------------
        // setup your test

        $expectedCalledList = [
            'function1',
            'function2'
        ];

        $unit = new NextInstructionList([
            function(NextInstruction $next, array $calledList) {
                $calledList[] = 'function1';
                return $next($calledList);
            },
            function(NextInstruction $next, array $calledList) {
                $calledList[] = 'function2';
                return $next($calledList);
            },
        ]);

        // ----------------------------------------------------------------
        // perform the change

        $actualCalledList = $unit([]);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedCalledList, $actualCalledList);
    }

    /**
     * @covers ::__invoke
     */
    public function test___invoke_passes_parameters_to_next_instruction()
    {
        // ----------------------------------------------------------------
        // setup your test

        // we get two values back, because our second function calls $next()
        // with two parameters
        $expectedResult = [
            'alfred',
            'guthrum'
        ];

        $unit = new NextInstructionList([
            function(NextInstruction $next) {
                return $next('alfred', 'guthrum');
            },
            function(NextInstruction $next, $saxon, $viking) {
                return $next($saxon, $viking);
            },
        ]);

        // ----------------------------------------------------------------
        // perform the change

        $actualResult = $unit();

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedResult, $actualResult);
    }

    /**
     * @covers ::__invoke
     * @expectedException GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineError
     */
    public function test___invoke_throws_InstructionPipelineError_if_non_callable_in_list()
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new NextInstructionList([
            function(NextInstruction $next) {
                return $next('alfred', 'guthrum');
            },
            true
        ]);

        // ----------------------------------------------------------------
        // perform the change

        $unit();

        // ----------------------------------------------------------------
        // test the results

    }
}
