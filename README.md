# Quality assurance tools

Tools for quality assurance, e.g. automated tests and static analysis. It includes Phing, which allows you to
run all tools at once for convenience.

## Installation

Require this package in your project's `composer.json` as follows:

```
$ composer require --dev bixelsnl/phpqa
```

Add build artifacts to your `/.gitignore`:

```
build/*
```

## Usage

After installation, you can run individual tools by running their binaries which are installed in `vendor/bin`.

### Phing

Phing reads `./build.xml` for instructions by default. It supports importing other XML files. If a target in the main
file is also present in at least one of the imported files, the one from the main file takes precedence. This allows
you to quickly get started using the default setup, while also providing the flexibility to override specific tasks on
a project-basis.

*Note that when overriding stuff, the order matters! If you want to override something, you **MUST** place the
import **AFTER** your overrides.*

To get started, add `build.xml` to your project root:

```
<?xml version="1.0" encoding="UTF-8"?>

<project name="my-project" default="all">
    <import file="vendor/bixelsnl/php-qa/build.xml"/>
</project>
```

Then run `vendor/bin/phing` and the whole suite should run. Output is generated both to stdout and dumped to files in
`/build/*`.

There is no way to remove a task from the imported file, so if you don't want to run a certain task you could override
it with an echo, e.g.:

```
    <target name="phpmd">
        <echo msg="This project does not run phpmd" />
    </target>
```

For more information, see https://www.phing.info/phing/guide/en/output/hlhtml/#ImportTask

#### Building against multiple PHP versions

You can specify a specific PHP binary to use as follows:

```
$ PHPBIN=/path/to/php vendor/bin/phing
```

If you do not specify this environment variable, it will default to just the `php` that is available in your path.

#### Different bin-dir

If your project's `composer.json` defines the `bin-dir` to be something other than the default `vendor/bin`, you will
need to run phing with an environment variable to tell it where to find the binaries. For example, if your
project defines the following in its `composer.json`:

```
    "config": {
        "bin-dir": "bin"
    }
```

Then you will need to run the test quite as follows:

```
$ VENDORBIN=bin bin/phing
```

## Troubleshooting

* https://www.phing.info/phing/guide/en/output/hlhtml/#ImportTask
