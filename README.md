<h1 align="center">
    Restful API
</h1>

<br />

Let's talk about what is a **Restful API** and how we can implement an standard one. 
An API, or application programming interface, is a set of rules that define 
how applications or devices can connect to and communicate with each other. 
A **Restful API** is an API that conforms to the design principles of the REST, 
or representational state transfer architectural style.

```shell
uvicorn main:app --reload
```

```shell
curl -w '\n' localhost:8000/api
```

```shell
curl -w '\n' -X POST -H "Content-Type: application/json" --data '{"version": 0.5, "platform": "IOS"}' localhost:8000/api/device
```

```shell
curl -w '\n' localhost:8000/api/device
```
