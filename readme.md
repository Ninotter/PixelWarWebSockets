
# Pixel War Websockets

Inspired by Reddit's r/place.

Made using Symfony & Ratchet

## Installation
### Requirements
- [Composer](https://getcomposer.org/)
- XAMP/WAMP/LAMP
- Symfony server
### Setup
- Execute the file "bddscript.sql" inside your database
- Run composer install in the terminal inside the root folder of the project
- Edit the .env file according to your database credentials
- Run symfony server:start in a terminal without closing it
- Run php bin/console run:websocket-server in a terminal without closing it
- Open a browser window with the url specified in the symfony server console