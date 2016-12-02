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

namespace GanbaroDigital\InstructionPipeline\V1\Requirements;

use GanbaroDigital\Defensive\V1\Interfaces\Requirement;
use GanbaroDigital\Defensive\V1\Interfaces\ListRequirement;
use GanbaroDigital\Defensive\V1\Requirements\InvokeableRequirement;
use GanbaroDigital\Defensive\V1\Requirements\ListableRequirement;
use GanbaroDigital\DIContainers\V1\Interfaces\FactoryList;
use GanbaroDigital\InstructionPipeline\V1\Checks\IsValidInstruction;
use GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineExceptions;

class RequireValidInstruction implements Requirement, ListRequirement
{
    // saves us having to declare ::__invoke() ourselves
    use InvokeableRequirement;

    // saves us having to declare ::toList() ourselves
    use ListableRequirement;

    /**
     * the factory that will make our exceptions
     * @var FactoryList
     */
    protected $exceptions;

    /**
     * create a Requirement that is ready to execute
     *
     * @param  FactoryList|null $exceptions
     *         the functions to call when we want to throw an exception
     * @return RequireValidChecks
     */
    public function __construct(FactoryList $exceptions = null)
    {
        $this->exceptions = $exceptions;
        if ($this->exceptions === null) {
            $this->exceptions = new InstructionPipelineExceptions;
        }
    }

    /**
     * create a Requirement that is ready to execute
     *
     * @param  FactoryList|null $exceptions
     *         the functions to call when we want to throw an exception
     * @return RequireValidInstruction
     */
    public static function apply(FactoryList $exceptions = null)
    {
        return new self($exceptions);
    }

    /**
     * throws exception if our inspection fails
     *
     * @param  mixed $fieldOrVar
     *         the data to be examined
     * @param  string $fieldOrVarName
     *         what is the name of $fieldOrVar in the calling code?
     * @return void
     */
    public function to($fieldOrVar, $fieldOrVarName = "value")
    {
        if (!IsValidInstruction::check($fieldOrVar)) {
            throw $this->exceptions['NotAnInstruction::newFromVar']($fieldOrVar, $fieldOrVarName);
        }
    }
}
