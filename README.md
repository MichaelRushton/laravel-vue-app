# Laravel Vue App

A web app built in Laravel and Vue.

## Installation

```bash
git clone git@github.com:MichaelRushton/laravel-vue-app.git laravel-vue-app
bin/app install
```

The app will be accessible at http://localhost and the [Mailpit](https://mailpit.axllent.org/) dashboard at http://localhost:8025.

Database connection details:

Host: 127.0.0.1\
Port: 5432\
Database: db\
Username: postgres\
Password:

## Commands

```bash
bin/app help                  # List available commands
bin/app install               # Install the app
bin/app start                 # Start the containers
bin/app stop                  # Stop the containers
bin/app dev                   # Start the containers, clear the cache, and watch for changes
bin/app format                # Run Prettier and Laravel Pint
bin/app app <command>         # Run a command in the app container
bin/app server <command>      # Run a command in the server container
bin/app db <command>          # Run a command in the db container
bin/app db-testing <command>  # Run a command in the db-testing container
bin/app mailpit <command>     # Run a command in the mailpit container
bin/app redis <command>       # Run a command in the redis container
bin/app horizon <command>     # Run a command in the horizon container
bin/app npm <command>         # Run an npm command in the app container
bin/app php <command>         # Run a php command in the app container
bin/app composer <command>    # Run a composer command in the app container
bin/app vendor <executable>   # Run a vendor/bin executable in the app container
bin/app artisan <command>     # Run an artisan command in the app container
bin/app <command>             # Run an artisan command in the app container (shorthand)
```
