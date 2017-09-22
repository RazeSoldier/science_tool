本软件主要包含了科学方面的小工具，利用web服务提供。

本软件由PHP编写，主要用于web服务。您必须在您的计算机上面部署PHP环境才能使用本软件。此外，您只需要把本软件的根目录复制到web服务器下即可。

== 授权协议 ==

自版本0.2.0以来，本软件以GNU General Public License v3.0协议授权。(0.1.4以前以CC BY-SA 4.0协议授权)
详细授权协议见软件根目录下的"COPYING"文件。

== 目录结构图 ==
root
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
    |DefaultSettings.php
    |Defines.php
    |Installer.php
    |NoLocalSettings.php
    |PHPVersionCheck.php
    |PathRouter.php
    |PreConfigSetup.php
    |WebStart.php
    |checkError.class.php
|--physics
    |index.php
|COPYING
|README.md
|RELEASE-x.x.x
|index.php