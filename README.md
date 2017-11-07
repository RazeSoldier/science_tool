本软件主要包含了科学方面的小工具，利用web服务提供。

本软件由PHP编写，主要用于web服务。您必须在您的计算机上面部署PHP环境才能使用本软件。此外，您必须安装本软件的依赖（执行composer install命令）。

== 授权协议 ==

自版本0.2.0以来，本软件以GNU General Public License v3.0协议授权。(0.1.4以前以CC BY-SA 4.0协议授权)
详细授权协议见软件根目录下的"COPYING"文件。

== 目录结构图 ==
root
|--config
    |index.php
|--enerypt
    |index.php
|--health
    |index.php
|--includes
    |--enerypt
        |checkEneryptError.subclass.php
        |enerypt.calss.php
    |--health
        |bmi.class.php
        |checkHealthError.subclass.php
    |--page
        |--encrypt
            |index.php
        |--health
            |bmi.php
        |--physics
            |frequency_and_wavelength.php
            |gravity.php
            |length_contraction.php
            |relativistic_mass.php
            |relativistic_momentum.php
            |schwarzschild.php
            |time_dilation.php
	|README
        |index.php
    |--physics
        |checkPhysicsError.subclass.php
        |frequency-wavelength.subclass.php
        |gravity.subclass.php
        |length_contraction.subclass.php
        |physics.class.php
        |relativistic_mass.subclass.php
        |relativistic_momentum.subclass.php
        |schwarzschild.subclass.php
        |time_dilation.subclass.php
    |--routing
        |encrypt.php
        |health.php
        |physics.php
    |.htaccess
    |AutoLoader.php
    |CommonHTML.class.php
    |DefaultSettings.php
    |Defines.php
    |GlobalFunctions.php
    |HttpStatus.php
    |Installer.php
    |NoLocalSettings.php
    |OutputPage.php
    |PHPVersionCheck.php
    |PathRouter.php
    |Setup.php
    |WebRequest.php
    |WebStart.php
    |checkError.class.php
|--physics
    |index.php
|.gitignore
|.travis.yml
|CODE_OF_CONDUCT.md
|COPYING
|README.md
|RELEASE-x.x.x
|composer.json
|index.php