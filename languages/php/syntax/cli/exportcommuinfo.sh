#!/bin/bash

launcherFile="/home/henry/code/cms-biz-data/jobs/launcher.php"
commonSleepTime=1

echo "bash started..."
while true; do
    result=$(php $launcherFile $1 $2 $3 $4 $5 $6)
    echo "$result"
    if [ "$result" == "no data fix" ]; then
        echo "No Data Waiting for Proccessing..."
        #break
    fi
    sleep $commonSleepTime
done
echo "bash done..."
break

# 导入数据：
#!/bin/bash

commonSleepTime=1

launcherFile="/home/henry/code/cms-biz-data/jobs/launcher.php"
result=$(php $launcherFile $1)

while true; do
    upload=$(cat /data1/logs/process.log | jq '.Uploaded')
    process=$(cat /data1/logs/process.log | jq '.Processed')
    if [ $process -lt $upload ]; then
        #nohup php /home/henry/code/cms-biz-data/jobs/launcher.php Jobs_Import>/data1/logs/processfile.log
        echo "$result"
    fi
    sleep $commonSleepTime
done
