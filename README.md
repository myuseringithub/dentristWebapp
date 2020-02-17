# Dentrist אתר הכנה למבחן הרישוי ברפואת שיניים
![Screencast](/documentation/screenshot(1).jpg)
![Screencast](/documentation/screenshot(2).jpg)
![Screencast](/documentation/screenshot(3).jpg)

# Articles section:
![Screencast](/documentation/Screenshot_2015-01-18-22-48-11.png)
![Screencast](/documentation/Screenshot_2015-01-18-22-53-02.png)
![Screencast](/documentation/Screenshot_2015-06-28-03-32-03.png)


___

USAGE: 

    • appContent should be copied: 
      from https://drive.google.com/drive/folders/0B7TY-evjcgCUdUpjLXA2aGYwbHM?usp=sharing 
      to projectRoot/content folder.
      
    • docker-compose -f ./setup/production.docker-compose.yml up --build
    
"volume" folder will be created.

Updated: 
    • Build source code to distribution code:
      docker-compose -f ./setup/deployment.docker-compose.yml up buildSourceCode
    • Run containers:
      docker-compose -f ./setup/development.docker-compose.yml up 
___________________________________________


Check php info: `phpinfo();`

App structure:

/app 

    • /root
    
        • /site
        
        • /content
        
            • /plugins
            
        • /assets
        
        • index.php
        • wp-config.php
        
    • /config
    
        • wordpress.php
        

/etc/apache2/

    • /available-sites
    
    • /ssl
    

/var/log/apache2/

    • apache server logs
    
    • php logs (incase Wordpress WP_DEBUG_LOG is turned off, so that logs won't be logged to wp-content folder instead)
    

/usr/local/etc/php/php.ini 
