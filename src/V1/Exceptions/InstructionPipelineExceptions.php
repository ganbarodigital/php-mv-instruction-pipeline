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

namespace GanbaroDigital\InstructionPipeline\V1\Exceptions;

use GanbaroDigital\DIContainers\V1\FactoryList\Containers\FactoryListContainer;

/**
 * a FactoryList of our exceptions and how to create them
 */
class InstructionPipelineExceptions extends FactoryListContainer
{
    /**
     * creates a FactoryList of exceptions and their factories
     */
    public function __construct()
    {
        // the exceptions that our library throws
        $ourExceptions = [
            'CannotFindInstructionBuilder::newFromInputParameter' => [ CannotFindInstructionBuilder::class, 'newFromInputParameter' ],
            'CannotFindInstructionBuilder::newFromVar' => [ CannotFindInstructionBuilder::class, 'newFromVar' ],
            'InstructionPipelineError::newFromInputParameter' => [ InstructionPipelineError::class, 'newFromInputParameter' ],
            'InstructionPipelineError::newFromVar' => [ InstructionPipelineError::class, 'newFromVar' ],
            'NotAnInstruction::newFromInputParameter' => [ NotAnInstruction::class, 'newFromInputParameter' ],
            'NotAnInstruction::newFromVar' => [ NotAnInstruction::class, 'newFromVar' ],
            'NotAnInstructionBuilder::newFromInputParameter' => [ NotAnInstructionBuilder::class, 'newFromInputParameter' ],
            'NotAnInstructionBuilder::newFromVar' => [ NotAnInstructionBuilder::class, 'newFromVar' ],
            'UnsupportedType::newFromInputParameter' => [ UnsupportedType::class, 'newFromInputParameter' ],
            'UnsupportedType::newFromVar' => [ UnsupportedType::class, 'newFromVar' ],
        ];

        // build it
        parent::__construct($ourExceptions);
    }
}
