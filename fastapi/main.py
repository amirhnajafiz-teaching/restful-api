import fastapi
from fastapi import FastAPI
import datetime

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
    return devices


@app.post("/api/device")
async def add_device(device: Device):
    device.create_time = datetime.datetime.now()
    devices.append(device)

    return "OK"