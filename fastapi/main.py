import fastapi
from fastapi import FastAPI
import datetime

from model import Device



# create list of devices
devices = []
base_id = 10001

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
    global base_id

    device.id = base_id
    device.create_time = datetime.datetime.now()

    devices.append(device)

    base_id = base_id + 1

    return "OK"

@app.delete("/api/device/{id}")
async def remove_device(id: int):
    item = None

    for device in devices:
        if device.id == id:
            item = device
            break

    if item == None:
        return "Not found"
    
    devices.remove(item)

    return "OK"

@app.put("/api/device/{id}")
async def update_device(id: int, device: Device):
    item = None

    for device in devices:
        if device.id == id:
            item = device
            break

    if item == None:
        return "Not found"
    
    devices.remove(item)

    device.id = id
    devices.append(device)

    devices.sort(key=lambda x: x.id)

    return "OK"