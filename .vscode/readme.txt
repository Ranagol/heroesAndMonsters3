So, here we have two files.

launch.json is user for running the app in Docker.

There is another file, named .vscode/launchForNonDockerEnviroment.json
Now, this file is used, when we want to run this app without docker. In this case, you must rename
this file to launch.json. And you need to delete or rename the other launch.json, that is used for
the Docker setup.