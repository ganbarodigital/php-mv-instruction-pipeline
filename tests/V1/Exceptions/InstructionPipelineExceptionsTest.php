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
 * @package   InstructionPipeline/Exceptions
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2016-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-instruction-pipeline
 */

namespace GanbaroDigitalTest\InstructionPipeline\V1\Exceptions;

use GanbaroDigital\InstructionPipeline\V1\Exceptions\CannotFindInstructionBuilder;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\NotAnInstruction;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\NotAnInstructionBuilder;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineExceptions;
use GanbaroDigital\DIContainers\V1\Interfaces\FactoryList;
use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineExceptions
 */
class InstructionPipelineExceptionsTest extends PHPUnit_Framework_TestCase
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

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(InstructionPipelineExceptions::class, $unit);
    }

    /**
     * @covers ::__construct
     */
    public function test_is_FactoryList()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(FactoryList::class, $unit);
    }

    /**
     * @covers ::offsetGet
     */
    public function test_has_factory_for_CannotFindInstructionBuilder_newFromInputParameter()
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // perform the change

        $factory = $unit['CannotFindInstructionBuilder::newFromInputParameter'];
        $exception = $factory(false, '$data');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(CannotFindInstructionBuilder::class, $exception);
    }

    /**
     * @covers ::offsetGet
     */
    public function test_has_factory_for_CannotFindInstructionBuilder_newFromVar()
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // perform the change

        $factory = $unit['CannotFindInstructionBuilder::newFromVar'];
        $exception = $factory(false, '$data');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(CannotFindInstructionBuilder::class, $exception);
    }

    /**
     * @covers ::offsetGet
     */
    public function test_has_factory_for_NotAnInstruction_newFromInputParameter()
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // perform the change

        $factory = $unit['NotAnInstruction::newFromInputParameter'];
        $exception = $factory(false, '$data');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(NotAnInstruction::class, $exception);
    }

    /**
     * @covers ::offsetGet
     */
    public function test_has_factory_for_NotAnInstruction_newFromVar()
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // perform the change

        $factory = $unit['NotAnInstruction::newFromVar'];
        $exception = $factory(false, '$data');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(NotAnInstruction::class, $exception);
    }

    /**
     * @covers ::offsetGet
     */
    public function test_has_factory_for_NotAnInstructionBuilder_newFromInputParameter()
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // perform the change

        $factory = $unit['NotAnInstructionBuilder::newFromInputParameter'];
        $exception = $factory(false, '$data');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(NotAnInstructionBuilder::class, $exception);
    }

    /**
     * @covers ::offsetGet
     */
    public function test_has_factory_for_NotAnInstructionBuilder_newFromVar()
    {
        // ----------------------------------------------------------------
        // setup your test

        $unit = new InstructionPipelineExceptions;

        // ----------------------------------------------------------------
        // perform the change

        $factory = $unit['NotAnInstructionBuilder::newFromVar'];
        $exception = $factory(false, '$data');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(NotAnInstructionBuilder::class, $exception);
    }
}
