USAGE: 

    • appContent should be copied: 
      from https://drive.google.com/drive/folders/0B7TY-evjcgCUdUpjLXA2aGYwbHM?usp=sharing 
      to projectRoot/content folder.
      
    • docker-compose -f ./setup/production.docker-compose.yml up --build
    
"volume" folder will be created.

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
