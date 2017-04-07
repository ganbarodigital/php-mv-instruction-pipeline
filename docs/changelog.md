# CHANGELOG

## develop branch

### New

- added support for using your own 'NextInstruction' wrapper class

## v1.2016120201

Released Friday 2nd December 2016.

### New

Initial support for creating instruction pipelines:

- added `IsValidInstruction` check
- added `IsValidInstructionBuilderClass` check
- added `CannotFindInstructionBuilder` exception
- added `InstructionPipelineError` exception
- added `InstructionPipelineException` type-hint interface
- added `InstructionPipelineExecptions` DI container
- added `NotAnInstruction` exception
- added `NotAnInstructionBuilder` exception
- added `UnsupportedType` exception
- added `InstructionBuilder` interface
- added `BuildInstructionPipeline` builder
- added `RequireValidInstruction` requirement
- added `RequireValidInstructionBuilderClass` requirement
- added `InstructionPipeline` interface
- added `NextInstruction` interface
- added `NextInstructionList` pipeline iterator
- added `GenericInstructionBuilder` helper factory
