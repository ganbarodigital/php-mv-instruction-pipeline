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

namespace GanbaroDigital\InstructionPipeline\V1\Pipelines;

use GanbaroDigital\InstructionPipeline\V1\Exceptions\InstructionPipelineError;
use GanbaroDigital\InstructionPipeline\V1\Interfaces\NextInstruction;

/**
 * iterates through a list of callables when you call __invoke()
 */
class NextInstructionList implements NextInstruction
{
    /**
     * our list of instructions to work through
     * @var callable[]
     */
    protected $instructions;

    /**
     * create the iterator
     *
     * @param callable[] $instructions
     *        the list of instructions to iterate through
     */
    public function __construct($instructions)
    {
        $this->instructions = $instructions;
    }

    /**
     * call the next instruction in the list
     *
     * @param  mixed $params
     *         the collated params from the previous instruction or
     *         from the code triggering the entire pipeline
     * @return mixed
     *         the params from the final instruction in the list
     */
    public function __invoke(...$params)
    {
        // do we have a 'next' instruction?
        $instruction = current($this->instructions);
        if (!$instruction) {
            // we've reached the end of the usable list

            // what do we need to return?
            if (count($params) === 1) {
                // only one value to return
                return current($params);
            }

            // we have list of values to return
            return $params;
        }

        // remember where we are in the pipeline, in case an error occurs
        $currentKey = key($this->instructions);

        // add ourselves to the list
        array_unshift($params, $this);

        // move our list to the next instruction
        // this makes sure we're ready for when the pipeline calls us again
        next($this->instructions);

        // trigger the next instruction in the pipeline
        $errorMessage = null;
        set_error_handler(function ($errno, $errstr) use (&$errorMessage) {
            $errorMessage = $errstr;
        });
        $retval = call_user_func_array($instruction, $params);
        restore_error_handler();

        // what happened?
        if ($errorMessage !== null) {
            throw InstructionPipelineError::newFromVar($errorMessage, '$errorMessage', [
                'pipeline_key' => $currentKey
            ]);
        }

        // if we get here, then no error occurred
        return $retval;
    }
}
