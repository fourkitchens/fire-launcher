Fire Launcher

```
  O      , U
 <_\__--"-' |
  |\  `----'
  L
```
=================

Launcher for FIRE project.  

Intelligently finds the fire commands for the current project. 

### Installing
- Go to the following page https://github.com/fourkitchens/fire-launcher/releases
- Find the release you are interested in and download the attached fire.phar file.
- Now using your terminal go to your downloads folder.
- Now execute `chmod +x fire.phar`
- And Finally `mv fire.phar /usr/local/bin/fire`
- now you should be able to trigger the command `fire` from any directory in your terminal.

### Compiling

If you are making changes to the Fire Launcher, you can follow this instructions from this source repo.
Uses [box](https://github.com/box-project/box) to compile the project.

- go to the project root
- execute the command ```box compile```. It should generate a fire.phar file
- Now execute `chmod +x fire.phar`
- And `mv fire.phar /usr/local/bin/fire`
- now test your changes with the command `fire` from any directory in your terminal.
