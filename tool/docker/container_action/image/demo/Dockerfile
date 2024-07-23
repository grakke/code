FROM dokken/centos-8

RUN yum install -y httpd
COPY file1 /var/www/html/
ADD  file2.tar.gz /var/www/html/
CMD ["/sbin/httpd", "-D", "FOREGROUND"]

