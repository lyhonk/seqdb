# seqdb
seqDB
--------
seqDB是一个用来上存储测序数据信息的工具。
将样本，文库，送样，数据关联起来，给每一条数据唯一编号。

seqDB配置
-----

1.将seqdb.sql文件导入到数据库
2.修改数据库连接文件
```
Application/Common/Conf/config.php
Application/User/Conf/config.php
```

docker快速配置环境
-----

1.下载mysql和nginx的镜像
```
git pull mysql:5.6
git pull richarvey/nginx-php-fpm:php5
```

2.运行数据库
创建一个用来用来永久存储数据的文件夹，这里举例为/homedir/seqdb/mysql/
`MYSQL_ROOT_PASSWORD`为root密码
`MYSQL_USER`为创建一个mysql用户
`MYSQL_PASSWORD`为用户密码

```
docker run --name seqdb-mysql -p 3306:3306 -v /homedir/seqdb/mysql/:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=root-passwd -e MYSQL_USER=seqdb -e MYSQL_PASSWORD=seqdb-passwd -d mysql:5.6
```

3.运行web服务器
创建一个存放seqdb代码的文件夹,这里举例为/homedir/seqdb/php/
```
docker run --name seqdb-web -p 8989:80 -v /homedir/seqdb/php/:/var/www/html -d richarvey/nginx-php-fpm:php5
```
给Runtime可写权限

--------------------------------------------------

TUDO：
----
1.用户删除
2.数据前后段验证
3.数据导出
4.数据导入
5.用户权限分配
6.组管理
7.组权限分配



