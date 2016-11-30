# CHANGELOG

## develop branch

### New

Initial support for creating instruction pipelines:

- added `CannotFindInstructionBuilder` exception
- added `InstructionPipelineException` type-hint interface
- added `InstructionPipelineExecptions` DI container
- added `NotAnInstruction` exception
- added `NotAnInstructionBuilder` exception
- added `InstructionBuilder` interface
- added `FoDiInstructionBuilder` interface
- added `ReDiInstructionBuilder` interface
- added `BiDiInstructionBuilder` interface
- added `BuildInstructionPipeline` builder
- added `RequireValidInstruction` requirement
- added `RequireValidInstructionBuilder` requirement
- added `Instruction` interface
- added `InstructionPipeline` interface
