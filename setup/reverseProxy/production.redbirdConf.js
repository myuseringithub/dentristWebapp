// This file would be required in Redbird reverseProxy. 
// USAGE: 

module.exports = function reverseProxy(proxy) {

    let email = process.env.EMAIL
    let domain = 'dentrist.com'

    // TODO: Fix cross origin http in https, seems as if `upgrade` header doesn't work well in apache config wiht browser throgh http config file.
    proxy.register(domain, 'http://dentristwebapp_wordpress:80', {
        ssl: {
            letsencrypt: {
                email: email, // Domain owner/admin email
                production: true, // WARNING: Only use this flag when the proxy is verified to work correctly to avoid being banned!
            }
        }
    });
        
}
