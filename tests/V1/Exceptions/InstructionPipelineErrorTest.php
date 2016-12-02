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

use GanbaroDigital\ExceptionHelpers\V1\BaseExceptions\ParameterisedException;
use GanbaroDigital\ExceptionHelpers\V1\Callers\Values\CodeCaller;
use GanbaroDigital\HttpStatus\Interfaces\HttpException;
use GanbaroDigital\HttpStatus\StatusValues\RuntimeError\UnexpectedErrorStatus;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineError;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineException;
use PHPUnit_Framework_TestCase;
use RuntimeException;

/**
 * @coversDefaultClass GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineError
 */
class InstructionPipelineErrorTest extends PHPUnit_Framework_TestCase
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

        $unit = new InstructionPipelineError('');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(InstructionPipelineError::class, $unit);
    }

    /**
     * @covers ::__construct
     */
    public function test_is_InstructionPipelineException()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new InstructionPipelineError('');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(InstructionPipelineException::class, $unit);
    }

    /**
     * @covers ::__construct
     */
    public function test_is_ParameterisedException()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new InstructionPipelineError('');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(ParameterisedException::class, $unit);
    }

    /**
     * @covers ::__construct
     */
    public function test_is_RuntimeException()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new InstructionPipelineError('');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(RuntimeException::class, $unit);
    }

    /**
     * @covers ::__construct
     */
    public function test_is_HttpException()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new InstructionPipelineError('');

        // ----------------------------------------------------------------
        // test the results

        $this->assertInstanceOf(HttpException::class, $unit);
    }

    /**
     * @covers ::__construct
     */
    public function test_maps_onto_HTTP_500()
    {
        // ----------------------------------------------------------------
        // setup your test

        // ----------------------------------------------------------------
        // perform the change

        $unit = new InstructionPipelineError('');

        // ----------------------------------------------------------------
        // test the results

        $httpStatus = $unit->getHttpStatus();
        $this->assertInstanceOf(UnexpectedErrorStatus::class, $httpStatus);
    }

    /**
     * @covers ::newFromInputParameter
     */
    public function testCanCreateFromInputParameter()
    {
        // ----------------------------------------------------------------
        // setup your test

        $data = "unit test at " . __LINE__;
        $extra = [
            'pipeline_key' => 0,
        ];

        $expectedMessage = 'ReflectionMethod->invokeArgs(): GanbaroDigitalTest\InstructionPipeline\V1\Exceptions\InstructionPipelineErrorTest->testCanCreateFromInputParameter()@203 says an error occurred at instruction \'0\'; error message is: \'unit test at 183\'';
        $expectedData = [
            'thrownBy' => new CodeCaller(self::class, __FUNCTION__, '->', __FILE__, __LINE__ + 13),
            'thrownByName' => 'GanbaroDigitalTest\InstructionPipeline\V1\Exceptions\InstructionPipelineErrorTest->testCanCreateFromInputParameter()@203',
            'calledBy' => new CodeCaller('ReflectionMethod', 'invokeArgs', '->', null, null),
            'calledByName' => 'ReflectionMethod->invokeArgs()',
            'fieldOrVarName' => '$data',
            'fieldOrVar' => $data,
            'dataType' => 'string<unit test at 183>',
            'pipeline_key' => 0,
        ];

        // ----------------------------------------------------------------
        // perform the change

        $unit = InstructionPipelineError::newFromInputParameter($data, '$data', $extra);

        // ----------------------------------------------------------------
        // test the results

        $actualMessage = $unit->getMessage();
        $actualData = $unit->getMessageData();

        $this->assertEquals($expectedMessage, $actualMessage);
        $this->assertEquals($expectedData, $actualData);
    }

    /**
     * @covers ::newFromVar
     */
    public function testCanCreateFromVariable()
    {
        // ----------------------------------------------------------------
        // setup your test

        $data = "unit test at " . __LINE__;
        $extra = [
            'pipeline_key' => 0,
        ];

        $expectedMessage = 'GanbaroDigitalTest\InstructionPipeline\V1\Exceptions\InstructionPipelineErrorTest->testCanCreateFromVariable()@241: an error occurred at instruction \'0\'; error message is: \'unit test at 223\'';
        $expectedData = [
            'thrownBy' => new CodeCaller(self::class, __FUNCTION__, '->', __FILE__, __LINE__ + 11),
            'thrownByName' => 'GanbaroDigitalTest\InstructionPipeline\V1\Exceptions\InstructionPipelineErrorTest->testCanCreateFromVariable()@241',
            'fieldOrVarName' => '$data',
            'fieldOrVar' => $data,
            'dataType' => 'string<unit test at 223>',
            'pipeline_key' => 0,
        ];

        // ----------------------------------------------------------------
        // perform the change

        $unit = InstructionPipelineError::newFromVar($data, '$data', $extra);

        // ----------------------------------------------------------------
        // test the results

        $actualMessage = $unit->getMessage();
        $actualData = $unit->getMessageData();

        $this->assertEquals($expectedMessage, $actualMessage);
        $this->assertEquals($expectedData, $actualData);
    }
}
