#!/bin/bash
#function:cut nginx log files for lnmp v0.5 and v0.6
#author: http://lnmp.org

#设置你的日志存放的目录
log_files_path="/home/wwwlogs/"
#日志以年/月的目录形式存放
log_files_dir=${log_files_path}$(date -d "yesterday" +"%Y")/$(date -d "yesterday" +"%m")
#设置需要进行日志分割的日志文件名称，多个以空格隔开
log_files_name=(access www.abc3210.com)
#设置nginx的安装路径
nginx_sbin="/usr/local/nginx/sbin/nginx"
#Set how long you want to save
save_days=30

############################################
#Please do not modify the following script #
############################################
mkdir -p $log_files_dir

log_files_num=${#log_files_name[@]}

#cut nginx log files
for((i=0;i<$log_files_num;i++));do
mv ${log_files_path}${log_files_name[i]}.log ${log_files_dir}/${log_files_name[i]}_$(date -d "yesterday" +"%Y%m%d").log
done

#delete 30 days ago nginx log files
find $log_files_path -mtime +$save_days -exec rm -rf {} \; 

$nginx_sbin -s reload





upload=$(cat /data1/logs/process.log | jq '.Uploaded')
process=$(cat /data1/logs/process.log | jq '.Processed')

#echo –n “ please enter your name”  //-n 表示用户输入和提示信息在同一行

#read name

#echo “your name is $name”


#echo “Please  enter  your  first name  and last name :”

#read first last

#echo “your first name is $first”

#echo “your last name is $last”

