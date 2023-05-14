# AI Code Interpreter

Write code in any programming language (or even make one up) and render its result in the browser.

Watch a video of me making it here: https://www.youtube.com/watch?v=zcgf-XaZjUM

## Before you start
Put your OpenAI API key to `settings.sample.php` and rename it to `settings.php`

## Terminal Version
```console
$ php interpret.php pages/hello.c "name=Mark&age=27"
Hello, Mark, your age is 27
```

## Web Server Version
1. Start the project in a web server
```console
$ php -S localhost:8080
```

2. Then go to `http://localhost:8080/index.php?page=form.gpt` or use any other file in the `pages` folder, or create your own file in any programming language there and go to `http://localhost:8080/index.php?page=[your_filename]`

This project was inspired by [AI-Functions](https://github.com/Torantulino/AI-Functions) by @Torantulino
