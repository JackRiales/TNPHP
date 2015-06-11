
That Naughty Panda PHP Framework
-- Development Tools Included:
--	--	Compass
--	--	SASS
--	--	Grunt

Usage:

1) Open two terminal environments and cd into the project directory (where index.php is). One will be used with Compass, the other with Grunt.

2) In one, run "$ compass watch ." This will watch for changes in your SASS build folder and compile automatically.

3) Run "$ npm install" in the other. This will install all the grunt modules necessary for development.

4) Run grunt. This will take the compiled CSS files from SASS and minify them as they're created.

5) Edit using SCSS in the _build/scss folder and PHP "part" files in php/part.