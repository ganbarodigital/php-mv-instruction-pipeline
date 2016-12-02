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
 * @package   InstructionPipeline/PipelineBuilders
 * @author    Stuart Herbert <stuherbert@ganbarodigital.com>
 * @copyright 2016-present Ganbaro Digital Ltd www.ganbarodigital.com
 * @license   http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link      http://ganbarodigital.github.io/php-mv-instruction-pipeline
 */

namespace GanbaroDigitalTest\InstructionPipeline\V1\PipelineBuilders;

use GanbaroDigital\InstructionPipeline\V1\Exceptions\CannotFindInstructionBuilder;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\NotAnInstruction;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\NotAnInstructionBuilder;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineExceptions;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\UnsupportedType;
use GanbaroDigital\InstructionPipeline\V1\Interfaces\InstructionPipeline;
use GanbaroDigital\InstructionPipeline\V1\PipelineBuilders\BuildInstructionPipeline;
use GanbaroDigital\InstructionPipeline\V1\Pipelines\NextInstructionList;
use GanbaroDigitalTest\InstructionPipeline\V1\Fixtures;
use PHPUnit_Framework_TestCase;

// load our test fixtures
//
// we do this the old-fashioned way because
//
// 1. we do not want composer to include our test code in its autoloader
// 1. this version of PHPUnit does not support PSR-0 / PSR-4 natively
require_once(__DIR__ . '/../Fixtures/include.php');

/**
 * @coversDefaultClass GanbaroDigital\InstructionPipeline\V1\PipelineBuilders\BuildInstructionPipeline
 */
class BuildInstructionPipelineTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers ::from
     */
    public function test_can_build_bi_directional_pipeline()
    {
        // ----------------------------------------------------------------
        // setup your test

        $expectedConfig = [
            'param1' => 1,
            'param2' => 2
        ];

        $definition = [
            Fixtures\BuildNoOpInstruction::class => $expectedConfig
        ];

        $expectedPipeline = [
            InstructionPipeline::DI_FORWARD => new NextInstructionList([
                new Fixtures\NoOpForwardInstruction($expectedConfig)
            ]),
            InstructionPipeline::DI_REVERSE => new NextInstructionList([
                new Fixtures\NoOpReverseInstruction($expectedConfig)
            ]),
        ];

        // ----------------------------------------------------------------
        // perform the change

        $actualPipeline = BuildInstructionPipeline::from($definition);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedPipeline, $actualPipeline);
    }

    /**
     * @covers ::from
     */
    public function test_can_build_forward_directional_pipeline()
    {
        // ----------------------------------------------------------------
        // setup your test

        $expectedConfig1 = [
            'config1' => 1,
            'config2' => 2
        ];

        $expectedConfig2 = [
            'config2' => 2,
            'config3' => 3
        ];

        $expectedConfig3 = [
            'config3' => 3,
            'config4' => 4
        ];

        $expectedConfig4 = [
            'config4' => 4,
            'config5' => 5
        ];

        $expectedConfig5 = [
            'config5' => 5,
            'config6' => 6
        ];

        $definition = [
            Fixtures\BuildNoOpInstruction::class => $expectedConfig1,
            Fixtures\BuildReverseParamsInstruction::class => $expectedConfig2,
            Fixtures\BuildSortParamsInstruction::class => $expectedConfig3,
            Fixtures\BuildReverseSortParamsInstruction::class => $expectedConfig4,
            Fixtures\BuildSplitParamsInstruction::class => $expectedConfig5,
        ];

        $expectedPipeline = [
            InstructionPipeline::DI_FORWARD => new NextInstructionList([
                new Fixtures\NoOpForwardInstruction($expectedConfig1),
                new Fixtures\ReverseParamsInstruction($expectedConfig2),
                new Fixtures\SortParamsInstruction($expectedConfig3),
                new Fixtures\ReverseSortParamsInstruction($expectedConfig4),
                new Fixtures\SplitParamsInstruction($expectedConfig5),
            ]),
        ];

        // ----------------------------------------------------------------
        // perform the change

        $actualPipeline = BuildInstructionPipeline::from($definition, InstructionPipeline::DI_FORWARD);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedPipeline, $actualPipeline);
    }

    /**
     * @covers ::from
     */
    public function test_can_build_reverse_directional_pipeline()
    {
        // ----------------------------------------------------------------
        // setup your test

        $expectedConfig1 = [
            'config1' => 1,
            'config2' => 2
        ];

        $expectedConfig2 = [
            'config2' => 2,
            'config3' => 3
        ];

        $expectedConfig3 = [
            'config3' => 3,
            'config4' => 4
        ];

        $expectedConfig4 = [
            'config4' => 4,
            'config5' => 5
        ];

        $expectedConfig5 = [
            'config5' => 5,
            'config6' => 6
        ];

        $definition = [
            Fixtures\BuildNoOpInstruction::class => $expectedConfig1,
            Fixtures\BuildReverseParamsInstruction::class => $expectedConfig2,
            Fixtures\BuildSortParamsInstruction::class => $expectedConfig3,
            Fixtures\BuildReverseSortParamsInstruction::class => $expectedConfig4,
            Fixtures\BuildSplitParamsInstruction::class => $expectedConfig5,
        ];

        // the contents of our pipeline are in reverse order,
        // and we have a 'NoOpReverseInstruction' to prove that we're
        // building different instructions based on the direction of
        // the pipeline
        $expectedPipeline = [
            InstructionPipeline::DI_REVERSE => new NextInstructionList([
                new Fixtures\SplitParamsInstruction($expectedConfig5),
                new Fixtures\ReverseSortParamsInstruction($expectedConfig4),
                new Fixtures\SortParamsInstruction($expectedConfig3),
                new Fixtures\ReverseParamsInstruction($expectedConfig2),
                new Fixtures\NoOpReverseInstruction($expectedConfig1),
            ]),
        ];

        // ----------------------------------------------------------------
        // perform the change

        $actualPipeline = BuildInstructionPipeline::from($definition, InstructionPipeline::DI_REVERSE);

        // ----------------------------------------------------------------
        // test the results

        $this->assertEquals($expectedPipeline, $actualPipeline);
    }
}
