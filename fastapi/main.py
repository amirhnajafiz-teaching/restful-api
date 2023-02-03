import fastapi
from fastapi import FastAPI



# create an instance
app = FastAPI()


# create routes
@app.get("/")
def home():
    return {"Version": fastapi.__version__}