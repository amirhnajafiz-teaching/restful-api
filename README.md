<h1 align="center">
    Restful API
</h1>

<br />

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
