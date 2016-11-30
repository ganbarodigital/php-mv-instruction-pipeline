# Contributing

This library is open-source software from [Ganbaro Digital](https://ganbarodigital.com), released under [the BSD license](license.html). We welcome all contributions that further [the goals](index.md#goals) that we have for this library.

Before contributing, please read our [code of conduct](code-of-conduct.html). Please also make sure that you have the necessary legal authority to contribute - for example, that you own the work that you are submitting, or that your employer has authorised you to contribute work that they own.

All contributions must be licensed under [the BSD license](license.html).

## How To Contribute Via Github

This library uses the [Gitflow](http://datasift.github.io/gitflow/) model for managing branches in our Git repository:

Branch | Purpose
-------|--------
`master` | latest tagged release
`develop` | completed features and fixes waiting for final testing and release
`feature/XXX` | work in progress, to be merged into `develop` when completed
`release/XXX` | a release that is undergoing final testing, to be merged into `master` and `develop` when completed
`hotfix/XXX` | emergency bug fixes in progress, to be merged into `master` and released when completed

Don't worry if you're not used to Gitflow. Follow these steps for your features or fixes:

1. if you don't have one already, create an account on Github
1. on Github, fork our project
1. clone your fork to your local computer
1. create a new branch on your local computer: `git checkout -b feature/<my-feature> develop`
1. work on your feature

When you're ready to submit your pull request, please make sure it's a pull request against our `develop` branch.

We'll check your pull request for the following:

1. does the pull request apply cleanly against our `develop` branch?
1. does it fit [our goals for the library](index.html#goals)?
1. does it fit our coding style?
2. does it come will 100% unit test coverage?
1. does the pull request include updated docs showing how the new feature works?

If the answer is 'no' to any of those, we'll respond and let you know what we need you to do before we can accept your pull request.

## Accepted Contributions

If we accept your pull request, we'll add your details to our [authors](authors.html) page, so that your contribution is acknowledged. We'll also add details of your change to our [Changelog](changelog.html) page.
