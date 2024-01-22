# Kubernates

- 如何退出

## deployment

```sh
kubectl create -f nginx-deployment.yaml --record
kubectl apply -f nginx-deployment.yaml
kubectl get deployments
kubectl get pods -l app=nginx
kubectl delete -f nginx-deployment.yaml
kubectl scale deployment nginx-deployment --replicas=4
kubectl create -f nginx-deployment.yaml --record
kubectl rollout status deployment/nginx-deployment
kubectl edit deployment/nginx-deployment
kubectl rollout status deployment/nginx-deployment
kubectl set image deployment/nginx-deployment nginx=nginx:1.91
kubectl rollout history deployment/nginx-deployment --revision=2

kubectl rollout undo deployment/nginx-deployment
kubectl rollout undo deployment/nginx-deployment --to-revision=2

kubectl rollout pause deployment/nginx-deployment
kubectl rollout resume deploy/nginx-deployment
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
