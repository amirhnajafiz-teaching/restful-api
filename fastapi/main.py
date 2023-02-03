import fastapi
from fastapi import FastAPI

from model import Device



# create list of devices
devices = []

# create an instance
app = FastAPI()


# create routes
@app.get("/api")
def root():
    return {"Version": fastapi.__version__}


@app.get("/api/device")
def get_devices():
    pass


@app.post("/api/device")
def add_device():
    pass