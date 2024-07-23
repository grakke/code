# [Nginx Server Configs](https://github.com/h5bp/server-configs-nginx)

- **Nginx Server Configs** is a collection of configuration snippets that can help your server improve the web site's performance and security, while also ensuring that resources are served with the correct content-type and are accessible, if needed, even cross-domain.

## Documentation

- The [documentation](doc/TOC.md) is bundled with the project, which makes it readily available for offline reading and provides a useful starting point for any documentation you want to write about your project.

## Sites Available

- Define host definitions here. It'd be a good thing if you keep your hosts indexed by domain name, eg:

```sh
example.com (handles traffic from both www.example.com and example.com)
foobar.com (as above)
test.foobar.com (handles traffic from both www.test.foobar.com and test.foobar.com)
```

## Component-config files

- Each of these files is intended to be included in a server block. Not all of the files here are used - they are available to be included as required. The `basic.conf` file includes the rules which are recommended to always be defined.

### Nginx will only use one location block

- A [location block (directive)](http://nginx.org/en/docs/http/ngx_http_core_module.html#location) defines the behavior for a given request which matches the location url pattern. The block used is whichever is the most specific for the given request, the rules for precedence can be found in [Nginx's wiki](http://wiki.nginx.org/HttpCoreModule#location).

## scripts

```sh
cd /etc/nginx/conf.d
cp templates/example.com.conf .actual-hostname.conf
sed -i 's/example.com/actual-hostname/g' .actual-hostname.conf

# enable|disable vhost
mv .actual-hostname.conf actual-hostname.conf
mv actual-hostname.conf .actual-hostname.conf
ln -s /var/log/nginx logs

nginx -t
nginx -t -c nginx.conf
nginx -s reload

cd /etc/nginx/sites-enabled
ln -s ../sites-available/newproject.com .
/etc/init.d/nginx reload
```

## structure

- nginx.conf The main Nginx config file.
- mime.types responsible for mapping file extensions to MIME types.
- conf.d/ contain all the server definitions.
  - Except if they are dot prefixed or non .conf extension, all files in this directory are loaded automatically.
  - templates folder
    - Files in this directory contain a server template for secure and non-secure hosts. They are intended to be copied in the conf.d directory with all example.com occurrences changed to the target host.
- snippets/ contains config snippets (mixins) to be included as desired.
  - There are two types of config files provided: individual config snippets and combined config files which provide convenient defaults.
  - basic.conf
    - This file loads a small subset of the rules provided by this repository to add expires headers, allow cross-domain fonts and protect system files from web access. The basic.conf file includes the rules which are recommended to always be defined.
  - location/ contain one or more location directives. They are intended to be loaded in the server context (or, in a nested location block).
  - custom.d/ contain all the custom nginx.conf configuration.
    - Except if they are dot prefixed or non .conf extension, all files in this folder are loaded automatically.

## Hotlink Protection

- Depending on how sensitive assets are, nginx offers a few options for protecting assets.
- valid_referers
  - the simplest way to protect assets from hotlinking is to use[valid_referers](http://nginx.org/en/docs/http/ngx_http_referer_module.html). It's easy to use, this would be included in a relevant location block:
- secure_link
  - The [secure_link module](http://nginx.org/en/docs/http/ngx_http_secure_link_module.html) provides a flexible, more robust means of protecting assets from being hotlinked or downloaded outside from outside the web itself.
  - It is more involved to setup and use but, for example, permits time limited and IP-restricted (or restricted on any other parameter desired) links to assets.
  - This requires implementing server-side logic to generate links of the form: <http://example.com/protected/url.ext?md5=hash&expires=timestamp>  where: hash = md5({timestamp}/protected/url.ext{clientip} secret)
    - "secret" should be application-specific and needs to match in the nginx config, and the function used to generate these secure urls

```sh
valid_referers none blocked example.com *.example.com;
if ($invalid_referer) {
    return 403;
}


secure_link $arg_md5,$arg_expires;
secure_link_md5 "$secure_link_expires$uri$remote_addr secret";
if ($secure_link = "") {
    # No get args, or invalid hash
    return 403;
}
if ($secure_link = "0") {
    # valid hash, but the link is now expired
    return 410;
}

if ($secure_link = "1") {
    # valid hash, and link is still fresh
    ...
}
```

## Common Problems

- types_hash errors
  - Depending on the server architecture, it's possible to get the following error:
    - could not build the types_hash, you should increase either
    - types_hash_max_size: 1024 or types_hash_bucket_size: 32
  - Nginx uses [hash tables](http://nginx.org/en/docs/hash.html) to speed up certain tasks, usually the default value is sufficient but depending on the actual server config this error might be encountered. The solution is to do exactly what the error message suggests, by adding to nginx.conf the following:
- Only some rules are being applied
  - Nginx only uses one location block when processing a request.
  - A direct concequence of this is that if, either directly or via include statemtents, directives are defined like so:
- Cannot dynamically serve `<file extension>` requests
  - With the config, a request for `/css/main.css`, assuming the file exists, would be served directly by nginx whereas a request for `/application/user.css`would be processed by php.

````sh
# add this to the http context
types_hash_max_size: 1024;

## OR add this to the http context, don't need both
# types_hash_bucket_size: 32

#  _the section headers are only to demonstrate which location blocks applied to a particular request_. Only ONE of these location blocks will be used:
 # Make sure js files are served with a long expire
location ~* \.js$ {
    add_header "section" "long expire"; # for illustration only
    add_header Cache-Control "max-age=31536000";
}

 # Oh, and kill etags for js files
location ~* \.js$ {
    add_header "section" "no etags"; # for illustration only
    etag off;
}

# The way to achieve the desired effect is to consolidate all rules into one location block:
    location ~* \.js$ {
    # Make sure js files are served with a long expire
    add_header "section" "long expire"; # for illustration only
    add_header Cache-Control "max-age=31536000";
    add_header "section" "no etags"; # for illustration only
    etag off;
}

server {
  listen 80;
  server_name example.com;
  root /var/www/example.com;

  location / {
   try_files $uri $uri/ /index.php;
  }

  location ~ \.php$ {
   fastcgi_pass 127.0.0.1:9000;
   fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
   include fastcgi_params;
  }

# assuming the file exists,is served with headers defined by h5bp basic ruleset whereas `/application/user.css` will be a 404
   location ~ [^/]\.php(/|$) {
     fastcgi_split_path_info ^(.+?\.php)(/.*)$;
     if (!-f $document_root$fastcgi_script_name) {
       return 404;
     }

     fastcgi_pass 127.0.0.1:9000;
     fastcgi_index index.php;
     include fastcgi_params;
  }

# Use prefix routing
  # ADDED. Apply only to the css, js and images folder
  location ~ ^/(css|images|js)/ {
   include h5bp/basic.conf;
  }

# define error_page in each location block
  location ~* \.(?:jpg|jpeg|gif|png|ico|cur|gz|svg|svgz|mp4|ogg|ogv|webm|htc)$ {
    error_page 404 = /index.php;
    expires 1M;
    access_log off;
  }
}

## Change to use a 404 front-controller Instead of using try_files alone, change the server config such that the application is the 404 page:
#
server {
  listen 80;
  server_name example.com;
  root /var/www/example.com;

  try_files $uri $uri/ @app;
  error_page 404 = @app;

  location @app {
    include fastcgi_params;
    fastcgi_pass 127.0.0.1:9000;
    fastcgi_param   SCRIPT_FILENAME     $document_root/index.php;
    fastcgi_param   SCRIPT_NAME         $document_root/index.php;
    fastcgi_param   DOCUMENT_URI        /index.php;
    fastcgi_index index.php;
  }

  include h5bp/basic.conf;
 }
````
