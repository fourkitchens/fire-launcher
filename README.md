# Fire Launcher

```
  O      , U
 <_\__--"-' |
  |\  `----'
  L
```

## About

The FIRE Launcher is a command-line utility that streamlines the execution of 
[FIRE (Fast Initialization and Rebuilding of Environments)](https://github.com/fourkitchens/fire/) 
scripts within your projects. By typing `fire <command>`, this tool dynamically loads 
and runs the appropriate FIRE scripts for the current project, eliminating the need 
for global installations. It simplifies your workflow by providing a consistent 
interface to manage environment setup and project-specific tasks, ensuring rapid 
and efficient development processes.

## Installing

Download the latest stable release or 
[browse all releases](https://github.com/fourkitchens/fire-launcher/releases) 
to download specific fire.phar file:

```Shell
curl -s https://api.github.com/repos/fourkitchens/fire-launcher/releases/latest \
| grep "browser_download_url.*fire.phar" \
| cut -d '"' -f 4 \
| xargs -I {} curl -L -o fire.phar {}
```

```Shell
wget $(curl -s https://api.github.com/repos/fourkitchens/fire-launcher/releases/latest \
| grep "browser_download_url.*fire.phar" \
| cut -d '"' -f 4) -O fire.phar
```

Navigate to the fire.phar file in your terminal to move this file to a globally 
executable space. On Ubuntu and Other Unix-like Systems (Linux, macOS):

```Shell
# Make the file executable
chmod +x fire.phar
# Move the file to a directory in your PATH, such as /usr/local/bin:
mv fire.phar /usr/local/bin/fire
```

You should now be able to trigger the `fire` command from any directory into you terminal.


## Compiling

If you are making changes to the Fire Launcher, you can use [box](https://github.com/box-project/box) 
to compile the project:

- go to the project root
- execute the command ```box compile```. It should generate a fire.phar file
- Now execute `chmod +x fire.phar`
- And `mv fire.phar /usr/local/bin/fire`
- now test your changes with the command `fire` from any directory in your terminal.
