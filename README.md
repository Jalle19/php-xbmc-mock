php-xbmc-mock
=============

Very rudimentary mock of XBMC's web server. The intended purpose is to be used as a fake when testing code that interacts with XBMC's JSON-RPC API.

## Usage

The server is designed to run using PHP's built-in web server. Run `php -S localhost:8080 -t webroot/` from the project directory to launch an instance.
