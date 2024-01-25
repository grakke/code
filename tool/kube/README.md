# Kubernates

## API

### deployment

```sh
kubectl replace -f nginx-deployment.yaml
# 推荐 不必关心当前的操作是创建还是更新, Kubernetes 会根据 YAML 文件的内容变化自动进行具体的处理
kubectl apply -f nginx-deployment.yaml

kubectl get deployments

kubectl delete -f nginx-deployment.yaml
```

#### 经典PaaS的记忆：作业副本与水平扩展

```sh
kubectl create -f nginx-deployment.yaml --record

kubectl scale deployment nginx-deployment --replicas=4

kubectl rollout status deployment/nginx-deployment

kubectl edit deployment/nginx-deployment
kubectl set image deployment/nginx-deployment nginx=nginx:1.91

kubectl rollout status deployment/nginx-deployment

kubectl rollout history deployment/nginx-deployment --revision=2

kubectl rollout undo deployment/nginx-deployment
kubectl rollout undo deployment/nginx-deployment --to-revision=2

kubectl rollout pause deployment/nginx-deployment
kubectl rollout resume deploy/nginx-deployment
```

### Pod

```sh
kubectl get pods [-l app=nginx]

kubectl exec -it nginx-deployment-6f9bc64c6f-fsw2z -- /bin/bash
# ls /usr/share/nginx/html

# Probe
kubectl create -f test-liveness-exec.yaml
```

### StatefulSet

- MySQL 容器化

```sh
kubectl create -f statefulset.yaml
kubectl get pods -w -l app=nginx

kubectl get statefulset web
kubectl exec web-0 -- sh -c 'hostname'
kubectl run -i --tty --image busybox:1.28.4 dns-test --restart=Never --rm /bin/sh

kubectl get pvc -l app=nginx
```

### job

```sh
kubectl create -f job.yaml
kubectl describe jobs/pi
kubectl logs pi-2bdq5

# 外部管理器 +Job 模板
mkdir ./jobs
for i in apple banana cherry
do
   cat job-tmpl.yaml | sed "s/\$ITEM/$i/" > ./jobs/job-$i.yaml
done

kubectl create -f ./jobs
kubectl get pods -l jobgroup=jobexample
```

## [traefik](https://doc.traefik.io/traefik/getting-started/quick-start-with-kubernetes/)

- Permissions and Accesses
  - 00-account.yml
  - 00-role.yml
  - 01-role-binding.yml
- Deployment and Exposition
  - 02-traefik.yml
  - 02-traefik-services.yml
    - a piece is required to forward the traffic to any of the instance: namely a Service
- Proxying applications
  - use the example application traefik/whoami, but the principles are applicable to any other application.
  - 03-whoami.yml
    - The whoami application is a simple HTTP server running on port 80 which answers host-related information to the incoming requests
  - 03-whoami-services.yml
    - Traefik is notified when an Ingress resource is created, updated, or deleted. This makes the process dynamic. The ingresses are, in a way, the dynamic configuration for Traefik.
  - 04-whoami-ingress.yml
    - This Ingress configures Traefik to redirect any incoming requests starting with / to the whoami:80 service
- [dashboard](http://localhost:8080)

```sh
kubectl apply -f 00-role.yml \
              -f 00-account.yml \
              -f 01-role-binding.yml \
              -f 02-traefik.yml \
              -f 02-traefik-services.yml

kubectl apply -f 03-whoami.yml \
              -f 03-whoami-services.yml \
              -f 04-whoami-ingress.yml

curl -v http://localhost/
```

## project example

```sh
docker build -t go-app-img .
docker run -d -p 3333:3000 --rm --name go-app-container go-app-img

docker build -t kevinyan001/kube-go-app .
docker push  kevinyan001/kube-go-app
docker pull kevinyan001/kube-go-app:latest

minikube start

kubectl create -f deployment.yaml
kubectl get deployments
kubectl get pods

kubectl expose deployment my-go-app --type=NodePort --name=go-app-svc --target-port=3000
kubectl get svc

minikube ip
```
