# Go 语言 Web 编程入门

- net/http
- gorilla

## 路由

- `/user/names/James/countries/NewZealand`
- `index/display_headers`
- `display_url_params?a=b&c=d&a=c`

## 中间件

## 数据库

- 因为容器退出时会销毁容器内的所有文件，所以对于 MySQL 这种存储持久化数据的容器需要与外部宿主机做文件映射，再次启动 MySQL容器后就会从数据映射中读取之前的数据
- 通过 volumes 命令创建了一个名为 dbdata 的数据卷
- 使用 dbdata:/var/lib/mysql 的格式，通知 Docker，将 dbdata 数据卷挂在到容器中的 /var/lib/mysql 目录上

## 容器

- docker-compose
- Dockerfile自己创建镜像

```sh
docker-compose up -d
docker-compose restart
docker exec -it <container name> bash
docker-compose exec app go test
```
