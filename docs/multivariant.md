# Multi-Variant

The _Instruction Pipeline for PHP_ is _multi-variant_. What does that mean?

## What Is Multi-Variant?

In a normal library, when you install it via `composer`, you get one version of the library. You'll choose between version 1.x, version 2.x, version 3.x and so on.

In a _multi-variant_ library, the library includes all of the different versions. You get version 1.x, version 2.x and version 3.x (and so on) installed at the same time. Each version of the library has its own _namespace_. Your code can use multiple versions at the same time.

The _Exception Helpers Library_ uses these namespaces:

* `GanbaroDigital\InstructionPipeline\V1` - version 1.x of the library
* `GanbaroDigital\InstructionPipeline\V2` - reserved for version 2.x of the library

These are the library's _API versions_.

## Why Do We Need Multi-Variant Libraries?

Version 2.x of a library's API is normally incompatible with version 1.x of the same library. This is good practice. Unfortunately, that leads to some problems with PHP's lack of code module support.

* It's currently common practice for version 1.x and version 2.x of a library to re-use the same PHP namespace.
* One part of an app can't use version 1.x of a library, whilst a different part of an app uses version 2.x of the same library.
* It's also currently common practice for Git tags to use the library's API version number. For example, if the library's API is at `v2.6.3`, the Git tag would also be `v2.6.3`.
* The Composer package manager has to use the Git tags to work out which version of the library to install.

As a result, the Composer package manager won't let you install both version 1.x and version 2.x of the same library at the same time.

This becomes a blocker when your application has dependencies that use different versions of the same library. All of a sudden, you have conflicts in Composer that you cannot resolve.

Multi-variant libraries avoid this problem entirely.

* As far as Composer is concerned, all the dependencies can use the same _tagged version_ of the library.
* As far as each dependency is concerned, the _API version_ of the library that it needs is installed and available for use.

## How Do We Version Multi-Variant Libraries?

Multi-variant libraries use __v1.YYYYMMDDRR__ style for Git tags:

* _YYYY_ is the year the library was released (as four digits)
* _MM_ is the month the library was released (two digits, January is _01_)
* _DD_ is the day of the month that the library was released (two digits)
* _RR_ is how many times the library has been released on that day (two digits)

For example: _v1.2016041401_, or _v1.2016041502_.

## FAQs

Why are there no '.' between the different parts?

* When you use `composer require`, it adds a `^X.Y` constraint to your list of requirements. This will accept all tags that start with `X`. It will not accept any tag that starts with `X+1` or more.
* If we used _v2016.04.14.01_ as the tag, `composer require` would add `^v2016.04` as the constraint. This doesn't make any sense for multi-variant libraries, because _2016_ doesn't mean that the library isn't compatible with anything tagged _2015_.
