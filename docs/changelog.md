# CHANGELOG

## develop branch

### New

Initial support for creating instruction pipelines:

- added `IsValidInstruction` check
- added `IsValidInstructionBuilderClass` check
- added `CannotFindInstructionBuilder` exception
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
- added `NextInstructionList` pipeline iterator
- added `GenericInstructionBuilder` helper factory
