# Fire Launcher

```
  O      , U
 <_\__--"-' |
  |\  `----'
  L
```

## About

The FIRE Launcher is a command-line utility that streamlines the execution of [FIRE (Fast Initialization and Rebuilding of Environments)](https://github.com/fourkitchens/fire/) scripts within your projects. By typing `fire <command>`, this tool dynamically loads and runs the appropriate FIRE scripts for the current project, eliminating the need for global installations. It simplifies your workflow by providing a consistent interface to manage environment setup and project-specific tasks, ensuring rapid and efficient development processes.

## Installing

Download the latest stable release or [browse all releases](https://github.com/fourkitchens/fire-launcher/releases) to download specific fire.phar file:

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

Navigate to the fire.phar file in your terminal to move this file to a globally executable space. On Ubuntu and Other Unix-like Systems (Linux, macOS):

```Shell
# Make the file executable
chmod +x fire.phar
# Move the file to a directory in your PATH, such as /usr/local/bin:
mv fire.phar /usr/local/bin/fire
```

You should now be able to trigger the command fire from any directory into you terminal.

## Compiling

Using [box](https://github.com/box-project/box) to compile the project. If you want to compile the fire launcher from the source repo , follow this instructions.

- go to the project root
- execute the command ```box compile```. I should generate a fire.phar file
- Now execute `chmod +x fire.phar`
- And Finally `mv fire.phar /usr/local/bin/fire`
- now you should be able to trigger the command fire from any directory into you terminal.
